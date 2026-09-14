#!/bin/bash

# Redirect Laravel logs to Docker STDOUT/STDERR (Bypasses file permission issues)
export LOG_CHANNEL=stderr

# Ensure Database directory and file exist
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Ensure maximum permissions on runtime directories
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear any cached configurations
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Execute Database Migration and Seeding
php artisan migrate:fresh --seed --force

# Launch Apache in the foreground
exec apache2-foreground