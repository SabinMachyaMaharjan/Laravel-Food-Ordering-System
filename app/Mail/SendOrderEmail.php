<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailable\Content;
// use Illuminate\Mail\Mailable\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Content;

class SendOrderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public  $fullname, $cart,$subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $cart,$subject)
    {
        //
        $this->fullname =$fullname;
$this->cart->$cart; 
$this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function envelope(): Envelope
{
    return new Envelope(
        subject: $this->subject,

    );
}
    // public function build()
    public function content(): Content
    {
        try{
        // $fullname= $this->fullname;
        // $cart= $this->cart;
        // return $this->from($address="noreply@laravelclass.com",config('app.name'))
        //     ->subject($this->subject)
        //     ->markdown('email.OrderEmailTemplate',compact('fullname','cart'));
        // return $this->markdown('mail.send-order-email');
        return new Content
(
          view:"email.OrderEmailTemplate",
);
    } catch (\Throwable $e) {
    Log::error($e->getMessage());
}
    }
    public function attachments(): array 
{
    
    return [];
}
}
