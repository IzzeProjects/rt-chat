FROM php:7.4-fpm

RUN apt-get update \
&& apt-get install -y \
       git \
       libzip-dev \
       zip \
&& docker-php-ext-install pdo pdo_mysql zip

RUN curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

WORKDIR /var/www/rt-chat
