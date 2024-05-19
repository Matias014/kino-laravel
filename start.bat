php -r "copy('.env.example', '.env');"

call composer install

call composer require yajra/laravel-oci8

call php artisan migrate:fresh

call php artisan key:generate

call php artisan storage:link

code .
