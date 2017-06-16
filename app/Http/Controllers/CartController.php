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
        $products = $this->productModel->has('detail')->with(['detail'])->whereIn('id',$this->cart->getItems()->pluck('id')->toArray())->get();
        $cart = $this->cart->make($products);
        $selectedCountry = \Cache::get('selectedCountry');
        return view('cart.index',compact('cart','selectedCountry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //@todo: check for enough quantity

        $formDatas = $request->except('_token');

        foreach ($formDatas as $key => $value) {
            if(str_contains($key,'quantity')) {
                // strip product ID from quanitity_{product_id} i.e => quantity_10 => 10
                $productID = substr($key,9);
                try {
                    $this->cart->addItem(['id'=>$productID,'quantity'=>(int) $value]);
                } catch(\Exception $e) {
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

    public function removeItem(Request $request,$id)
    {
        $this->cart->removeItem($id);
        return redirect()->back()->with('success','Item Removed');
    }

    public function addItem(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $product = $this->productModel->with('detail')->find($request->product_id);

        if($product->detail->in_stock) {

            $this->cart->addItem(['id'=>$request->product_id,'quantity'=> (int) $request->quantity]);

            return redirect()->back()->with('success',__('Added item to the Cart'));

        } else {
            return redirect()->back()->with('error',__('Product is Out of Stock'));
        }

    }

    public function getCartItemCount()
    {
        return $this->cart->getItemsCount();
    }

}
