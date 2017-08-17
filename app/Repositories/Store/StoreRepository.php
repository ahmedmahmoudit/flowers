<?php


namespace App\Repositories;

use App\Store;

class StoreRepository implements StoreRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentStore constructor.
     *
     * @param Store $model
     */
    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    /**
     * Get all stores.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get  store by Id.
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
     * Create a new store.
     *
     * @param array $attributes
     *
     * @return Store
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a store.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Store
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Update a store area.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Store
     */
    public function updateAreas($id, array $attributes)
    {
        $this->model->find($id)->areas()->detach();

        return $this->model->find($id)->areas()->attach($attributes);
    }

    /**
     * Delete a store.
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
     * Disable a store.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function disable($id)
    {
        return $this->model->find($id)->update(['is_approved' => '0']);
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
        return $this->model->find($id)->update(['is_approved' => '1']);
    }

    /**
     * Verify a store.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function Verify($id)
    {
        return $this->model->find($id)->update(['verified' => '1']);
    }

    /**
     * Un-Verify a store.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function unVerify($id)
    {
        return $this->model->find($id)->update(['verified' => NULL]);
    }
}