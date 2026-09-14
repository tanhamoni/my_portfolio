#!/bin/bash

# Create SQLite database file if missing
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Clear config and cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Fix permissions for SQLite and Laravel
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run Database Migrations & Seeders automatically
php artisan migrate:fresh --seed --force

# Start Apache in foreground
exec apache2-foreground