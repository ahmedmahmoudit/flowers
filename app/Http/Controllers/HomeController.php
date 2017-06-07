<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    /**
     * @var Product
     */
    private $productModel;

    /**
     * HomeController constructor.
     * @param Product $productModel
     */
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        //@todo : replace with the best selling products
        $bestSellers  = $this->productModel->has('detail')->with(['detail','store','userLikes'])->latest()->limit(4)->get();
        return view('home',compact('bestSellers'));
    }
}
