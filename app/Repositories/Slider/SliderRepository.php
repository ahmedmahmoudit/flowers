<?php


namespace App\Repositories;

use App\Slider;
use Intervention\Image\Facades\Image;

class SliderRepository implements SliderRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentSlider constructor.
     *
     * @param Slider $model
     */
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    /**
     * Get all sliders.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get slider by Id.
     *
     * @param integer $id
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new slider.
     *
     * @param array $attributes
     *
     * @return Slider
     */
    public function create(array $attributes)
    {
        $this->checkOrderExist($attributes['order']);
        $imageName = str_random(15);
        Image::make($attributes['image'])->resize(1425, 500)->encode('jpg')->save('uploads/slides/'.$imageName.'.jpg');

        $data = [
            'order' => $attributes['order'],
            'link'  => $attributes['link'],
            'image' => $imageName.'.jpg'
        ];

        return $this->model->create($data);
    }

    /**
     * check if slide already exist with same order.
     *
     * @param int $order
     */
    public function checkOrderExist($order)
    {
        $slide = $this->model->where('order', $order)->first();
        if($slide)
        {
            $nextOrder = $this->nextSlideOrder();
            $slide->update([
                'active' => '0',
                'order'  => $nextOrder
            ]);
        }
    }

    /**
     * Get next order number in slides.
     *
     * @return  int $order
     */
    public function nextSlideOrder()
    {
        $slide = $this->model->all()->max('order');
        $nextOrder = $slide + 1;

        return$nextOrder;
    }

    /**
     * Update a slider.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Slider
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a slider.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * Disable a slider.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function disable($id)
    {
        return $this->model->find($id)->update(['active' => '0']);
    }

    /**
     * Activate a store.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function activate($id)
    {
        return $this->model->find($id)->update(['active' => '1']);
    }
}