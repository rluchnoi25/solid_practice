<?php

namespace App\Observers;

use App\Http\Services\EmailService;
use App\Models\User;

class UserObserver
{
    public function __construct(
        private EmailService $emailService,
    ) {   
    }

    public function created(User $user): void
    {
        $this->emailService->sendWelcomeEmail($user);
    }
}
