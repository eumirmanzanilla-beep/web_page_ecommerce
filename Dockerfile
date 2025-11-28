FROM php:8.4-fpm

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev

# Extensiones PHP
RUN docker-php-ext-install pdo_mysql mbstring gd zip

# Node (opcional si usas Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Composer
COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]