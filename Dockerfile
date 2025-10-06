FROM php:8.3-fpm

# System dependencies install karo
RUN apt-get update && apt-get install -y \
    build-essential libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip curl unzip git && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer install karo
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Working directory
WORKDIR /var/www

# Laravel dependencies install karne ke liye
COPY ./src /var/www

RUN composer install

CMD ["php-fpm"]
