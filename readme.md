# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Laravel Passport

Documentation for the Laravel Passport can be found on the [Laravel Passport website](https://laravel.com/docs/5.4/passport)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Install PHP 7.1 and dependencies

## Nginx

apt install nginx

## PHP 7.1

apt install php7.1-mbstring php7.1-dom php7.1-zip curl php7.1-cli libapache2-mod-php7.1 (for Apache2 server) php7.1-fpm (for Nginx)
(Using Nginx, you need to start php7.1-fpm like sudo service php7.1-fpm start)

## Composer

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

## Config for APACHE2 mode Rewrite

nano /etc/apache2/apache2.conf 

change from:

<Directory /var/www/>
   Options Indexes FollowSymLinks
   AllowOverride None
   Require all granted
</Directory>

To:

<Directory /var/www/>
   Options Indexes FollowSymLinks
   AllowOverride All
   Require all granted
</Directory>

Restart Apache2 Server

## Laravel Passport Keys

When deploying Passport to your production servers for the first time, you will likely need to run the  passport:keys command. This command generates the encryption keys Passport needs in order to generate access token.

php artisan passport:keys

Storage folder and Passport Keys needs to change chmod and chown!

## Laravel Jobs

```
* * * * * php /var/www/ongarca-backend/artisan schedule:run >> /dev/null 2>&1
```
