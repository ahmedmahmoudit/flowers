<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepositoryInterface;

class OrdersController extends Controller
{
    /**
     * @var $order
     */
    private $order;

    /**
     * OrderController constructor.
     *
     * @param OrderRepositoryInterface $order
     */
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }

    /**
     * Show All orders
     *
     * @return mixed
     */
    public function index()
    {
        $orders = $this->order->getAll();
        return view('manager.order.index', ['orders' => $orders]);
    }

    /**
     * Show Order
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $order = $this->order->getById($id);

        return view('manager.order.show', compact('order'));
    }

    /**
     * Update order status
     *
     * @var integer $id
     * @var UpdateOrderRequest $request
     *
     * @return mixed
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $attributes = $request->only(['status']);
        $this->order->updateStatus($id, $attributes);

        return redirect()->route('orders.index');
    }

    /**
     * Delete order
     *
     * @var integer $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $this->order->delete($id);

        return redirect()->route('orders.index');
    }
}
