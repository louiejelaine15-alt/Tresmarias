<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $fullname;

    public function __construct($code, $fullname)
    {
        $this->code = $code;
        $this->fullname = $fullname;
    }

    public function build()
    {
        return $this->subject('BPPLMS - Email Verification Code')
                    ->html("
                        <h2>Welcome to BPPLMS, {$this->fullname}!</h2>
                        <p>Thank you for registering. Your email confirmation code is:</p>
                        <h1 style='color: #1677a8; font-size: 32px; letter-spacing: 5px;'>{$this->code}</h1>
                        <p>Please enter this code on the verification screen to activate your student account.</p>
                    ");
    }
}