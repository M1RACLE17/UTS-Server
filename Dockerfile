# Gunakan image PHP resmi dengan versi 8.3
FROM php:8.3-fpm

# Install dependensi sistem
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file proyek Laravel
COPY . .

# Install dependensi Composer
RUN composer install --optimize-autoloader --no-dev

# Berikan izin ke folder storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Expose port 8000 untuk php artisan serve
EXPOSE 8000

# Jalankan php artisan serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]