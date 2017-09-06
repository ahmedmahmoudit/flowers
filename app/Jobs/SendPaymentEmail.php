<?php

namespace App\Jobs;

use App\Core\BaseMailer;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendPaymentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Order
     */
    private $order;

    private $mailer;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @param BaseMailer $mailer
     * @return void
     */
    public function handle(BaseMailer $mailer)
    {
        $this->mailer = $mailer;
        $this->sendCustomerCopy();
        $this->sendStoreCopy();
    }

    private function sendCustomerCopy() {

        $emailBody = [];
        $mailer = $this->mailer;


        $mailer->view = app()->getLocale() === 'ar' ? 'emails.payment_success_customer_v1_ar' : 'emails.payment_success_customer_v1_en';

        $mailer->subject =  trans('general.payment_mail_success_subject') ;
        $mailer->toEmail =  $this->order->email;
//        $mailer->toEmail = 'z4ls@live.com';
        $mailer->toName = $this->order->firstname . ' ' .$this->order->lastname;

        $emailBody['id'] = $this->order->id;
        $emailBody['invoice_id'] = $this->order->invoice_id;
        $emailBody['amount'] = $this->order->sale_amount;
        $emailBody['name'] = $this->order->firstname . ' ' .$this->order->lastname;
        $emailBody['mobile'] = $this->order->mobile;
        $emailBody['recipient_name'] = $this->order->recipient_firstname . ' ' .$this->order->recipient_lastname;
        $emailBody['recipient_mobile'] = $this->order->recipient_mobile;
        $emailBody['order_date'] = $this->order->created_at->format('d-m-Y');
        $emailBody['order_notes'] = $this->order->order_notes;
        $emailBody['card_notes'] = $this->order->card_notes;
        $emailBody['area'] =  $this->order->area ? $this->order->area->name : '';
        $emailBody['block'] =  $this->order->block;
        $emailBody['street'] =  $this->order->street;
        $emailBody['house'] =  $this->order->house;
        $emailBody['email'] =  $this->order->email;
        $emailBody['country'] =  $this->order->country->name;
        $emailBody['currency'] =  $this->order->country->currency_en;
        $emailBody['created_at'] =  $this->order->created_at->format('d-m-Y, h:i:s');
        $emailBody['track_link'] =  route('order.track',$this->order->invoice_id);

        foreach ($this->order->orderDetails as $orderDetail) {

            if ($orderDetail->product && $orderDetail->product->store) {
                $emailBody['details'] = [];
                $details = [];
                $details['product_name'] = $orderDetail->product->name;
                $details['store_name'] = $orderDetail->product->store->name;
                $details['sale_price'] = $orderDetail->sale_price;
                $details['quantity'] = $orderDetail->quantity;
                $details['delivery_date'] = $orderDetail->delivery_date;
                $details['delivery_time'] = $orderDetail->delivery_time;
                $emailBody['details'][] = $details;
            }
        }

        $mailer->fire($emailBody);
    }

    private function sendStoreCopy() {

        $mailer = $this->mailer;

        $mailer->view = 'emails.payment_success_store';

        $emailBody = [];
        $emailBody['invoice_id'] = $this->order->invoice_id;
        $emailBody['name'] = $this->order->firstname . ' ' .$this->order->lastname;
        $emailBody['mobile'] = $this->order->mobile;
        $emailBody['recipient_name'] = $this->order->recipient_firstname . ' ' .$this->order->recipient_lastname;
        $emailBody['recipient_mobile'] = $this->order->recipient_mobile;
        $emailBody['order_date'] = $this->order->created_at->format('d-m-Y');
        $emailBody['order_notes'] = $this->order->order_notes;
        $emailBody['card_notes'] = $this->order->card_notes;
        $emailBody['area'] =  $this->order->area ? $this->order->area->name : '';
        $emailBody['block'] =  $this->order->block;
        $emailBody['street'] =  $this->order->street;
        $emailBody['house'] =  $this->order->house;
        $emailBody['email'] =  $this->order->email;
        $emailBody['country'] =  $this->order->country->name;
        $emailBody['created_at'] =  $this->order->created_at->format('d-m-Y, h:i:s');

        foreach ($this->order->orderDetails as $orderDetail) {

            if($orderDetail->product && $orderDetail->product->store) {
                $store = $orderDetail->product->store;

                $emailBody['details'] = [];
                $details = [];
                $details['id'] = $orderDetail->id;
                $details['product_name'] = $orderDetail->product->name;
                $details['order_id'] = $orderDetail->order_id;
                $details['sale_price'] = $orderDetail->sale_price;
                $details['quantity'] = $orderDetail->quantity;
                $details['delivery_date'] = $orderDetail->delivery_date;
                $details['delivery_time'] = $orderDetail->delivery_time;

                $emailBody['details'][] = $details;

                $mailer->subject =  '#'.$orderDetail->id.' '.trans('general.new_order') ;
//                $mailer->toEmail =  'z4ls@live.com';
                $mailer->toEmail =  $store->email;
                $mailer->toName = $store->name;
                $mailer->fire($emailBody);
            }

        }


    }

}
