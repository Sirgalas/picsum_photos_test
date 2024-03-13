FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -y wget git unzip libpq-dev libicu-dev libpng-dev libwebp-dev libzip-dev \
    libjpeg-dev libfreetype6-dev jpegoptim optipng pngquant gifsicle\
    libjpeg62-turbo-dev libvpx-dev  libgd-dev libmagickwand-dev --no-install-recommends

#RUN pecl install xdebug-2.7.1 && docker-php-ext-enable xdebug

RUN pecl install imagick

RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install  zip exif
RUN docker-php-ext-install  pdo pdo_pgsql \
    && docker-php-ext-enable pdo

RUN  docker-php-ext-enable   imagick
RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet \
    && apt clean && apt autoremove --purge


# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

ADD ./php.ini /usr/local/etc/php/php.ini

USER www
WORKDIR /var/www