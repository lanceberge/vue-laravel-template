#!/bin/sh

composer dump-autoload --optimize

php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan event:cache
php artisan view:cache

php artisan migrate --force

crond -b -L /app/storage/logs/cron-debug.log &

# Run queue Worker
/usr/bin/supervisord -c /etc/supervisor/conf.d/laravel-worker.conf

# Run web server
php artisan octane:start --host=0.0.0.0 --port=8000
