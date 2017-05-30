<?php


namespace App\Repositories;

use App\Slider;

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
        return $this->model->create($attributes);
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
        return $this->model->find($id)->update(['active' => 0]);
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
        return $this->model->find($id)->update(['active' => 1]);
    }
}