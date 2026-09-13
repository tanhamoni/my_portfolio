#!/bin/bash

# Force Laravel to use In-Memory SQLite to bypass all disk permission/locking issues
export LOG_CHANNEL=stderr
export DB_CONNECTION=sqlite
export DB_DATABASE=:memory:

# Setup storage folders
mkdir -p /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Clear app cache
php artisan config:clear

# Execute migration directly into RAM
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground