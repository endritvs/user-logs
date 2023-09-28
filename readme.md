# Laravel User Logs Package

The `endritvs/user-logs` package offers a robust solution to effortlessly track and log user activities in any Laravel application. With a breezy setup, maintain logs of user interactions to gain valuable insights for debugging, monitoring, or auditing.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/endritvs/user-logs.svg?style=flat-square)](https://packagist.org/packages/endritvs/user-logs)

## Features

- 🌟 **Seamless Integration**: Just plug, play, and track! Integrates smoothly with existing Laravel applications.
- 📂 **Organized Logs**: Logs neatly organized by individual user IDs, offering clear visibility into each user's actions.
- 🛠 **Customizable**: Adjust or extend default behaviors as per your unique requirements.
- 🚀 **Performance Optimized**: Designed with minimal overhead to ensure smooth application performance.

## Installation

1. **Get the Package**

    Install via Composer:
    ```bash
    composer require endritvs/user-logs:^dev-main
    ```

2. **Configure Middleware**

    Register the middleware in your application. First, add it to the `$routeMiddleware` property of your `app/Http/Kernel.php` file:
    ```php
    protected $routeMiddleware = [
        // ... other middleware ...
        'track.user.log' => \Endritvs\UserLogs\Middleware\TrackUserLogMiddleware::class,
    ];
    ```

    Now, you can use the `track.user.log` middleware in your routes file to apply it to individual routes or groups of routes:
    ```php
    Route::middleware('track.user.log')->group(function () {
        // ... your routes ...
    });
    ```

3. **Configure Logging Channel**

    Register the custom logging channel in `config/logging.php`:
    ```php
    'user_logs' => [
        'driver' => 'custom',
        'via' => Endritvs\UserLogs\TrackUserLog::class,
    ]
    ```

4. **Usage**

    Use Laravel's native logging system to log user activities:
    ```php
    Log::channel('user_logs')->info('User performed a specific action.');
    ```

    By default, logs are found in `storage/logs/user_logs`. They're sorted by user ID and the respective controller action.

## Contributing

We welcome contributions! If you spot a bug, have a feature suggestion, or can enhance the current functionalities, please send a pull request.

## License

This package adheres to the MIT License. Check out the [LICENSE](https://github.com/endritvs/user-logs/blob/main/LICENSE) file for more details.
