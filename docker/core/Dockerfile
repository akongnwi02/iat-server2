# ---------- Frontend build (Laravel Mix / Vue) ----------
FROM node:16-alpine AS frontend
WORKDIR /app

RUN mkdir -p /app/.npm && chown -R node:node /app/.npm
ENV NPM_CONFIG_CACHE=/app/.npm

COPY package*.json ./
RUN npm ci

COPY webpack.mix.js ./
COPY resources ./resources
COPY public ./public
RUN npm run dev

# ---------- Runtime (PHP-FPM + Nginx) ----------
FROM php:7.4-fpm-bullseye AS runtime
WORKDIR /var/www

RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    unzip \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libzip-dev \
    libpq-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo_mysql mysqli gd zip pdo_pgsql pgsql \
 && pecl install redis \
 && docker-php-ext-enable redis \
 && rm -rf /var/lib/apt/lists/*


# Install Node 16 + npm inside runtime container for local development
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@8

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Log to stdout/stderr (Cloud Run)
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
 && ln -sf /dev/stderr /var/log/nginx/error.log

# Cloud Run port
ENV PORT=8080

# Ensure Laravel writable directories exist and are writable
RUN mkdir -p \
    /var/www/storage \
    /var/www/storage/app \
    /var/www/storage/framework/cache \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views \
    /var/www/storage/logs \
    /var/www/bootstrap/cache \
 && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN mkdir -p /var/www/bootstrap/cache /var/www/storage \
    && chown -R www-data:www-data /var/www/bootstrap/cache /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache /var/www/storage

EXPOSE 8080
CMD ["sh", "-c", "php-fpm -D & nginx -g 'daemon off;'"]
