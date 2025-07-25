<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositorySaveInterface;
use Error;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositorySaveInterface
{
    public function save(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
}
