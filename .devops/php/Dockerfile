FROM php:7.2.6-fpm-alpine

RUN apk add --no-cache --virtual .persistent-deps \
    git \
    icu-libs \
    zlib

ENV APCU_VERSION 5.1.11

RUN set -xe \
        && apk add --no-cache --virtual .build-deps \
                $PHPIZE_DEPS \
                icu-dev \
                zlib-dev \
        && docker-php-ext-install \
                intl \
                zip \
        && pecl install \
                apcu-${APCU_VERSION} \
        && docker-php-ext-enable --ini-name 20-apcu.ini apcu \
        && docker-php-ext-enable --ini-name 05-opcache.ini opcache \
        && apk del .build-deps

RUN apk add --no-cache php7-pear gcc musl-dev make

RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

RUN mkdir -p var/cache var/logs var/sessions \
    && chown -R www-data var