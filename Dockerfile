FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_sqlite zip \
    && a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -s -i -e "s/80/10000/g" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN cp -n .env.example .env || true
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN touch database/database.sqlite
RUN chown -R www-data:www-data storage bootstrap/cache database
RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 10000

CMD bash -c "php artisan key:generate --force && php artisan migrate --force && apache2-foreground"