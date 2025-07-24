<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\Discount\DiscountService;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService,
        private DiscountService $discountService,
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

    public function getDiscountValue(DiscountRequest $request): JsonResponse
    {
        $data = $request->validated();
        $discountValue = $this->discountService->getValue($data);

        return response()->json([
            'discount_value' => $discountValue
        ]);
    }
}
