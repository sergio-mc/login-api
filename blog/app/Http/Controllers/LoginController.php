<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;
use App\Access;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $infologin = $request->logindata;

        Log::info('El usuario '.$infologin->email.' se ha registrado');


        $newAccess = new Access;

        $newAccess->email = $infologin->email;
        $newAccess->created_date = date("Y-m-d H:i:s");
        $newAccess->save();
        return response('Acceso correcto');

        // 1ra forma mia de hacerlo 
        /*$decoded = json_decode($request->get('decoded'));
        $email = $decoded->email;
        $password = $decoded->password;

        $logEmail = Log::notice('Email: '.$email);
        $logPassword = Log::notice('Password: '.$password);

        return $request->get('decoded');*/
    }
}
