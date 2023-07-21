<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailVendor extends Mailable
{
    use Queueable, SerializesModels;

    public  $content,$subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content,$subject)
    {
        //
$this->content= $content;
$this->content= $subject;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content= $this->content;
        return $this->from($address="noreply@laravelclass.com",config('app.name'))
            ->subject($this->subject)
            ->markdown('email.OrderEmailTemplate',compact('content'));
      
        // return $this->markdown('mail.send-email-vendor');
    }
}
