# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Install PHP extensions (required for Laravel)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache rewrite module (for pretty URLs)
RUN a2enmod rewrite

# Copy all files into the container
COPY . /var/www/html/

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies (no dev packages)
RUN composer install --no-dev --optimize-autoloader

# Fix permissions (important for Laravel storage)
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Set production environment
ENV APP_ENV=production
ENV APP_DEBUG=false

# Expose port 80 (HTTP)
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]