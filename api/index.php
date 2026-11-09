<?php

// Enable error reporting to debug HTTP 500 on Vercel
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Redirect Laravel storage/cache to Vercel's writable /tmp directory
$_ENV['APP_STORAGE'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

foreach (
    [
        '/tmp/storage',
        '/tmp/storage/framework',
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache',
        '/tmp/storage/framework/sessions',
    ] as $dir
) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

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
