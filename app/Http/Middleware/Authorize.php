<?php

namespace App\Http\Middleware;

use App\UnitConfig;
use App\User;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle($request, Closure $next)
    {
        $unauthorized = new Response($content='Unauthorized',$status=401);
        $headers = getallheaders();

        try{
            $token = $headers['token'];

            $tokenExists = true;

        }catch (\ErrorException $e) {
            $tokenExists = false;
        }

        if($tokenExists) {

            $userExists = User::where('token', $token)->exists();

            if($userExists)
                return $next($request);
            else
                return $unauthorized;
        }

        return $unauthorized;
    }
}
