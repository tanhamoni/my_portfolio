#!/bin/bash

# Folder & File preparation
mkdir -p /var/www/html/database /var/www/html/storage/logs /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache
touch /var/www/html/database/database.sqlite

# Full permissions
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Force SQLite connection explicitly & run migrations
DB_CONNECTION=sqlite DB_DATABASE=/var/www/html/database/database.sqlite php artisan migrate --force

# Seed database tables
DB_CONNECTION=sqlite DB_DATABASE=/var/www/html/database/database.sqlite php artisan db:seed --force

# Ensure file ownership for Apache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Start Apache
exec apache2-foreground