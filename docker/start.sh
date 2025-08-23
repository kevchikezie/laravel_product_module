#!/bin/bash

until php artisan db:show --database=mysql; do
    echo "Database not ready, waiting..."
    sleep 2
done

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

apache2-foreground