FROM php:7-fpm

RUN apt-get update && apt-get install -y libpq-dev libicu-dev \
    && pecl install redis-5.3.2 \
    && docker-php-ext-configure intl \
    && docker-php-ext-enable redis \
    && docker-php-ext-install intl opcache pdo pdo_pgsql
