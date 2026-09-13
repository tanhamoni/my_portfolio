#!/bin/bash

export LOG_CHANNEL=stderr
export DB_CONNECTION=sqlite
export DB_DATABASE=/var/www/html/database/database.sqlite

# Create database directory & file if not exists
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear cache and run migration safely
php artisan config:clear
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground