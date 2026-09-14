#!/bin/bash

# Ensure storage directories exist
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/database

# Create SQLite database file if missing
touch /var/www/html/database/database.sqlite

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Fix permissions for Apache user
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run Database Migrations & Seeders
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground