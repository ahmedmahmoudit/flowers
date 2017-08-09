<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSliderRequest;
use App\Product;
use App\Repositories\SliderRepositoryInterface;
use App\Store;

class SlidersController extends Controller
{
    /**
     * @var $slider
     */
    private $slider;
    /**
     * @var Product
     */
    private $productModel;
    /**
     * @var Store
     */
    private $storeModel;

    /**
     * SliderController constructor.
     *
     * @param SliderRepositoryInterface $slider
     * @param Store $storeModel
     */
    public function __construct(SliderRepositoryInterface $slider,Store $storeModel)
    {
        $this->slider = $slider;
        $this->storeModel = $storeModel;
    }

    /**
     * Show All sliders
     *
     * @return mixed
     */
    public function index()
    {
        $sliders = $this->slider->getAll();
        return view('backend.manager.slider.index', compact('sliders'));
    }

    /**
     * Create slider
     *
     * @return mixed
     */
    public function create()
    {
        $stores = $this->storeModel->latest()->get(['id','name_'.app()->getLocale()]);
        return view('backend.manager.slider.create',compact('stores'));
    }

    /**
     * Create a slider
     *
     * @var CreateSliderRequest $request
     *
     * @return mixed
     */
    public function store(CreateSliderRequest $request)
    {

        $attributes = $request->only(['image', 'store_id', 'order', 'description']);
        $this->slider->create($attributes);

        return redirect('manager/sliders');
    }


    /**
     * Delete a slider
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->slider->delete($id);



        return route('manager.sliders.index');
    }

    /**
     * Disable a slider
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function disable($id)
    {
        $this->slider->disable($id);

        Session()->flash('success', 'Slide Disabled Successfully!');
        return route('manager.sliders.index');
    }

    /**
     * Activate a slider
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function activate($id)
    {
        $this->slider->activate($id);

        return route('manager.sliders.index');
    }
}
