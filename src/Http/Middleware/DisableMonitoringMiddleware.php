<?php

namespace RiseTech\Monitoring\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use RiseTech\Monitoring\Monitoring;

class DisableMonitoringMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Route::is('monitoring.*')) {

            app(Monitoring::class)->disable();
        }

        return $next($request);
    }
}
