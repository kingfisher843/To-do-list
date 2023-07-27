FROM php:8.2.7-fpm-alpine

RUN apk add \ 
    pdo \ 
    pdo_mysql \
    sockets \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    lua-zlib-dev \
    libmemcached-dev \
    laravel/framework \
    laravel/pint \
    laravel/sail \
    laravel/sanctum \
    laravel/serializable-closure \
    laravel/tinker     
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install