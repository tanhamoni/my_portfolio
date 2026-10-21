#!/usr/bin/env bash

# Clear all cached configurations & routes
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Database migration and seeding
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force