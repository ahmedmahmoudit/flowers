<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Core\Cart\Cart;
use App\Product;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $user->load('addresses');
        $selectedCountry = Cache::get('selectedCountry');

        $hasAddress = false;

        if($user->addresses->count()) {
            $hasAddress = true;
        }

        $products = $this->productModel->has('detail')->with(['detail'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);
        return view('cart.checkout',compact('cart','user','hasAddress','selectedCountry'));
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
            'net_amount' => '',
        ]);

    }

}
