<?php

namespace App\Jobs;

use App\Mail\SendOrderEmail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVendorEmail;

class SendEmailJobVendor
{
    use Dispatchable;
    public $email, $content,$subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$content,$subject)
    {
        //
        $this->email =$email;
$this->content= $content;
$this->content= $subject;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        try{
            Mail::to($this->email)->send(new SendVendorEmail( $this->content, $this->subject));
            Log::info("Mail Sent!");
        } catch(\Throwable $e) {
            Log::error($e->getMessage());
        }
    }
}
