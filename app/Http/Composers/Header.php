<?php
namespace App\Http\Composers;

use App\Category;
use App\Core\Cart\Cart;
use App\Core\Cart\SessionCart;
use App\Country;
use App\Product;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Header
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Category
     */
    private $categoryModel;
    /**
     * @var SessionCart
     */
    private $cart;
    /**
     * @var Product
     */
    private $productModel;

    /**
     * @param Country $countryModel
     * @param Request $request
     * @param Category $categoryModel
     * @param Cart $cart
     * @param Product $productModel
     */
    public function __construct(Country $countryModel, Request $request,Category $categoryModel,Cart $cart, Product $productModel)
    {
        $this->countryModel = $countryModel;
        $this->request = $request;
        $this->categoryModel = $categoryModel;
        $this->cart = $cart;
        $this->productModel = $productModel;
    }

    public function compose(View $view)
    {
        $countries = Cache::get('countries');
        $selectedCountry = Cache::get('selectedCountry');
        $selectedArea = Cache::get('selectedArea');
        $areas = $selectedCountry['areas'];

        if(!Cache::has('parentCategories')) {
            $parentCategories = $this->categoryModel->with('children')->where('parent_id',0)->get();
            Cache::put('parentCategories',$parentCategories,60*24);
        } else {
            $parentCategories = Cache::get('parentCategories');
        }

        $cartItemsCount = $this->cart->getItemsCount();

        $cartItems = $this->productModel->has('detail')->with(['detail'])->whereIn('id',$this->cart->getItems()->pluck('id'))->get();

        $view->with([
            'countries' => $countries,
            'areas' => $areas,
            'selectedArea' => $selectedArea,
            'selectedCountry' => $selectedCountry,
            'locale' => app()->getLocale(),
            'parentCategories' => $parentCategories,
            'cartItemsCount' => $cartItemsCount,
            'cartItems' => $cartItems
        ]);

    }

}