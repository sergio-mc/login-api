<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Firebase\JWT\JWT;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //$key = "zanahoria";
        //$decoded = JWT::decode($request->getContent(), $key, array('HS256'));
        //return json_encode($decoded);
        return $request->get('decoded');
    }
}
