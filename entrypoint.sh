#!/bin/bash

# Environment variables setup
export LOG_CHANNEL=stderr
export DB_CONNECTION=sqlite
export DB_DATABASE=/var/www/html/database/database.sqlite

# Create directories
mkdir -p /var/www/html/database
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/cache

# Reset database file
rm -f /var/www/html/database/database.sqlite
touch /var/www/html/database/database.sqlite

# Run migration & seed directly
php artisan migrate:fresh --seed --force

# Make all files writeable by Apache
chmod -R 777 /var/www/html/storage /var/www/html/database /var/www/html/bootstrap/cache

# Start Apache
exec apache2-foreground