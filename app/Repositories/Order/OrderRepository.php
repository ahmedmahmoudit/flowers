<?php


namespace App\Repositories;

use App\Order;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var $model
     */
    private $model;

    /**
     * EloquentUser constructor.
     *
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Get all orders.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get  order by Id.
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
     * Update order status.
     *
     * @param integer $id
     * @param array $attributes
     *
     * @return Order
     */
    public function updateStatus($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete order.
     *
     * @param integer $id
     *
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}