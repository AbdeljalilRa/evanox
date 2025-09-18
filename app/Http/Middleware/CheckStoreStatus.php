<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CheckStoreStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $status = DB::table('settings')->where('key', 'store_status')->value('value');

        // Ila store off, w route ma hiya coming-soon
        if ($status === 'off' && !$request->is('coming-soon*')) {
            return redirect()->route('coming.soon');
        }

        return $next($request);
    }
}
