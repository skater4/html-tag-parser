FROM php:8.2-apache

RUN apt-get -y update
RUN apt-get -y install libzip-dev zip unzip libxml2-dev zlib1g-dev
RUN docker-php-ext-install dom
RUN docker-php-ext-install zip

# INSTALL AND UPDATE COMPOSER
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update