#!/bin/bash

# Folder & file setup
mkdir -p /var/www/html/storage/logs \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/cache \
         /var/www/html/database

touch /var/www/html/database/database.sqlite
touch /var/www/html/storage/logs/laravel.log

# Force Migration to create all tables
php artisan migrate:fresh --seed --force

# Fix ownership and permissions for www-data AFTER migration
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Start Apache
exec apache2-foreground