FROM node:16-slim as node-builder

COPY . ./app


FROM php:8.0.18-apache

RUN apt-get update && apt-get install -y \
  zip \
  unzip \
  git

RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

RUN docker-php-ext-install -j "$(nproc)" opcache && docker-php-ext-enable opcache

RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . ./
COPY --from=node-builder /app/public ./public
# COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN composer install
RUN chown -Rf www-data:www-data ./