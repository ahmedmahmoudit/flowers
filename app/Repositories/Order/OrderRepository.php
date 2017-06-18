<?php


namespace App\Repositories;

use App\Order;
use App\OrderDetail;
use App\Store;
use Illuminate\Support\Facades\Auth;

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
     * Get all Orders' store.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getByStore()
    {
        $store = Store::find(Auth::user()->store->id);
        $storeProducts = $store->productsIds;
        $items = OrderDetail::selectRaw('count(*) AS ord, order_id')->whereIn('product_id', $storeProducts)->groupBy('order_id')->get();

        $orders = [];
        foreach ($items as $item)
        {
            $orders[] = $item->order;
        }

        return $orders;
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