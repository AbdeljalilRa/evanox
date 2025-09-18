<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;
use App\Models\AccessRequest;

class StoreAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get store status from settings
        $storeStatus = Setting::get('store_status', 'off');

        // If store is on, allow normal access
        if ($storeStatus === 'on') {
            return $next($request);
        }

        // If store is off, check for valid password in session
        $sessionPassword = session('store_access_password');
        
        if ($sessionPassword) {
            // Verify the password is still valid
            $validPassword = AccessRequest::approved()
                ->where('password', $sessionPassword)
                ->exists();
                
            if ($validPassword) {
                return $next($request);
            } else {
                // Clear invalid password from session
                session()->forget('store_access_password');
            }
        }

        // If no valid access, redirect to coming soon page
        return redirect()->route('coming-soon');
    }
}