
#!/usr/bin/env bash

set -e

# Clear Laravel caches
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Run migrations and storage link
php artisan migrate --force
php artisan storage:link

php artisan db:seed --force
