<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckStoreStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $status = DB::table('settings')->where('key', 'store_status')->value('value');
        $isComingSoonRoute = $request->is('coming-soon*');

        if ($status === 'off') {
            if (!Session::get('store_access')) {
                if (!$isComingSoonRoute) {
                    return redirect()->route('coming.soon');
                }
            }
        }

        return $next($request);
    }
}
