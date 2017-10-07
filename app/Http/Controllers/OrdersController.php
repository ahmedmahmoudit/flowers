<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var $order
     */
    private $order;
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * OrderController constructor.
     *
     * @param OrderRepositoryInterface $order
     * @param Order $orderModel
     */
    public function __construct(OrderRepositoryInterface $order,Order $orderModel)
    {
        $this->order = $order;
        $this->orderModel = $orderModel;
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

    public function trackOrder(Request $request)
    {

        $this->validate($request,[
           'invoice_id' => 'required'
        ]);

        $invoiceID = $request->invoice_id;

        $order = $this->orderModel->with('orderDetails')->where('invoice_id',$invoiceID)->first();

        if(!$order) {
            return redirect()->route('home')->with('warning',__('Invalid Invoice Number'));
        }

        return view('orders.track',compact('order'));
    }

}
