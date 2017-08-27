<?php

namespace App\Jobs;

use App\Contactus;
use App\Core\BaseMailer;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Contactus
     */
    private $contactus;
    /**
     * @var
     */
    private $email;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     * @param $email
     */
    public function __construct(Request $request, $email)
    {
        $this->request = $request;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @param BaseMailer $mailer
     */
    public function handle(BaseMailer $mailer)
    {

        $email = $this->email;
        $fromName= $this->request->name;
        $fromEmail= $this->request->email;
        $toName= $this->request->name;
        $toEmail= $this->email;

        $mailer->view = 'emails.contact';
        $mailer->fromName = $fromName;
        $mailer->fromEmail = $fromEmail;
        $mailer->toName = 'Vazzat.com';
        $mailer->toEmail = 'info@vazzat.com';
        $mailer->subject = 'Vazzat.com';
        $body = $this->request->body;
        $mailer->fire(['body'=>$body]);
    }
}
