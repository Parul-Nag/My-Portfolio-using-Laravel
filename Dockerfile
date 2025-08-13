FROM php:8.2-fpm

# Install system dependencies + nginx + supervisor
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip libzip-dev \
    nginx supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project files
COPY . .

# Add a new user
RUN adduser --disabled-password --gecos "" appuser
USER appuser

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Remove default nginx config and replace with Laravel config
RUN rm /etc/nginx/sites-enabled/default || true
RUN rm /etc/nginx/conf.d/default.conf || true
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Copy Supervisor config
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

EXPOSE 80

# Start both Nginx & PHP-FPM via Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
