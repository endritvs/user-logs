<?php

namespace Endritvs\UserLogs;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class TrackUserLog
{
    public function __invoke(array $config)
    {
        $logger = new Logger('user_logs');

        if (Auth::check())
        {
            $user = Auth::user();
            $method = request()->route()->getActionMethod();

            $routeAction = request()->route()->getAction('controller');
            [$controllerNamespace, $controllerMethod] = explode('@', $routeAction);
            $controllerName = class_basename($controllerNamespace);

            $dateFormat = 'Y-m-d H:i:s';
            $logPath = storage_path("logs/user_logs/{$user->id}/{$controllerName}_{$method}.log");
            $userLogHandler = new StreamHandler($logPath);
            $userLogHandler->setFormatter(new LineFormatter(null, $dateFormat, true, true));

            $logger->pushHandler($userLogHandler);
            $logger->info("User {$user->id} {$user->name} {$user->email} accessed method {$method} in controller {$controllerName}");
        }

        return $logger;
    }
}
