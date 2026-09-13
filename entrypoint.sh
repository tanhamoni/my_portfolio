#!/bin/bash

# Force Laravel to send logs directly to Docker/Render stdout/stderr
export LOG_CHANNEL=stderr

# Create required directories
mkdir -p /var/www/html/database \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/cache

# Delete corrupted sqlite file and initialize a fresh valid PDO SQLite database
rm -f /var/www/html/database/database.sqlite
php -r "new PDO('sqlite:/var/www/html/database/database.sqlite');"

# Run migrations and seeders BEFORE setting Apache ownership
php artisan migrate:fresh --seed --force

# Set directory permissions for www-data user
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Start Apache web server
exec apache2-foreground