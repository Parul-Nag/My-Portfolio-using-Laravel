# PHP 8.1 FPM image
FROM php:8.1-fpm

# System dependencies install karein
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# PHP extensions install karein
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Working directory set karein
WORKDIR /var/www/html

# Project files copy karein
COPY . .

# Composer install karein
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Composer dependencies install karein
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permissions set karein (optional)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port expose karein
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]
