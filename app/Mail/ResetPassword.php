<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable{
    use Queueable, SerializesModels;
    public $EmailData;
    public function __construct($EmailData){
        $this->EmailData = $EmailData;
    }
    public function build(){
        return $this->markdown('emails/reset-password')
                    ->subject('Reset Your Password');
    }
}