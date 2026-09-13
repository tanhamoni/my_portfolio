#!/bin/bash

# Ensure required directories exist
mkdir -p /var/www/html/database /var/www/html/storage/logs /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache

# Reset SQLite file to avoid file lock issues
rm -f /var/www/html/database/database.sqlite
touch /var/www/html/database/database.sqlite

# Full directory ownership
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run optimization clear & force migration
php artisan config:clear
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground