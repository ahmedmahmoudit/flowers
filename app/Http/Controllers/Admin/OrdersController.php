<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdate;
use App\Mail\StoreRateMail;
use App\Order;
use App\Repositories\OrderRepositoryInterface;
use App\StoreRate;
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
     * @var Order
     */
    private $orderModel;

    /**
     * OrderController constructor.
     *
     * @param OrderRepositoryInterface $order
     * @param Order $orderModel
     */
    public function __construct(OrderRepositoryInterface $order, Order $orderModel)
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
        if (Auth::user()->isStoreAdmin()) {
            // get all payment success order for store
            $store = Auth::user()->store;
            $orders = $store->orders()->captured()->latest()->get();
        } else {
            $orders = $this->orderModel->captured()->latest()->get();
        }

        return view('backend.shared.orders.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = $this->orderModel->with(['coupon', 'orderDetails.product','orderDetails.deliveryTime', 'user'])->find($id);

        if(!Auth::user()->isManager())
        {
            $store  = $order->stores()->where('store_id', Auth::user()->store->id)->first();

            $statusOfThisPart = $store->pivot->order_status;
        }

        return view('backend.shared.orders.show', compact('order', 'statusOfThisPart'));
    }
    /**
     *  Order Shipped
     * #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderShipped($id)
    {
        $order = $this->order->getById($id);
        $userEmail = $order->order_email ? $order->order_email : $order->user->email;
        if ($order->stores->count() > 1) {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if ($order->pivot->order_status == '-1') {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : 'Last Part of ';

            $order->stores->filter(function ($order) {
                if ($order->pivot->store_id == Auth::user()->store->id) {
                    $order->pivot->order_status = '2';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, 'Shipped', $isLastPart));
        } else {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '2';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '2']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, $status));

        }

        return route(Request::segment(1) . '.orders.show', $order->id);
    }

    /**
     *  Order Completed
     * #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderCompleted($id)
    {
        $order = $this->order->getById($id);
        $userEmail = $order->order_email ? $order->order_email : $order->user->email;
        if ($order->stores->count() > 1) {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if ($order->pivot->order_status != '3' || $order->pivot->order_status != '4') {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : 'Last Part of ';

            $order->stores->filter(function ($order) {
                if ($order->pivot->store_id == Auth::user()->store->id) {
                    $order->pivot->order_status = '3';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, 'Completed', $isLastPart));
        } else {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '3';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '3']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, $status));

        }

        //create store rate record to make user send feedback about store
        do {
            $token = sha1(time());
            $checkUnique = StoreRate::where('token', $token)->first();
        } while (!empty($checkUnique));

        StoreRate::create([
            'user_id'  => $order->user_id,
            'store_id' => Auth::user()->store->id,
            'token'    => $token,
        ]);

        Mail::to($userEmail)->queue(new StoreRateMail($order->user->name, Auth::user()->store->name, $token));


        return route(Request::segment(1) . '.orders.show', $order->id);
    }

    /**
     *  Order Cancelled
     * #
     * @var integer $id
     *
     * @return mixed
     */
    public function orderCancelled($id)
    {
        $order = $this->order->getById($id);
        $userEmail = $order->order_email ? $order->order_email : $order->user->email;
        if ($order->stores->count() > 1) {
            $pendingOrderStores = $order->stores->filter(function ($order) {
                if ($order->pivot->order_status != '3' || $order->pivot->order_status != '4') {
                    return $order;
                }
            })->count();

            $isLastPart = $pendingOrderStores > 1 ? 'Part of ' : '';

            $order->stores->filter(function ($order) {
                if ($order->pivot->store_id == Auth::user()->store->id) {
                    $order->pivot->order_status = '4';
                    $order->pivot->save();
                }
            });

            $order = $this->order->getById($id);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, 'Cancelled', $isLastPart));
        } else {
            $storeOrderStatus = $order->stores->first();
            $storeOrderStatus->pivot->order_status = '4';
            $storeOrderStatus->pivot->save();

            $this->order->updateStatus($id, ['order_status' => '4']);
            $order = $this->order->getById($id);
            $status = $order->orderStatusCast($order->order_status);

            Mail::to($userEmail)->queue(new OrderStatusUpdate($order, $status));

        }

        return route(Request::segment(1) . '.orders.show', $order->id);
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
