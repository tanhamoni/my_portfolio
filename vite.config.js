services:
  - type: web
    name: laravel-portfolio
    env: php
    region: ohio
    plan: free
    buildCommand: "composer install --no-dev --optimize-autoloader && npm install && npm run build"
    startCommand: "php artisan config:cache && php artisan route:cache && apache2-foreground"
    envVars:
      - key: PHP_VERSION
        value: 8.2
      - key: APP_DEBUG
        value: false