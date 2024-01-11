<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\AccessRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    public function store(AccessRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            return response()->json(['message' => __('auth.failed')], 401);
        }

        $user = Auth::user();

        return response()->json([
            'token' => $user->createToken($user->id)->plainTextToken,
            'user' => $user,
        ]);
    }
}
