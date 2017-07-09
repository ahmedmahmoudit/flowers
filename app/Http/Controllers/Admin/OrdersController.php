<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdate;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

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
        if(Auth::user()->isStoreAdmin())
        {
            $orders = $this->order->getByStore();
        }
        else
        {
            $orders = $this->order->getAll();
        }

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
        if(!Auth::user()->isManager())
        {
            $store  = $order->stores()->where('store_id', Auth::user()->store->id)->first();
            $statusOfThisPart = $store->pivot->order_status;
        }

        return view('backend.shared.orders.show', compact('order', 'statusOfThisPart'));
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
        $order = $this->order->getById($id);
        if($order->stores->count() > 1)
        {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if($order->pivot->order_status == '-1')
                {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : 'Last Part of ';

            $order->stores->filter(function ($order) {
                if($order->pivot->store_id == Auth::user()->store->id)
                {
                    $order->pivot->order_status = '2';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, 'Shipped', $isLastPart));
        }
        else
        {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '2';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '2']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        }

        return route(Request::segment(1).'.orders.show', $order->id);
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
        $order = $this->order->getById($id);
        if($order->stores->count() > 1)
        {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if($order->pivot->order_status != '3' || $order->pivot->order_status !='4')
                {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : 'Last Part of ';

            $order->stores->filter(function ($order) {
                if($order->pivot->store_id == Auth::user()->store->id)
                {
                    $order->pivot->order_status = '3';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, 'Completed', $isLastPart));
        }
        else
        {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '3';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '3']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        }

        return route(Request::segment(1).'.orders.show', $order->id);
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
        $order = $this->order->getById($id);
        if($order->stores->count() > 1)
        {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if($order->pivot->order_status != '3' || $order->pivot->order_status !='4')
                {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : '';

            $order->stores->filter(function ($order) {
                if($order->pivot->store_id == Auth::user()->store->id)
                {
                    $order->pivot->order_status = '4';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, 'Cancelled', $isLastPart));
        }
        else
        {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '4';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '4']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($order->order_email)->queue(new OrderStatusUpdate($order, $status));

        }

        return route(Request::segment(1).'.orders.show', $order->id);
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
