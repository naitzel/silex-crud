# Install packages composer
FROM composer:latest as build

WORKDIR /composer

COPY composer.* ./

# RUN composer install --no-dev --no-interaction -o
RUN composer install --no-interaction -o

# Start image php
FROM phpdockerio/php74-fpm

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.4-mysql php7.4-pgsql php7.4-intl php7.4-redis php7.4-gd php7.4-mbstring \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN mkdir -p var/cache var/logs && chmod -Rf 777 var/

COPY --from=build /composer .

