<?php

namespace Endritvs\UserLogs;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class TrackUserLog
{
    public function __invoke()
    {
        $method = $this->getMethodName();
        $controllerName = $this->getControllerName();
        $user = Auth::user();

        $logPath = self::getLogPath($user, $controllerName, $method);
        $logger = self::configureLogger($logPath);

        self::logUserAccess($logger, $user, $controllerName, $method);

        return $logger;
    }

    protected static function getMethodName()
    {
        return request()->route()->getActionMethod();
    }

    protected static function getControllerName()
    {
        $routeAction = request()->route()->getAction('controller');
        [$controllerNamespace] = explode('@', $routeAction);
        return class_basename($controllerNamespace);
    }

    protected static function getLogPath($user, $controllerName, $method)
    {
        $logDirectory = Auth::check() ? $user->id : 'all';
        $date = now()->format('Y_m_d');
        return storage_path("logs/user_logs/{$logDirectory}/{$controllerName}_{$method}_{$date}.log");
    }

    protected static function configureLogger($logPath)
    {
        $logger = new Logger('user_logs');
        $dateFormat = 'Y-m-d H:i:s';
        $handler = new StreamHandler($logPath);
        $handler->setFormatter(new LineFormatter(null, $dateFormat, true, true));
        $logger->pushHandler($handler);
        return $logger;
    }

    protected static function logUserAccess($logger, $user, $controllerName, $method)
    {
        if (Auth::check()) {
            $logger->info("User {$user->id} {$user->name} {$user->email} accessed method {$method} in controller {$controllerName}");
        } else {
            $logger->info("User accessed method {$method} in controller {$controllerName}");
        }
    }
}
