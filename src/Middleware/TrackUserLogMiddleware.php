<?php

namespace Endritvs\UserLogs\Middleware;

use Closure;
use Endritvs\UserLogs\TrackUserLog;

class TrackUserLogMiddleware
{
    public function handle($request, Closure $next)
    {
        $trackUserLog = new TrackUserLog();
        $trackUserLog();

        return $next($request);
    }
}
