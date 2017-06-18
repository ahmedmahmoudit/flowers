<?php

namespace App\Http\Controllers;

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
        if($request->result !== 'SUCCESS') {
            $status = 'danger';
            return view('payments.failure',compact('status'));
        }

        $selectedCountry = Cache::get('selectedCountry');
        $status = 'success';
        $order = $this->orderModel->with('orderDetails')->where('reference_code',$request->ref)->first();
        $order->captured_status = 1;
        $order->payment_method = $request->crdtype;
        $order->save();

        //@todo : update stock
//        try {
//            $this->dispatch(new SendSubscriptionEmail($subscription));
//        } catch (\Exception $e) {
//            dd($e);
//        }
//
//        try {
//            $this->dispatch(new SendPaymentEmail($subscription));
//        } catch (\Exception $e) {
//            dd($e);
//        }
        return view('payment.success',compact('status','order','selectedCountry'));
    }
}