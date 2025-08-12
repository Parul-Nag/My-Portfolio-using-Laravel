# Use official PHP image with Apache
FROM php:8.2-apache

# Set working directory inside container
WORKDIR /var/www/html

# Install system dependencies and PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    npm \
    && docker-php-ext-install zip pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files to container
COPY . .

# Install PHP dependencies with Composer
RUN composer install --no-dev --optimize-autoloader

# Install Node.js and npm for Tailwind build (optional if already built locally)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
