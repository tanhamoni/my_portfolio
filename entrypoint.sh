#!/bin/bash

# Make sure database directory and file exist
mkdir -p /var/www/html/database /var/www/html/storage/logs
touch /var/www/html/database/database.sqlite

# Grant full permissions to storage and database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Force run migrations to create 'projects' and other tables
php artisan migrate:fresh --seed --force

# Start Apache web server
exec apache2-foreground