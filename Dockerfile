FROM php:8.2-fpm

# Cài các extension cần cho Laravel
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy toàn bộ source Laravel vào container
COPY . .

# Cài dependency Laravel
RUN composer install

# Phân quyền storage & bootstrap
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
