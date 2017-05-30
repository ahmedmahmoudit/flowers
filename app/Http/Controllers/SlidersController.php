<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
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
        return view('manager.slider.index', compact('sliders'));
    }

    /**
     * Create slider
     *
     * @return mixed
     */
    public function create()
    {
        return view('manager.slider.create');
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
     * Edit slider
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        $slider = $this->slider->getById($id);

        return view('manager.slider.edit', compact('slider'));
    }

    /**
     * Update a slider
     *
     * @var integer $id
     * @var UpdateSliderRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $attributes = $request->only(['image','order']);
        $this->slider->update($id, $attributes);

        return redirect()->route('sliders.index');
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

        return redirect()->route('slider.index');
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

        return redirect()->route('sliders.index');
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

        return redirect()->route('sliders.index');
    }
}
