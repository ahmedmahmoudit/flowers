<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceipt extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var array
     */
    public $params;

    /**
     * Create a new message instance.
     *
     * @param array $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.payment_receipt',$this->params)
            ->with('link',route('order.tack',$this->params->invoice_id))
            ;
    }

}
