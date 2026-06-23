# Stage 1: Build assets using Node
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Serve the app using Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:latest
WORKDIR /var/www/html

# Copy project files from builder stage
COPY --from=node-builder /app /var/www/html

# Set environment variables for richarvey/nginx-php-fpm
ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV COMPOSER_ALLOW_SUPERUSER=1

# Ensure correct permissions for Laravel storage and cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
