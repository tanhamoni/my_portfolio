#!/bin/bash

# Ensure storage structure
mkdir -p /var/www/html/storage/logs

# Set full permissions
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run migration & seed directly before starting Apache
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground