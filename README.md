# test_softum
First test project on Laravel framework
# Installation
Recommendet : 
PHP 7.2.34
Composer version 2.5.4

For start run command :
composer install
cp -rf .env.example .env
php artisan key:generate --ansi

then need configurate DB in .env file and SMTP server in config/mail.php
then run migration by commade : php artisan migrate  (if has problem like me use sql file in db_backups folder)