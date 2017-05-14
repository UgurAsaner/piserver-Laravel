<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class Tokenize
{
    public function handle($request, Closure $next)
    {
        $headers = getallheaders();

        
        try{
            $username = $headers['username'];
            $password = $headers['password'];

            $credentialsExist = true;

        }catch (\ErrorException $e) {
            $credentialsExist = false;
        }

        if($credentialsExist) {

            $userExists = User::where([
                'name' => $username,
                'password' => $password])->exists();

            if ($userExists) {

                $userid = User::where([
                    'name' => $username,
                    'password' => $password])->first()->id;

                $request->userid = $userid;

                return $next($request);
            }else{

                $errorResponse = ['error' => 'Invalid Username or Password'];
                return Response($errorResponse,401);
            }

        }

        $errorResponse = ['error' => 'Credentials Required'];
        return Response($errorResponse,401);
    }
}
