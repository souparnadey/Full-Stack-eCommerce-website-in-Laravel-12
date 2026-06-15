<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Check if the logged-in user is an admin.
     * Redirect to home if not authorized.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // If the user is not logged in or not an admin
        if (!$user || $user->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Access denied! Admins only.');
        }

        // Otherwise, allow the request
        return $next($request);
    }
}
