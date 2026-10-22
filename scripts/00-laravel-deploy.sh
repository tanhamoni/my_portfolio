
#!/usr/bin/env bash

# Clear cache
php artisan optimize:clear

# Database migration, storage link, and seeding
php artisan migrate --force
php artisan storage:link
php artisan db:seed --force