<?php

namespace App\Http\Services;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendWelcomeEmail(User $user): void
    {
        Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}