#!/bin/bash
set -e

# Make sure database folder and file exist
mkdir -p /var/www/html/database
touch /var/www/html/database/database.sqlite

# Full permissions for SQLite database & Storage
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Run artisan commands with explicit database path
php artisan migrate:fresh --seed --force --database=sqlite

# Re-apply permissions just in case
chmod -R 777 /var/www/html/database

# Start Apache
exec apache2-foreground