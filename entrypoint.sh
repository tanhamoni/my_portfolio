#!/bin/bash

# Force logs to Docker console
export LOG_CHANNEL=stderr

# Create fresh database file on boot
mkdir -p /var/www/html/database
rm -f /var/www/html/database/database.sqlite
touch /var/www/html/database/database.sqlite

# Full permissions to avoid any file block
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear all Laravel caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Execute Database Migrations and Seeders FORCEFULLY
php artisan migrate:fresh --force --seed

# Boot Apache Server
exec apache2-foreground