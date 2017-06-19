<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;
    public $status;
    public $order;
    public $partOfOrder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $status, $partOfOrder = '')
    {
        $this->order = $order;
        $this->status = $status;
        $this->partOfOrder = $partOfOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderStatus')->with([
            'status'        => $this->status,
            'partOfOrder'   => $this->partOfOrder,
            'order'         => $this->order
        ]);
    }
}
