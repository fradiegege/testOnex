#!/bin/bash
php artisan cache:clear
php artisan view:clear
php artisan route:cache
php artisan config:cache

php artisan optimize
php artisan migrate:fresh

#php artisan db:seed
#php artisan l5-swagger:generate
