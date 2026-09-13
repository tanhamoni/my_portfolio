#!/bin/bash

# Ensure storage, logs and database structure exist
mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/database
touch /var/www/html/database/database.sqlite
touch /var/www/html/storage/logs/laravel.log

# Set full write permissions for Apache (www-data)
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database /var/www/html/database/database.sqlite

# Run migrations as www-data user to keep file permissions correct
su-exec www-data php artisan migrate:fresh --seed --force || php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground