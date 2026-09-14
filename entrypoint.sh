#!/bin/bash

# Force environment variables for SQLite
export LOG_CHANNEL=stderr
export DB_CONNECTION=sqlite
export DB_DATABASE=/var/www/html/database/database.sqlite

# Create database file
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Clear config caches
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Fix permissions
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Force database migration & seeding automatically on server startup
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground