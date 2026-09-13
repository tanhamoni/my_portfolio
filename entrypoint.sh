#!/bin/bash

export LOG_CHANNEL=stderr
export DB_CONNECTION=sqlite
export DB_DATABASE=/var/www/html/database/database.sqlite

# Clear config cache first to force sqlite connection
php artisan config:clear
php artisan cache:clear

# Create database file & permissions
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run force migration and seeder
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground