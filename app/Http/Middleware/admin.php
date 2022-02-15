<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // The user is admin...
            if (Auth::user()->hasRole('superadministrator')) {
            # code...
            return $next($request);
        }
        else{
            return redirect('home');

        }

        }
        else{
            return redirect('login');

        }
    }
}
