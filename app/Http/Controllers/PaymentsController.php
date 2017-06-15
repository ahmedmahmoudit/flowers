<?php

namespace App\Http\Controllers;

use App\Billing\Billing;
use App\Jobs\SendPaymentEmail;
use App\Jobs\SendSubscriptionEmail;
use App\Models\Subscription;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    /**
     * @var Subscription
     */
    private $subscriptionModel;
    /**
     * @var SubscriptionPackage
     */
    private $subscriptionPackageModel;

    /**
     * @param Subscription $subscriptionModel
     * @param SubscriptionPackage $subscriptionPackageModel
     */

    public function __construct(Subscription $subscriptionModel, SubscriptionPackage $subscriptionPackageModel)
    {
        $this->subscriptionModel = $subscriptionModel;
        $this->subscriptionPackageModel = $subscriptionPackageModel;
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

        $status = 'success';
        $subscription = $this->subscriptionModel->with('package')->where('reference_code',$request->ref)->first();
        $subscription->status = $status;
        $subscription->amount = $request->amt;
        $subscription->active = 1;
        $subscription->save();

        try {
            $this->dispatch(new SendSubscriptionEmail($subscription));
        } catch (\Exception $e) {
            dd($e);
        }

        try {
            $this->dispatch(new SendPaymentEmail($subscription));
        } catch (\Exception $e) {
            dd($e);
        }

        return view('payments.success',compact('status','subscription'));
    }
}
