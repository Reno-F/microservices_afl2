FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Buat direktori kerja
WORKDIR /var/www

# Salin semua file Laravel
COPY . /var/www

# Izinkan plugin Composer dijalankan sebagai root (diperlukan saat di Docker)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install dependencies Laravel
RUN composer install

# Permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

EXPOSE 9000

CMD ["php-fpm"]
