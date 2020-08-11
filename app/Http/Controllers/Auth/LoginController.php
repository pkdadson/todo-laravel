<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $cred = $request->only(['email', 'password']);
        $token = auth()->JWTAuth::attempt($cred);

        return $token;
    }
}