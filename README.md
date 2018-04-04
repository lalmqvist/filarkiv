# filarkiv


***

### Clone project
* Clone repo: `https://github.com/lalmqvist/filarkiv.git`
* `cd filarkiv`

### Server Requirements
+ PHP >= 7.1.3
+ OpenSSL PHP Extension
+ PDO PHP Extension
+ Mbstring PHP Extension
+ Tokenizer PHP Extension
+ XML PHP Extension
+ Ctype PHP Extension
+ JSON PHP Extension

#### Dependencies
+ [Apache](https://www.apache.org/)
+ [MySQL](https://www.mysql.com)
+ [Composer](https://getcomposer.org/download)
+ [Laravel](https://laravel.com/docs/5.6)
+ [Eloquent ORM](https://laravel.com/docs/5.6/eloquent)

Check dependencies in terminal with the following commands:
```
php -v
apachectl -v
mysql -V
composer -v

```
If any of them doesn't return a version number you need to install those before continuing.

***

### Installation
1. Run `cd filarkiv`
2. Install dependencies `composer install`, `npm install`
3. Run project `php artisan serve`, `npm run dev`
4. You'll find the development server running at http://127.0.0.1:8000/
5. Run `php artisan migrate:install`
6. To migrate database tables, run `php artisan migrate`
7. If you want to rollback migrations, run `php artisan migrate:fresh`


