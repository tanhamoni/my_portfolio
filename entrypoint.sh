#!/bin/bash

# Direct logs to standard output to avoid file permission error
export LOG_CHANNEL=stderr

# Fix permissions at container boot
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Clear cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Start Apache foreground
exec apache2-foreground