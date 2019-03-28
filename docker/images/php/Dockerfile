FROM php:7.1.26-fpm-alpine3.9

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pgsql
RUN docker-php-ext-install pdo_pgsql

RUN apk add --no-cache $PHPIZE_DEPS \
	&& pecl install xdebug-2.5.0 \
	&& docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www/mk

CMD ["php-fpm"]
