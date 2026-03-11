<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        /** @var User $user */
        $user = $request->user();
        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => auth()->user(),
        ]); 
    }

    public function destroy(Request $request): Response
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
