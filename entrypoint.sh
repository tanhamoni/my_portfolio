#!/bin/bash

# Force stderr log channel to prevent laravel.log file locking
export LOG_CHANNEL=stderr

# Create required directories
mkdir -p /var/www/html/database /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache

# Reset database file
rm -f /var/www/html/database/database.sqlite
touch /var/www/html/database/database.sqlite

# Full directory ownership setup upfront
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear configuration cache
php artisan config:clear

# Execute migration as www-data user before Apache starts
su-exec www-data php artisan migrate:fresh --seed --force || php artisan migrate:fresh --seed --force

# Start Apache web server
exec apache2-foreground