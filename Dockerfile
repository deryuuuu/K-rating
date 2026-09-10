FROM php:8.3-cli

# Install dependencies sistem, Node.js, dan npm
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app
COPY . .

# Install dependency PHP & Node.js
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN npm install && npm run build

# Membuat folder/file database sqlite dan menjalankan migrasi saat aplikasi dinyalakan
CMD sh -c "mkdir -p /app/database && touch /app/database/database.sqlite && php artisan migrate:fresh --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"