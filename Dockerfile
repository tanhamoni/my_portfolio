
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

ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV DOCUMENT_ROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1

RUN apk add --no-cache ca-certificates && update-ca-certificates

RUN composer install --no-dev --optimize-autoloader --no-interaction
