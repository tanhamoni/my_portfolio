#!/usr/bin/env bash

# Clear caches
php artisan optimize:clear

# Database migration, storage link and seed
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force