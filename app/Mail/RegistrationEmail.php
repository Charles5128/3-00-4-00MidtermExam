<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.registration')
                    ->subject('Please Verify Your Email Address')
                    ->with([
                        'verificationUrl' => route('verify.email', ['id' => $this->user->id]),
                    ]);
    }
}