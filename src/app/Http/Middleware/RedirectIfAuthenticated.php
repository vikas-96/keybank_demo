<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guard($guard)->check()) {
           $role = \Auth::user()->getRoleNames()->first(); 
           $url = '/users';
           switch ($role) {
                case 'admin':
                    $url = '/assets';
                    break;
                case 'data-operator':
                    $url = '/users';
                    break; 
                case 'banker':
                    $url = '/asset-search';
                    break; 
                default:
                    $url = '/login'; 
                    break;
            }
            return redirect($url);
        }

        return $next($request);
    }
}
