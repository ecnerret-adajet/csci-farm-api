<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AppLoginController extends Controller
{

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        // create token
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 

            $tokenName = config('app.name');

            $token = $user->createToken($tokenName)->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }
        
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successfully'], 200);
    }
}
