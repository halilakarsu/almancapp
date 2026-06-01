
FROM php:8.2-fpm

# Sistem bağımlılıkları
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev

# PHP extension'ları (Laravel + PostgreSQL için şart)
RUN docker-php-ext-install pdo pdo_pgsql

# PHP Upload limits
RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/uploads.ini

# Composer kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizini
WORKDIR /var/www

# Proje dosyalarını container içine al
COPY . .

# Laravel izinleri (çok önemli)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/uploads

# Port (php-fpm)
EXPOSE 9000

CMD ["php-fpm"]