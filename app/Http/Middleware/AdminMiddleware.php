<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            return $next($request);
        }
        else{
            return redirect()->route("admin.login");
        }
        if(auth()->user()->role=="admin" || auth()->user()->role=="teacher"){
            return $next($request);
        }
        else{
            return redirect()->route("admin.login")->with("error","You do not have admin access");
        }
    }
}
