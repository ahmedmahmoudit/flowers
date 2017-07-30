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
    }

    private function sendCustomerCopy() {

        $emailBody = [];
        $mailer = $this->mailer;

        $mailer->view = 'emails.payment_success_customer';
        $mailer->subject =  __('Payment Receipt') ;
        $mailer->toEmail = $this->order->email;
        $mailer->toName = $this->order->name;

        $emailBody['id'] = $this->order->id;
        $emailBody['invoiceNo'] = $this->order->invoice_id;
        $emailBody['amount'] = $this->order->sale_amount;
        $emailBody['name'] = $this->order->firstname . ' ' .$this->order->lastname;
        $emailBody['deliveryDate'] = $this->order->delivery_date;
        $emailBody['deliveryTime'] = $this->order->delivery_time;
        $emailBody['date'] = $this->order->created_at->format('d-m-Y');

        $mailer->fire($emailBody);
    }

}
