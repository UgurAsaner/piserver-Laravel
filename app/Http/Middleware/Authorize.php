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
            else {

                $errorResponse = ['error' => 'Invalid Token'];
                return Response($errorResponse, 401);
            }
        }

        $errorResponse = ['error' => 'Token required'];
        return Response($errorResponse,401);
    }
}
