#!/usr/bin/env bash

# Clear all caches and route caches
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Database migration, storage link and seed
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force