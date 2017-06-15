<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdate;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Mail;

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
        return view('backend.shared.orders.index', ['orders' => $orders]);
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

        return view('backend.shared.orders.show', compact('order'));
    }

    /**
     *  Order Shipped
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderShipped($id)
    {
        $this->order->updateStatus($id, ['order_status' => '2']);
        $order = $this->order->getById($id);
        $status = $order->orderStatusCast($order->order_status);

        Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        return route('manager.orders.show', $order->id);
    }

    /**
     *  Order Completed
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderCompleted($id)
    {
        $this->order->updateStatus($id, ['order_status' => '3']);
        $order = $this->order->getById($id);
        $status = $order->orderStatusCast($order->order_status);

        Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        return route('manager.orders.show', $order->id);
    }

    /**
     *  Order Cancelled
    #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderCancelled($id)
    {
        $this->order->updateStatus($id, ['order_status' => '4']);
        $order = $this->order->getById($id);
        $status = $order->orderStatusCast($order->order_status);

        Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        return route('manager.orders.show', $order->id);
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
