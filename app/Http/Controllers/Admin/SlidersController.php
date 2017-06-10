<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSliderRequest;
use App\Repositories\SliderRepositoryInterface;

class SlidersController extends Controller
{
    /**
     * @var $slider
     */
    private $slider;

    /**
     * SliderController constructor.
     *
     * @param SliderRepositoryInterface $slider
     */
    public function __construct(SliderRepositoryInterface $slider)
    {
        $this->slider = $slider;
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
        return view('backend.manager.slider.create');
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

        $attributes = $request->only(['image','order']);
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
