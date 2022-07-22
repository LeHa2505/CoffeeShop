<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class AuthToken extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard != null) {
            auth()->shouldUse($guard);
            if (!auth($guard)->user()) {
                throw new AuthenticationException();
            }
        }

        return $next($request);
    }
}
