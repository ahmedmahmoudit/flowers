<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Core\Cart\Cart;
use App\Product;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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




//        'id');
//        'user_id'
//        'address_id'
//        'user_id'
//        'coupon_id'
//        'coupon_id'
//        'coupon_value'
//        'sale_amount'
//        'net_amount'
//        'payment_method'
//        'order_status'
//        'captured_status'
//        'invoice_id'
//        'order_email'
//        'order_address'
//        'delivery_date'
//        'delivery_time'

        // create an order
        // notify user // sms ? email ?
        //

        $order = $user->orders()->create([
            'address_id' => $address->id,
            'net_amount' => '500',
            'sale_amount' => '500',
            'payment_method' => 'tap',
            'order_status' => '1',
            'captured_status' => '0',
            'invoice_id' => str_random(2),
//            'invoice_id' => str_random(2),
        ]);

        //@todo  save order detilas

        $customerInfo = [
            'Email' => $user->email,
            'Mobile' => $order->address->mobile,
            'Name' => $order->address->firstname . ' ' . $order->address->lastname
        ];

        $productInfo = [[
            'Quantity' => 1,
            'CurrencyCode' => 'KWD',
            'TotalPrice' => $order->net_amount,
            'UnitDesc' => 'Subscription Title',
            'UnitName' => 'Subscription Title',
            'UnitPrice' => $order->net_amount,
        ]];

        $gatewayInfo = ['Name' => 'ALL'];

        $merchantInfo = [
            'MerchantID' => env('BILLING_MERCHANT_ID'),
            'UserName' => env('BILLING_USERNAME'),
            'Password' => env('BILLING_PASSWORD'),
            'ReturnURL' => env('PAYMENT_RETURN_URL'),
            'AutoReturn' => 'Y',
            'LangCode' => 'AR',
            'ReferenceID' => uniqid(),
        ];

        $billing = app()->make(Billing::class);
        $billing->setCustomer($customerInfo);
        $billing->setProducts($productInfo);
        $billing->setGateway($gatewayInfo);
        $billing->setMerchant($merchantInfo);

        $paymentRequest = $billing->requestPayment();
        $response = $paymentRequest->response->getRawResponse();
        $paymentURL = $response->PaymentURL;
        $order->reference_code = $response->ReferenceID;
        $order->save();


        return redirect()->away($paymentURL);


    }

}
