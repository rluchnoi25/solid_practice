<?php

namespace App\Http\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositorySaveInterface;

class UserService 
{
    public function __construct(
        private UserRepositorySaveInterface $userRepository,
    ) { 
    }

    public function save(array $data): User
    {
        return $this->userRepository->save($data);
    }
}
