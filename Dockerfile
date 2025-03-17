FROM composer:2.6 AS vendor
WORKDIR /app
COPY . .
RUN docker-php-ext-install bcmath
RUN composer install --prefer-dist --optimize-autoloader

## Frontend assets
FROM node:20-alpine AS frontend-assets
WORKDIR /app
COPY package*.json ./
COPY --from=vendor /app/vendor/ ./vendor/
RUN npm ci
COPY . .
RUN npm run build

## Final application image
FROM dunglas/frankenphp:1.4.0-php8.3-alpine AS base

RUN install-php-extensions \
    pcntl \
    intl \
    pdo_pgsql \
    redis \
    zip

RUN apk add --no-cache \
    busybox \
    openssl \
    supervisor

WORKDIR /app

COPY --from=vendor /usr/bin/composer /usr/bin/composer
COPY --from=vendor /app/vendor/ ./vendor/
COPY --from=frontend-assets /app/public/build/ ./public/build/
COPY docker/entrypoint.sh /entrypoint.sh
COPY docker/crontab /etc/cron.d/laravel-cron
COPY docker/laravel-worker.conf /etc/supervisor/conf.d/
COPY . .

RUN chmod 644 /etc/cron.d/laravel-cron

# Apply cron job
RUN crontab /etc/cron.d/laravel-cron

RUN chmod +x /entrypoint.sh

EXPOSE 8000
CMD ["/entrypoint.sh"]
