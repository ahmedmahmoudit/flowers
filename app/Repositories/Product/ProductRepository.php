<?php


namespace App\Repositories;

use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentProduct constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get all Products.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get all Products' store.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getByStore()
    {
        return $this->model->where('store_id', Auth::user()->store->id)->get();
    }

    /**
     * Get product by Id.
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
     * Create a new product.
     *
     * @param array $attributes
     *
     * @return Product
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a product.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Product
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete a product.
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
     * Disable a product.
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
     * Activate a product.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function activate($id)
    {
        return $this->model->find($id)->update(['active' => '1']);
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