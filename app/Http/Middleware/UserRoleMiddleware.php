<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if (Auth::check() && Auth::user()->role == $role){
            return $next($request);
        }
        if (Auth::user()->role == "admin")
        {
            return redirect('/dashboard');
        }elseif (Auth::user()->role == "user")
        {
            return redirect('/');
        }
        return response()->json(["you don't have Permission to access this page"]);
    }
}
