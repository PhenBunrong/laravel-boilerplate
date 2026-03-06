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
        // $request->validate([
        //     'email' => ['required', 'string', 'email'],
        //     'password' => ['required', 'string'],
        // ]);

        // $user = Auth::attempt($request->only('email', 'password'), $request->boolean('remember'));

        // if (! $user) {
        //     return response()->json(['message' => 'Invalid credentials'], 401);
        // }

        $request->authenticate();
        
        /** @var User $user */
        $user = $request->user();
        $token = $user->createToken($user->name)->plainTextToken;

        // return ['token' => $token];

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => auth()->user(),
        ]); 
    }

    public function destroy(Request $request): Response
    {
        return $request->user()->currentAccessToken()->delete();
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return response()->noContent();
    }
}
