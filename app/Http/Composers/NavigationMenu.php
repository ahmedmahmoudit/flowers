<?php
namespace App\Http\Composers;

use App\Category;
use App\Country;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NavigationMenu
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
     * @param Country $countryModel
     * @param Request $request
     * @param Category $categoryModel
     */
    public function __construct(Country $countryModel, Request $request,Category $categoryModel)
    {
        $this->countryModel = $countryModel;
        $this->request = $request;
        $this->categoryModel = $categoryModel;
    }

    public function compose(View $view)
    {

        if(!Cache::has('parentCategories')) {
            $parentCategories = $this->categoryModel->with('children')->where('parent_id',0)->get();
            Cache::put('parentCategories',$parentCategories,60*24);
        } else {
            $parentCategories = Cache::get('parentCategories');
        }

        $view->with([
            'parentCategories' => $parentCategories,
        ]);

    }

}