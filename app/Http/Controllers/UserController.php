<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function save(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        $this->sendWelcomeEmail($user);

        return response()->json([
            'user' => $user
        ]);
    }

    public function sendWelcomeEmail(User $user): void
    {
        Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}
