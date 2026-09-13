#!/bin/bash
mkdir -p /var/www/html/storage/logs
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
exec apache2-foreground