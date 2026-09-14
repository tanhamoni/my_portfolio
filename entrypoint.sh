#!/bin/bash

# Force logs to output stream (no laravel.log file error)
export LOG_CHANNEL=stderr

# Ensure directory structure exists
mkdir -p /var/www/html/database
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/cache

# Reset SQLite database file
rm -f /var/www/html/database/database.sqlite
touch /var/www/html/database/database.sqlite

# Set 777 permission on runtime folders & DB file
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear Laravel caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run Database Migrations & Seeders BEFORE Apache starts
php artisan migrate:fresh --seed --force

# Start Apache in Foreground
exec apache2-foreground