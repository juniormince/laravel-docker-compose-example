FROM php:7.2-fpm

RUN apt-get update \
    && apt-get install -y \
        zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) pdo_mysql pcntl zip

COPY --from=composer:1.7 /usr/bin/composer /usr/bin/composer

COPY . /var/www/app

WORKDIR /var/www/app
