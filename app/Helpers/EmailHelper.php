<?php
namespace App\Helpers;
use App\Jobs\SendEmailJob;
use App\Jobs\SendEmailJobVendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class EmailHelper
{
                   public static function sendEmail($data)
                 {
                                      //SendEmailJob::dispatch();
                                      // $emailJob(new SendEmailJob($data))->delay(Carbon::now()->addinutes (1));
                                      try{
                                      $emailJob=new SendEmailJob($data);
dispatch($emailJob);
} catch(\Throwable $e) { 
  Log::error($e->getMessage());
}
                 }
                 public static function sendEmailToVendor ($email, $content,$subject)
                 {
                           $emailJob = new SendEmailJobVendor ($email, $content,$subject); 
                           dispatch($emailJob);
                 }         
}                 