# Simple MVC

## Description

This repository is a simple PHP MVC structure from scratch.

It uses some cool vendors/libraries such as FastRouter (fast request php router), Twig and PHP_CodeSniffer soon.
For this one, just a simple example where users can chose one of their databases and see tables in it.

## Steps

1. Clone the repos from Github.
2. Run `composer install`.
3. Create *app/db.php* from *app/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
4. Create upload directory in /public/assets/images. If you dont, the create function won't operate.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PWD', 'your_db_password');
```
4. Import `simple-mvc.sql` in your SQL server,
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter, mean your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.


03/07/2018 @wildcodeschool.fr

This repository is the result of our project n°2 on @wildcodeschool.fr with Alicia Pilar (alias kaleessi83), Eric Rousselet (eric-rousselet), Nicolas François (alias NicoFrancois), Julien Delbez (alias Hakha44) and myself. We worked on it from 26/09/2018 to 07/11/2018. We started the project from a free template (that's why there is so much JavaScript and CSS) because at the beginning, there were only 4 weeks to complete the project. We first cleaned the template, then started developing our own website.
