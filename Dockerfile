# Build frontend assets
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm install

COPY . .
RUN npm run build


# Laravel application
FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . .
COPY --from=frontend /app/public/build ./public/build
COPY certs/isrgrootx1.pem /var/www/html/certs/isrgrootx1.pem

ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV DOCUMENT_ROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1

RUN apk add --no-cache ca-certificates && update-ca-certificates

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set Nginx to use TCP port 9000 explicitly or let the base image use its default socket path correctly
RUN echo "listen = 127.0.0.1:9000" >> /usr/local/etc/php-fpm.d/www.conf || true

# Clear old config cache & run migrations automatically on startup
CMD php artisan config:clear && php artisan cache:clear && php artisan migrate --force && /start.sh