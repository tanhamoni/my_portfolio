#!/bin/bash

# Folder & log permissions
mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache /var/www/html/database

# Delete corrupt file and create clean sqlite file
rm -f /var/www/html/database/database.sqlite
php -r "new PDO('sqlite:/var/www/html/database/database.sqlite');"

# Set permissions
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Force clean migration and seed
php artisan migrate:fresh --seed --force

# Start Apache
exec apache2-foreground