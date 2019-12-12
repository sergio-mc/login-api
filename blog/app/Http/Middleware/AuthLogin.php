<?php

namespace App\Http\Middleware;


use \Firebase\JWT\JWT;
use Closure;

class AuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $key = env('JWT_KEY');
        $decoded = JWT::decode($request->getContent(), $key, array('HS256'));
        $email = $decoded->email;
        $password = $decoded->password;
        $response = 'Error';
        
        if(!empty($email) && !empty($password))
        {
            $request->attributes->add(['decoded' => json_encode($decoded)]);
            return $next($request);
        }else{return $response;}
        
        
    }
}
