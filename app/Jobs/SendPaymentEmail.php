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
//        $this->sendCustomerCopy();
        $this->sendStoreCopy();
    }

    private function sendCustomerCopy() {

        $emailBody = [];
        $mailer = $this->mailer;

        $mailer->view = 'emails.payment_success_customer';
        $mailer->subject =  __('Payment receipt from Vazzat store') ;
//        $mailer->toEmail = $this->order->email;
        $mailer->toEmail = 'z4ls@live.com';
        $mailer->toName = $this->order->name;

        $emailBody['id'] = $this->order->id;
        $emailBody['invoice_id'] = $this->order->invoice_id;
        $emailBody['amount'] = $this->order->sale_amount;
        $emailBody['name'] = $this->order->firstname . ' ' .$this->order->lastname;
//        $emailBody['deliveryDate'] = $this->order->delivery_date;
//        $emailBody['deliveryTime'] = $this->order->delivery_time;

        // @TODO: ORDER DETAILS
        $emailBody['date'] = $this->order->created_at->format('d-m-Y');

        $mailer->fire($emailBody);
    }

    private function sendStoreCopy() {

        $mailer = $this->mailer;

        $mailer->view = 'emails.payment_success_store';
//        $mailer->subject =  __('New order at Vazzat store') ;
//        $mailer->toEmail = 'z4ls@live.com';
//        $mailer->toName = $this->order->name;

        foreach ($this->order->orderDetails as $orderDetail) {
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

            //product,quantity,netprice,deliverydate,time,createdat
            if($orderDetail->product && $orderDetail->product->store) {
                $store = $orderDetail->product->store;


                $emailBody['details']['id'] = $orderDetail->id;
                $emailBody['details']['product_name'] = $orderDetail->product->name;
                $emailBody['details']['order_id'] = $orderDetail->order_id;
                $emailBody['details']['sale_price'] = $orderDetail->sale_price;
                $emailBody['details']['quantity'] = $orderDetail->quantity;
                $emailBody['details']['delivery_date'] = $orderDetail->delivery_date;
                $emailBody['details']['delivery_time'] = $orderDetail->delivery_time;

                $mailer->subject =  '#'.$orderDetail->id.' '.__('New Order at Vazzat Store') ;
                $mailer->toEmail = 'z4ls@live.com';
                $mailer->toName = $store->name;

                $mailer->fire($emailBody);
            }

        }

        dd('a');


    }

}
