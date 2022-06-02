<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user_credentials = $request->all(['email', 'password']);

        $token = auth('api')->attempt($user_credentials);

        if($token) {
            return response()->json(['token' => $token]);
        }else {
            //403 - invalid login
            return response()->json(['error' => 'Invalid username or password'], 403);
        }
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout Successful']);
    }
}
