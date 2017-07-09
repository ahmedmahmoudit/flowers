<?php

namespace App\Http\Controllers;

use App\Core\Cart\Cart;
use App\Product;

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
     * HomeController constructor.
     * @param Product $productModel
     * @param Cart $cart
     */
    public function __construct(Product $productModel, Cart $cart)
    {
        $this->productModel = $productModel;
        $this->cart = $cart;
    }

    public function index()
    {
        //@todo : replace with the best selling products
        $bestSellers  = $this->productModel->has('detail')->with(['detail','store','userLikes'])->latest()->paginate(20);
        $cartItems = $this->cart->getItems();
        return view('home',compact('bestSellers','cartItems'));
    }
}
