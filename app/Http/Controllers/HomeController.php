<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Core\Cart\Cart;
use App\Product;
use App\Slider;

class HomeController extends Controller
{
    /**
     * @var Product
     */
    private $productModel;
    /**
     * @var Cart
     */
    private $cart;
    /**
     * @var Slider
     */
    private $sliderModel;
    /**
     * @var Ad
     */
    private $adModel;

    /**
     * HomeController constructor.
     * @param Product $productModel
     * @param Cart $cart
     * @param Slider $sliderModel
     * @param Ad $adModel
     */
    public function __construct(Product $productModel, Cart $cart, Slider $sliderModel, Ad $adModel)
    {
        $this->productModel = $productModel;
        $this->cart = $cart;
        $this->sliderModel = $sliderModel;
        $this->adModel = $adModel;
    }

    public function index()
    {
        $sliderImages = $this->sliderModel->orderBy('order','asc')->limit(5)->get();
        $ads = $this->adModel->orderBy('order','asc')->limit(3)->get();

        //@todo : replace with the best selling products
        $bestSellers  = $this->productModel
            ->has('detail')
            ->whereHas('store',function($q){
                return $q->where('is_approved',1);
            })
            ->with(['detail','store','userLikes'])
            ->active()
            ->limit(4)->get();

        $products = $this->productModel->has('detail','store')->latest()->active()->paginate(20);

        $cartItems = $this->cart->getItems();

        return view('home',compact('bestSellers','cartItems','sliderImages','ads','products'));
    }
}
