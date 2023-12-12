<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAuthenticatedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return $next($request);
        }

        return redirect()->route('login.page')->with('error', 'You must be logged in to access this page.');
    }
}
