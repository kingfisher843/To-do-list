<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LoginRequest;
use App\Http\Resources\v1\UserResource;
use App\Http\Resources\v1\UserCollection;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    /**
     * Login existing user
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->all();

        if (!Auth::attempt($credentials))
        {
            return response->json([
                'error' => 'Your credentials are incorrect, try again.',
            ]);
        }
            
            $user = Auth::user();

            Auth::login($user);
            
           $token = $user->createToken('user_auth_token')->accessToken;

            return response->json([
                'message' => 'You are logged in',
                'token' => $token,
            ]);
    }

    /**
     * log out user
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        
        return response([
            'message' => 'Logged out successfully', 
        ]);
    }
}

