<?php

namespace App\Http\Middleware;

use App\UnitConfig;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUnit
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
        $unauthorized = new Response($content='Unauthorized',$status=401);
        $headers = getallheaders();

        try{
            $macId = $headers['mac_id'];

            $macIdExists = true;

        }catch (\ErrorException $e) {
            $macIdExists = false;
        }

        if($macIdExists){

            $unitExist = UnitConfig::where('mac_id',$macId)->exists();

            if($unitExist)
                return $next($request);
            else
                return $unauthorized;
        }

        return $unauthorized;
    }
}
