#!/usr/bin/env bash

set -e

composer install

if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

chown -R www-data:www-data .
chmod 777 -R storage/ bootstrap/cache

exec "$@"