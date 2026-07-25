FROM php:8.4-apache

# Sistem paketlerini güncelle ve kur
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libsqlite3-dev \
    libicu-dev \
    git \
    curl \
    && docker-php-ext-install pdo_mysql pdo_sqlite gd zip intl

# Node.js ve npm kurulumu (Vite frontend asset derlemesi için)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Apache rewrite modülünü aç
RUN a2enmod rewrite

# Git güvenliği
RUN git config --global --add safe.directory /var/www/html

WORKDIR /var/www/html

# Dosyaları kopyala
COPY . .

# Composer kurulumu
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Composer paketlerini kur (composer.lock kullanarak)
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

# Frontend Vite stillerini ve JS dosyalarını derle
RUN npm ci || npm install
RUN npm run build

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

