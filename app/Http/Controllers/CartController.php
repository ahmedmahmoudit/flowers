<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Core\Cart\Cart;
use App\Product;
use Carbon\Carbon;
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
        $formDatas = $request->except('_token');

        $cartMessages = '';

        foreach ($formDatas as $key => $value) {
            if(str_contains($key,'quantity')) {
                // strip product ID from quanitity_{product_id} i.e => quantity_10 => 10
                $productID = substr($key,9);
                $product = $this->productModel
                    ->has('detail')
                    ->whereHas('store',function($q) {
                        $q->where('is_approved',1);
                    })
                    ->with(['detail'])->active()->find($productID);

                // check for enough quantity
                if($product){
                    if((int) $value > $product->detail->quantity) {
                        $cartMessages .= empty($cartMessages ? '' : ' .');
                        $cartMessages .= $product->name . __(' has only '.$product->detail->quantity ) . ' items left. ';
                    } else {
                        try {
                            $this->cart->updateItem([
                                'id'=> $productID,
                                'quantity'=>(int) $value]
                            );
                        } catch(\Exception $e) {
                            return redirect()->back()->with('error',$e->getMessage());
                        }
                    }
                }
            }
        }

        return redirect()->back()->with('success','Cart Updated. '.$cartMessages);
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
        $this->validate($request, [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'delivery_date' => 'required',
            'delivery_time' => 'required',
        ]);

        $product = $this->productModel
            ->has('detail')
            ->whereHas('store', function ($q) {
//                $q->where('is_approved', 1);
            })
            ->with(['detail', 'store'])->active()->find($request->product_id);

        if ($product) {
            $deliveryDate = Carbon::parse($request->delivery_date)->toDateString();
            $storeMinimumDeliveryDate = $product->store->minimum_delivery_days;
            $minimumDeliveryDate = Carbon::now()->addDays($storeMinimumDeliveryDate)->toDateString();

            if($deliveryDate < $minimumDeliveryDate) {
                return redirect()->back()->with('error',__('Cannot deliver before '.$minimumDeliveryDate))->withInput();
            }

            if ($product->detail->in_stock) {
                $this->cart->addItem([
                        'id'            => $request->product_id,
                        'quantity'      => (int)$request->quantity,
                        'delivery_date' => $request->delivery_date,
                        'delivery_time' => $request->delivery_time
                    ]
                );
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', __('Product is Out of Stock'))->withInput();
            }

        } else {
            return redirect()->back()->with('error', __('Cannot add this product to the cart'))->withInput();
        }
    }

    public function getCartItemCount()
    {
        return $this->cart->getItemsCount();
    }

    public function applyCoupon(Request $request)
    {

        return redirect()->back()->with('success',__('Coupon Applied'));

    }

}
