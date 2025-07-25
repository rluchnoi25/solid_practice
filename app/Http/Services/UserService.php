<?php

namespace App\Http\Services;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;

class UserService 
{
    public function __construct(
        private UserRepository $userRepository,
    ) { 
    }

    public function save(array $data): User
    {
        return $this->userRepository->save($data);
    }
}