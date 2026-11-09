<?php

// Enable error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// 1. Force all storage and cache directories in /tmp
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['LOG_CHANNEL'] = 'stderr';

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

// 2. Point all cache paths to /tmp to avoid reading old compiled configs
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('CONFIG_CACHE_PATH=/tmp/bootstrap/cache/config.php');
putenv('ROUTES_CACHE_PATH=/tmp/bootstrap/cache/routes.php');
putenv('LOG_CHANNEL=stderr');

try {
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // 3. Explicitly tell Laravel to use /tmp/storage at runtime
    $app->useStoragePath('/tmp/storage');

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