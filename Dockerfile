FROM composer:2.6 as vendor
WORKDIR /app
COPY . .

RUN docker-php-ext-install bcmath
RUN composer install --prefer-dist

FROM node:20-alpine as frontend
WORKDIR /app
COPY package*.json ./
COPY --from=vendor /app/vendor/ ./vendor/
RUN npm ci
COPY . .
RUN npm run build

FROM php:8.2-cli-alpine
RUN apk add --no-cache \
    openssl \
    sqlite \
    sqlite-dev

WORKDIR /app

ENV APP_URL_BASE=APP_URL_PLACEHOLDER
ENV APP_URL=https://${APP_URL_BASE}

COPY --from=vendor /usr/bin/composer /usr/bin/composer
COPY --from=vendor /app/vendor/ ./vendor/
COPY --from=frontend /app/public/build/ ./public/build/
COPY . .

RUN composer dump-autoload --optimize \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
