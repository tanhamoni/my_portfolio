#!/bin/bash

# Ensure required directories exist
mkdir -p /var/www/html/database
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/cache

# Create sqlite database file if missing
touch /var/www/html/database/database.sqlite
touch /var/www/html/storage/logs/laravel.log

# Fix permission for Apache user (www-data)
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run Database Migrations
php artisan migrate:fresh --seed --force

# Ensure permissions remain correct after migrations
chown -R www-data:www-data /var/www/html/database /var/www/html/storage
chmod -R 777 /var/www/html/database /var/www/html/storage

# Start Apache web server
exec apache2-foreground