FROM php:7.4-fpm

RUN apt-get update \
&& apt-get install -y \
       git \
       libzip-dev \
       zip \
       libpq-dev \
&& docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

RUN curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN pecl install -o -f redis swoole \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis swoole

RUN apt update \
&& apt install nodejs -y \
&& apt install npm -y \
&& npm install yarn -g -y
&& yarn global add @quasar/cli

WORKDIR /var/www/rt-chat
