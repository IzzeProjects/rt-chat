FROM php:7.4

RUN apt-get update \
&& apt-get install -y \
       git \
       libzip-dev \
       zip \
       libpq-dev \
&& docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

RUN pecl install -o -f redis swoole \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis swoole

RUN apt-get update && apt-get -y install cron

ADD /crontab /workstab
RUN chmod 0644 /workstab
RUN crontab /workstab
RUN touch /var/log/cron.log
CMD cron && tail -f /var/log/cron.log

WORKDIR /var/www/rt-chat
