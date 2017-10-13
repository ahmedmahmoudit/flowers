<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Area;
use App\Core\Cart\Cart;
use App\Product;
use App\Slider;
use Cache;

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
     * @var Area
     */
    private $areaModel;

    /**
     * HomeController constructor.
     * @param Product $productModel
     * @param Cart $cart
     * @param Slider $sliderModel
     * @param Ad $adModel
     * @param Area $areaModel
     */
    public function __construct(Product $productModel, Cart $cart, Slider $sliderModel, Ad $adModel, Area $areaModel)
    {
        $this->productModel = $productModel;
        $this->cart = $cart;
        $this->sliderModel = $sliderModel;
        $this->adModel = $adModel;
        $this->areaModel = $areaModel;
    }

    public function index()
    {
        $sliderImages = $this->sliderModel->orderBy('order', 'asc')->limit(5)->get();
        $ads = $this->adModel->latest()->limit(3)->get();

        $selectedArea = session()->get('selectedArea');

        $area = $this->areaModel
            ->whereHas('stores', function ($q) {
                return $q->where('is_approved', 1);
            })
            ->with(['stores'])
            ->find($selectedArea['id']);

        $areaStores = $area ? $area->stores->pluck('id') : [];

        //@todo : replace with the best selling products
        $bestSellers = $this->productModel
            ->has('detail')
            ->whereHas('store', function ($q) {
                return $q->where('is_approved', 1);
            })
            ->with(['detail', 'store', 'userLikes'])
            ->active()
            ->whereIn('store_id', $areaStores)
            ->limit(4)->get();

        $products = $this->productModel->has('detail')
            ->whereHas('store', function ($q) {
                return $q->where('is_approved', 1);
            })
            ->with(['detail', 'store', 'userLikes'])
            ->whereIn('store_id', $areaStores)
            ->latest()->active()->paginate(20);

        $cartItems = $this->cart->getItems();

        return view('home', compact('bestSellers', 'cartItems', 'sliderImages', 'ads', 'products'));
    }
}
