#!/bin/bash

# Force Laravel to write logs to Docker output (No laravel.log file needed)
export LOG_CHANNEL=stderr

# Ensure Database directory exists
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Full permission for Database and Storage
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear Caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Force Database Migration & Seeding
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground