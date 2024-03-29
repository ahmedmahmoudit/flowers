<?php

namespace App\Mail;

use App\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreCampaign extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $body;
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Store $subscriber, $title, $body)
    {
        $this->subscriber = $subscriber;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter')->with([
            'title' => $this->title,
            'body' => $this->body,
            'name' => $this->subscriber->name,
            'email' => $this->subscriber->email
        ]);
    }
}
