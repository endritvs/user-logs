# Laravel User Logs Package

The `endritvs/user-logs` package offers a robust solution to effortlessly track and log user activities in any Laravel application. With a breezy setup, maintain logs of user interactions to gain valuable insights - be it for debugging, monitoring, or auditing.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/endritvs/user-logs.svg?style=flat-square)](https://packagist.org/packages/endritvs/user-logs)

## 🌟 Features

- **Seamless Integration**: Just plug, play, and track! Integrates smoothly with existing Laravel applications.
- **Organized Logs**: Get logs neatly organized by individual user IDs, offering clear visibility into each user's actions.
- **Customizable**: Flexibility baked in! Adjust or extend default behaviors as per your unique requirements.
- **Performance Optimized**: Designed with minimal overhead to ensure logging doesn't bog down your application's speed.

## 🛠 Installation

### Step 1: Get the Package

Install the package through Composer:
\```bash
composer require endritvs/user-logs
\```

### Step 2: Configure

After a successful installation, register the custom logging channel in `config/logging.php`:
\```php
'user_logs' => [
    'driver' => 'custom',
    'via' => Endritvs\UserLogs\TrackUserLog::class,
]
\```

### Step 3: Dive Into Usage

With the channel configuration sorted, tap into Laravel's native logging system to note down user activities:
\```php
Log::channel('user_logs')->info('User performed a specific action.');
\```

By default, logs reside under the `storage/logs/user_logs` directory. They're classified by user ID and the controller action engaged.

## 🤝 Contributing

Open to contributions! If you've found a bug, want to propose a feature or feel you can enhance the existing functionalities, send a pull request.

## 📜 License

This package is licensed under the MIT License. See the [LICENSE](https://github.com/endritvs/user-logs/blob/main/LICENSE) file for details.
