FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first for caching
COPY composer.json composer.lock ./

# Allow composer plugins when running as root
RUN composer config --global allow-plugins.composer/installers true \
    && composer config --global allow-plugins.laravel/framework true \
    && composer config --global allow-plugins.symfony/* true

# Create vendor folder and set permissions
RUN mkdir -p /var/www/vendor \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www

# Install PHP dependencies without running scripts
USER www-data
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Switch back to root for copying files
USER root

# Copy the rest of the application
COPY . .

# Ensure Laravel storage & cache have correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Entrypoint to run artisan scripts after container starts
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

USER www-data

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
