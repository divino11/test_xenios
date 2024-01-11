<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(SignUpRequest $request): JsonResponse
    {
        $user = new User($request->validated());

        $user->save();

        $authData = $request->only(['email', 'password']);

        Auth::attempt($authData);

        return response()->json([
            'token' => $user->createToken($user->id)->plainTextToken,
            'user' => $user->fresh(),
        ]);
    }
}
