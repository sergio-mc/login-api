<?php

namespace App\Http\Middleware;


use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;
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
        try{
            $decoded = JWT::decode($request->getContent(), $key, array('HS256'));
            $request->logindata = $decoded;
            return $next($request);
        }catch(\Exception $e){
            Log::alert('Intento de acceso fallido');
            return response('El token no es correcto',401);
        }
        
        $email = $decoded->email;
        $password = $decoded->password;
        $response = 'Error';
        
        // 1ra forma mia de hacerlo.
        /*if(!empty($email) && !empty($password))
        {
            $request->attributes->add(['decoded' => json_encode($decoded)]);
            return $next($request);
        }else{return $response;}*/
        
        
    }
}
