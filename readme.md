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
    composer require endritvs/user-logs
    ```

2. **Configure**

    Post-installation, register the custom logging channel in `config/logging.php`:
    ```php
    'user_logs' => [
        'driver' => 'custom',
        'via' => Endritvs\UserLogs\TrackUserLog::class,
    ]
    ```

3. **Usage**

    Use Laravel's native logging system to log user activities:
    ```php
    Log::channel('user_logs')->info('User performed a specific action.');
    ```

    By default, logs are found in `storage/logs/user_logs`. They're sorted by user ID and the respective controller action.

## Contributing

We welcome contributions! If you spot a bug, have a feature suggestion, or can enhance the current functionalities, please send a pull request.

## License

This package adheres to the MIT License. Check out the [LICENSE](https://github.com/endritvs/user-logs/blob/main/LICENSE) file for more details.
