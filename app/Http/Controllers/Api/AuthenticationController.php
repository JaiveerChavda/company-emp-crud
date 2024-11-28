<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8' 
        ]);

        if(! Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Invalid Credentials',
            ],Response::HTTP_UNAUTHORIZED);
        }

        $user = User::firstWhere('email',$request->email);

            return response()->json([
                'message' => 'Authentication was successfull',
                'token' => $user->createToken('token for ' . $request->email)->plainTextToken
            ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'logged out successfully',
        ]);
    }
}
