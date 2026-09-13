#!/bin/bash

# Ensure database directory and file exist
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Set permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database /var/www/html/database/database.sqlite

# Run migrations inside Render Docker Container
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground