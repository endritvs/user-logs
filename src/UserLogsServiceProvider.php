<?php

namespace Endritvs\UserLogs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class UserLogsServiceProvider extends ServiceProvider
{
    public function boot(Kernel $kernel)
    {
        $kernel->pushMiddleware(\Endritvs\UserLogs\Middleware\TrackUserLogMiddleware::class);
    }

    public function register()
    {
        // Bindings in the service container.
    }
}
