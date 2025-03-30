<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            // Redirect to login page if not authenticated
            return redirect()->route('login.form')->with('error', 'Please log in to access this page.');
        }
        // Check if the user is an admin
        // if (auth()->user()->role !== 'admin') {
        //     // Redirect to home page if not an admin
        //     return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        // }
        return $next($request);
    }
}
