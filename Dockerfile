FROM php:8.3-apache

# Sistem paketlerini güncelle ve kur
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libsqlite3-dev \
    libicu-dev \
    git \
    && docker-php-ext-install pdo_mysql pdo_sqlite gd zip intl

# Apache rewrite modülünü aç
RUN a2enmod rewrite

# Git güvenliği
RUN git config --global --add safe.directory /var/www/html

WORKDIR /var/www/html

# Dosyaları kopyala
COPY . .

# Composer kurulumu
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Lock dosyasını görmezden gelip mevcut PHP 8.3 sürümüne uygun paketleri güncelle
RUN composer update --no-interaction --optimize-autoloader --no-dev

# İzinler
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Veritabanı Hazırlığı
RUN touch database/database.sqlite
RUN chown www-data:www-data database/database.sqlite
RUN chmod 775 database/database.sqlite

# Ortam Değişkenleri
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite
ENV APP_KEY=base64:6XY1lFZ2twPTGv13Hz8XmdJg2kxpwKKRFoQDPn5tOVY=

# Migration ve Seed (Build aşamasında)
RUN php artisan migrate:fresh --seed --force

# Apache Konfigürasyonu
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# AllowOverride All ayarını zorla (htaccess çalışması için kritik)
RUN echo "<Directory /var/www/html/public>" >> /etc/apache2/apache2.conf && \
    echo "    Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf && \
    echo "    AllowOverride All" >> /etc/apache2/apache2.conf && \
    echo "    Require all granted" >> /etc/apache2/apache2.conf && \
    echo "</Directory>" >> /etc/apache2/apache2.conf

EXPOSE 80
