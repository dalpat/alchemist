# Installation

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
``` bash
composer install
php artisan key:generate
php artisan migrate:fresh
php artisan optimize
php artisan serve
```
That's it
