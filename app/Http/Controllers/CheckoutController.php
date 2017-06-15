<?php

namespace App\Http\Controllers;

use App\Core\Cart\Cart;
use App\Country;
use App\Product;
use Cache;
use Illuminate\Http\Request;
use IZaL\Tap\Billing;

class CheckoutController extends Controller
{

    private $cart;
    private $productModel;
    private $countryModel;

    public function __construct(Cart $cart, Product $productModel,Country $countryModel)
    {
        $this->cart = $cart;
        $this->productModel = $productModel;
        $this->countryModel = $countryModel;
        $this->middleware('auth')->only(['index']);
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
        $user->load(['addresses.country','addresses.area']);
        $selectedCountry = Cache::get('selectedCountry');
        $selectedArea = Cache::get('selectedArea');

        $hasAddress = false;

        if($user->addresses->count()) {
            $hasAddress = true;
        }

        $products = $this->productModel->has('detail')->with(['detail','store'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);

        $shippingAddress = $user->addresses->first();

        return view('cart.checkout',compact('cart','user','hasAddress','selectedCountry','selectedArea','shippingAddress'));
    }


    public function postCheckout(Request $request)
    {

        $user = auth()->user();
        $user->load('addresses');
        $selectedCountry = Cache::get('selectedCountry');

        if(!$user->addresses->count()) {
            $this->validate($request,[
                'firstname' => 'required',
                'lastname' => 'required',
                'mobile' => 'required',
                'country_id' => 'required',
                'area_id' => 'required',
                'block' => 'required|integer',
                'street' => 'required|integer',
            ]);
            $addressFields = $request->only(['country_id','area_id','firstname','lastname','mobile','country_id','area_id','block','street']);
            $address = $user->addresses()->create($addressFields);
        } else {
            $address  = $user->addresses()->first();
        }

        $order = $user->orders()->create([
            'address_id' => $address->id,
            'net_amount' => '500',
            'sale_amount' => '500',
            'payment_method' => 'tap',
            'order_status' => '1',
            'captured_status' => '0',
            'invoice_id' => str_random(2),
        ]);

        $products = $this->productModel->has('detail')->with(['detail'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);

        $productInfo = collect();

        // save order details
        foreach ($cart->items as $product) {

            $order->orderDetails()->create([
                'product_id' => $product->id,
                'quantity' => $product->quantity,
                'price' => $product->detail->price,
                'sale_price' => $product->detail->sale_price
            ]);

            // build products for payment
            $productInfo->push([
                'Quantity' => $product->quantity,
                'CurrencyCode' => $selectedCountry['country_code'],
                'TotalPrice' => $product->subTotal,  // @todo : sale price ?
                'UnitDesc' => $product->sku,
                'UnitName' => $product->name,
                'UnitPrice' => $product->detail->price, // @todo : sale price ?
            ]);

        }

        $customerInfo = [
            'Email' => $user->email,
            'Mobile' => $order->address->mobile,
            'Name' => $order->address->firstname . ' ' . $order->address->lastname
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
            return redirect()->back()->with('error',__('Some error occurred during transaction, please try again'));
        }

        $this->cart->flushCart();

        return redirect()->away($paymentURL);

    }

}
