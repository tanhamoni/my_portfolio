#!/usr/bin/env bash

echo "Running composer install..."
composer install --no-dev --optimize-autoloader --no-interaction

# Force clear all Laravel caches so routes work immediately
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Database migration & seeding
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force