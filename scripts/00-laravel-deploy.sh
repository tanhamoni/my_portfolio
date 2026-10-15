#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

# Storage and Cache Permission Fix
chmod -R 777 /var/www/html/storage
chmod -R 777 /var/www/html/bootstrap/cache

php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force