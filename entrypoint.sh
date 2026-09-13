#!/bin/bash
export LOG_CHANNEL=stderr
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
exec apache2-foreground