#!/bin/sh
set -e

if [ ! -f .env ]; then
  cp .env.example .env
fi

mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

php artisan key:generate --force
mkdir -p database
touch database/database.sqlite
php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=8000