#!/usr/bin/env bash

echo "Running composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

# Clear cache
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Database migration, storage linking, and seeding
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force