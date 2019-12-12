<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $decoded = json_decode($request->get('decoded'));
        $email = $decoded->email;
        $password = $decoded->password;

        $logEmail = Log::notice('Email: '.$email);
        $logPassword = Log::notice('Password: '.$password);

        return $request->get('decoded');
    }
}
