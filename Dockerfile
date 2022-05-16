FROM php:8.1.1-fpm

RUN apt-get update && apt-get install -y git

# Copiar compose para dir usr/bin/compose
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Path onde aplicação  irá ficar
WORKDIR /var/www