#!/usr/bin/env bash

# Clear cache to fix 404 errors
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Database migration, storage linking, and seeding
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force