FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml bcmath

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy only composer files first for caching
COPY composer.json composer.lock ./

# Allow composer plugins when running as root
RUN composer config --global allow-plugins.composer/installers true \
    && composer config --global allow-plugins.laravel/framework true \
    && composer config --global allow-plugins.symfony/* true

# Create vendor folder and set permissions
RUN mkdir -p /var/www/vendor \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www

# Switch to www-data (non-root user) for security
USER www-data

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy all application files
USER root
COPY . .

# Ensure Laravel storage & bootstrap/cache have correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

USER www-data
