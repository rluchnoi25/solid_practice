<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService,
    ) {  
    }

    public function save(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userService->save($data);

        return response()->json([
            'user' => $user
        ]);
    }
}
