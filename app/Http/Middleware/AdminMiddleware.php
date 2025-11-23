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
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // Ila user ma kaynch wla role dyalo machi admin
        if (!$user || $user->role !== 'admin') {
            // Redirect l-page li ja menha b message flash
            return redirect()->back()->with('error', 'Access denied. Admin only.');
        }

        return $next($request);
    }
}
