<?php

// Enable error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Redirect all Laravel storage, logs, and bootstrap cache paths to writable /tmp directory
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Create required writable directories in /tmp
$directories = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Point bootstrap cache to /tmp/bootstrap/cache
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('CONFIG_CACHE_PATH=/tmp/bootstrap/cache/config.php');
putenv('ROUTES_CACHE_PATH=/tmp/bootstrap/cache/routes.php');

try {
    require_once __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo '<pre style="padding: 20px; font-family: monospace; background: #fff0f0; color: #a00;">';
    echo '<h1>Laravel Boot Error (Vercel)</h1>';
    echo '<strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . "\n\n";
    echo '<strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . "\n\n";
    echo '<strong>Trace:</strong>\n' . htmlspecialchars($e->getTraceAsString());
    echo '</pre>';
}
