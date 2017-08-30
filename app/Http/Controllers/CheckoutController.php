<?php

namespace App\Http\Controllers;

use App\Core\Cart\Cart;
use App\Country;
use App\Order;
use App\Product;
use Auth;
use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use IZaL\Tap\Billing;

class CheckoutController extends Controller
{

    private $cart;
    private $productModel;
    private $countryModel;
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * CheckoutController constructor.
     * @param Cart $cart
     * @param Product $productModel
     * @param Country $countryModel
     * @param Order $orderModel
     */
    public function __construct(Cart $cart, Product $productModel, Country $countryModel, Order $orderModel)
    {
        $this->cart = $cart;
        $this->productModel = $productModel;
        $this->countryModel = $countryModel;
        $this->orderModel = $orderModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $hasAddress = false;
        $authenticated = false;
        $shippingAddress = null;

        if($user) {
            $authenticated = true;
            $user->load(['addresses.country','addresses.area']);
            if($user->addresses->count()) {
                $shippingAddress = $user->addresses->first();
                $hasAddress = true;
            }
        }
        $selectedCountry = Cache::get('selectedCountry');
        $selectedArea = Cache::get('selectedArea');

        $products = $this->productModel->has('detail')->with(['detail','store'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);

        return view('cart.checkout',compact('cart','user','hasAddress','selectedCountry','selectedArea','shippingAddress','authenticated'));
    }


    public function postCheckout(Request $request)
    {
        $user = auth()->user();
        if($user) {
            $user->load('addresses');
        }
        $selectedCountry = Cache::get('selectedCountry');

        if(!$user->addresses->count()) {
            $this->validate($request,[
                'email' => 'required|email',
                'firstname' => 'required',
                'lastname' => 'required',
                'mobile' => 'required',
                'block' => 'integer',
                'street' => 'integer',
                'recipient_firstname' => 'required',
                'recipient_lastname' => 'required',
                'recipient_mobile' => 'required',
            ]);
            $requestFields = $request->only(['area_id','firstname','lastname','mobile','country_id','area_id','block','street']);
            $extraFields = ['country_id'=>$selectedCountry['id']];

            $addressFields = array_merge($requestFields,$extraFields);
            $address = $user->addresses()->create($addressFields);
        } else {
            $address  = $user->addresses()->first();
        }

        $products = $this->productModel->has('detail')->with(['detail'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);

        //@todo: migrate new columns
        $order = $this->orderModel->create([
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'net_amount' => $cart->subTotal,
            'sale_amount' => $cart->grandTotal,
            'order_status' => 1, // pending order
            'captured_status' => 0,
            'invoice_id' => strtolower(str_random(7)),
            'country_id' => $selectedCountry['id'],
            'area_id' => $request->area_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
            'block' => $request->block,
            'street' =>$request->street,
            'email' => $request->email,
            'recipient_firstname' => $request->recipient_firstname,
            'recipient_lastname' => $request->recipient_lastname,
            'recipient_mobile' => $request->recipient_mobile,
            'coupon_id' => $cart->coupon ? $cart->coupon->id : null,
            'coupon_value' => $cart->coupon ?   ($cart->subTotal * $cart->coupon->percentage) / 100 : null,
            'order_notes' => $request->order_notes,
            'card_notes' => $request->card_notes,
        ]);

        $storesRelatedToOrder = $products->pluck('store_id')->unique();
        $order->stores()->attach($storesRelatedToOrder);

        $productInfo = collect();


        // save order details
        foreach ($cart->items as $product) {

            $parsedDeliveryDate = Carbon::parse($product->delivery_date);

            $order->orderDetails()->create([
                'product_id' => $product->id,
                'quantity' => $product->quantity,
                'delivery_time' => $product->delivery_time,
                'delivery_date' => $parsedDeliveryDate,
                'price' => $product->detail->price,
                'sale_price' => $product->detail->final_price
            ]);

            // build products for payment
            $productInfo->push([
                'Quantity' => $product->quantity,
                'CurrencyCode' => $selectedCountry['country_code'],
//                'TotalPrice' => $product->total,
                'TotalPrice' => $cart->coupon ?  $product->total - ($product->total * $cart->coupon->percentage) / 100 : $product->total,
                'UnitDesc' => $product->sku,
                'UnitName' => $product->name,
                'UnitPrice' => $product->detail->final_price,
            ]);

        }

        $customerInfo = [
            'Email' => $request->email,
            'Mobile' => $request->mobile,
            'Name' => $request->firstname . ' ' . $request->lastname
        ];

        $gatewayInfo = ['Name' => 'ALL'];

        $merchantInfo = [
            'ReturnURL' => env('PAYMENT_RETURN_URL'),
            'AutoReturn' => 'Y',
            'LangCode' => app()->getLocale() == 'en' ? 'EN' : 'AR',
            'ReferenceID' => uniqid(),
        ];

        $billing = app()->make(Billing::class);
        $billing->setCustomer($customerInfo);
        $billing->setProducts($productInfo->toArray());
        $billing->setGateway($gatewayInfo);
        $billing->setMerchant($merchantInfo);

        try {
            $paymentRequest = $billing->requestPayment();
            $response = $paymentRequest->response->getRawResponse();
            $paymentURL = $response->PaymentURL;
            $order->reference_code = $response->ReferenceID;
            $order->save();

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error',__('Something went wrong during payment, try again'));
        }

        $this->cart->flushCart();

        return redirect()->away($paymentURL);

    }

}
