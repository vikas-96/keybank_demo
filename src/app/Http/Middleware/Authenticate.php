<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Exceptions\JWTException;
use Closure;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {

        // internal call
        if ($request instanceof \Dingo\Api\Http\InternalRequest) {
            if ($request->filled('auth') && $request->auth instanceof \App\Models\User) {
                Auth::guard('api')->loginUsingId($request->auth->id);
                return $next($request);
            }

            return response(['status' => 'error', 'message' => 'Internal Call Unauthenticated'], 400);
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
