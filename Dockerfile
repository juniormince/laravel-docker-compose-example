FROM php:7.2-fpm

RUN docker-php-ext-install -j$(nproc) pdo_mysql

COPY . /var/www

WORKDIR /var/www/app
