<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\User;

class WelcomeEmail extends Mailable
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build(): self
    {
        return $this->subject('Welcome to Our Platform!')
                    ->view('emails.welcome');
    }
}
