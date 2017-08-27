<?php

namespace App\Http\Controllers;

use App\Jobs\SendPaymentEmail;
use App\Order;
use Cache;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * @var Order
     */
    private $orderModel;

    /**
     * PaymentsController constructor.
     * @param Order $orderModel
     */
    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function processPayment(Request $request)
    {
        if ($request->result !== 'SUCCESS') {
            $status = 'danger';
            return view('payments.failure', compact('status'));
        }

        $selectedCountry = Cache::get('selectedCountry');
        $status = 'success';
        $order = $this->orderModel->with('orderDetails')->where('reference_code', $request->ref)->first();

//        if ($order->captured_status != 1) {
            $order->captured_status = 1;
            if ($order->coupon) {
                $order->coupon->quantity_left = $order->coupon->quantity_left - 1;
                $order->coupon->save();
            }
            $order->payment_method = $request->crdtype;
            $order->save();

//            try {
                $this->dispatch(new SendPaymentEmail($order));
//            } catch (\Exception $e) {
//                return redirect()->home()->with('error',__('Something went wrong during payment, try again'));
//            }


            //@todo: flush cart session
//        }

        dd('reached');

        return view('payment.success', compact('status', 'order', 'selectedCountry'));
    }
}
