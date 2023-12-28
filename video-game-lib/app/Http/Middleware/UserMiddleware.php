<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        } elseif (auth()->check() && auth()->user()->isUser()) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have permission to access this resource.');
    }
}
