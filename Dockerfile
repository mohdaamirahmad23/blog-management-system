FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libsqlite3-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install

EXPOSE 10000

CMD php artisan config:clear && php artisan cache:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
