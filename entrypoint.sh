#!/bin/bash

# Storage & Database directory, log file setup
mkdir -p /var/www/html/storage/logs \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/cache \
         /var/www/html/database

touch /var/www/html/database/database.sqlite
touch /var/www/html/storage/logs/laravel.log

# Set ownership to www-data BEFORE running migration
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run migration as www-data user to avoid root permission issue
su -s /bin/bash www-data -c "php artisan migrate:fresh --seed --force"

# Ensure ultimate 777 permission for runtime logs & database
chmod -R 777 /var/www/html/storage /var/www/html/database

# Start Apache
exec apache2-foreground