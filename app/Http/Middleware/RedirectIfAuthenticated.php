<?php

namespace App\Http\Middleware;
namespace Symfony\Component\HttpFoundation\Response;

use App\UnitConfig;
use App\User;
use Closure;
use Illuminate\Http\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        return Response::HTTP_UNAUTHORIZED;
    }
}
