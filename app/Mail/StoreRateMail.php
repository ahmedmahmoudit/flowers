<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreRateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $userName;
    public $storeName;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $storeName, $token)
    {
        $this->userName = $userName;
        $this->storeName = $storeName;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.storeRate')->with([
            'user'    => $this->userName,
            'store'   => $this->storeName,
            'token'       => $this->token
        ]);
    }
}
