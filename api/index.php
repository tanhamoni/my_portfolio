<?php

// Enable error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. Ensure all writable directories exist in /tmp
foreach ([
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// 2. Point cache and environment variables to /tmp
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('CONFIG_CACHE_PATH=/tmp/bootstrap/cache/config.php');
putenv('ROUTES_CACHE_PATH=/tmp/bootstrap/cache/routes.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('LOG_CHANNEL=stderr');
putenv('SESSION_DRIVER=cookie');

$_ENV['APP_STORAGE'] = '/tmp/storage';

try {
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // 3. Forcefully redirect storage and view compiled paths to /tmp
    $app->useStoragePath('/tmp/storage');
    
    // Explicitly bind view compiled path to /tmp to prevent read-only file system error
    if (class_exists('Illuminate\Contracts\View\Factory')) {
        app('config')->set('view.compiled', '/tmp/storage/framework/views');
    }

    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);
} catch (\Throwable $e) {
    echo '<pre style="padding: 20px; font-family: monospace; background: #fff0f0; color: #a00;">';
    echo '<h1>Laravel Boot Error (Vercel)</h1>';
    echo '<strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . "\n\n";
    echo '<strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . "\n\n";
    echo '<strong>Trace:</strong>\n' . htmlspecialchars($e->getTraceAsString());
    echo '</pre>';
}