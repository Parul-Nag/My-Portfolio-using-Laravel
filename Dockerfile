# 1) Node stage for building assets
FROM node:18 AS assets
WORKDIR /app

# Copy only package files first to cache npm install
COPY package*.json ./
RUN npm ci

# Copy rest of the frontend-related files
COPY vite.config.* ./
COPY tailwind.config.* postcss.config.* ./
COPY resources ./resources

# Build assets (Tailwind + Vite)
RUN npm run build

# 2) PHP stage for Laravel
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first
COPY composer.json composer.lock ./

# Install dependencies without running artisan scripts
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy the rest of the application
COPY . .

# Copy built assets from Node stage
COPY --from=assets /app/public/build ./public/build

# Permissions for storage & cache
RUN chmod -R 775 storage bootstrap/cache

# Expose Railway port
EXPOSE 8080

# Start Laravel's built-in server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
