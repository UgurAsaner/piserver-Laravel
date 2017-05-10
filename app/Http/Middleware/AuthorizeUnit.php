<?php

namespace App\Http\Middleware;

use App\UnitConfig;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUnit
{

    public function handle($request, Closure $next)
    {
        $unauthorized = new Response($content='Unauthorized',$status=401);
        $headers = getallheaders();

        try{
            $macId = $headers['macId'];

            $macIdExists = true;

        }catch (\ErrorException $e) {
            $macIdExists = false;
        }

        if($macIdExists){

            $unitExist = UnitConfig::where('mac_id',$macId)->exists();

            if($unitExist) {


                $unit = UnitConfig::where('mac_id',$macId)->first();

                $unit->ip = $request->ip();

                $unit->save();

                return $next($request);
            }
            else
                return $unauthorized;
        }

        return $unauthorized;
    }
}
