<?php
namespace App\Core;

use Config;
use Illuminate\Contracts\Mail\Mailer;

class BaseMailer
{
    public $toEmail;
    public $toName;
    public $fromEmail;
    public $fromName;
    public $subject;
    public $view;
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->toEmail = env('ADMIN_EMAIL');
        $this->toName = env('ADMIN_NAME');
        $this->fromEmail = env('MAIL_FROM_ADDRESS');
        $this->fromName = env('MAIL_FROM_NAME');
        $this->view = 'emails.welcome';
    }

    public function fire($data)
    {

        $data = (array) $data;

        // type cast to array if the params is an object

        $this->mailer->send($this->view, $data, function ($message) {
            $message
                ->from($this->fromEmail, $this->fromName)
                ->sender($this->fromEmail, $this->fromName)
                ->to($this->toEmail, $this->toName)
                ->subject($this->subject);
        });

    }
}