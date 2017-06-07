<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Core\Cart\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;
    private $productModel;
    private $countryModel;

    public function __construct(Cart $cart, Product $productModel,Country $countryModel)
    {
        $this->cart = $cart;
        $this->productModel = $productModel;
        $this->countryModel = $countryModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $this->cart->flushCart();
//        $this->cart->addItem(['id'=>7,'quantity'=>1,'product_attribute_id'=>1]);

        $cartItems = $this->cart->getItems();
        $products = $this->productModel->has('product_meta')->whereIn('id', $cartItems->keys())->get();
        $cart = $this->cart->make($products);

//        //@todo:// translate text
        $countries = $this->country->has('currency')->lists('name_'.app()->getLocale(),'id');

        return view('meem.frontend.modules.cart.index',compact('cart','countries','shippingCountry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        $formDatas = $request->except('_token');
        foreach ($formDatas as $key => $value) {
            if(str_contains($key,'quantity')) {
                // strip product ID from quanitity_{product_id} i.e => quantity_10 => 10
                $productID = substr($key,9);
//                dd($productID);
                try {
                    $this->cart->addItem(['id'=>$productID,'quantity'=>(int) $value]);
                } catch(\Exception $e) {
                    //@todo : Remove dd
                    dd($e->getMessage());
                    return redirect()->back()->with('error',$e->getMessage());
                }
            }
        }
        return redirect()->back()->with('success','Cart Updated');
    }

    public function clearCart()
    {
        $this->cart->flushCart();
        return redirect()->back()->with('success','Cart Cleared');
    }

    public function removeItem(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $this->cart->removeItem($request->product_id);
        return redirect()->back()->with('success','Item Removed');
    }

    public function addItem(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $this->cart->addItem(['id'=>$request->product_id,'quantity'=> (int) $request->quantity]);

        return redirect()->back()->with('success',trans('cart.updated'));

    }

    public function getCartItemCount()
    {
        return $this->cart->getItemsCount();
    }
    
}
