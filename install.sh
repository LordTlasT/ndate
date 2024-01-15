#!/bin/sh
cp .env.example .env
php artisan migrate
npm install
composer install --optimize-autoloader --no-dev
php artisan storage:link
