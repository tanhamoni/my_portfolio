#!/bin/bash

# Ensure database directory and file exist
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Set writable permissions for Laravel
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database /var/www/html/database/database.sqlite

# Run Laravel migrations with force & seed
php artisan migrate:fresh --seed --force

# Start Apache in foreground
exec apache2-foreground