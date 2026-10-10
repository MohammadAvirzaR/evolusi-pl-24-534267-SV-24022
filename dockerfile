# stage build
FROM php:8.4-cli-alpine AS build

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY portofolio/composer.json portofolio/composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

COPY portofolio/ .

RUN composer dump-autoload --optimize

# stage runtime
FROM php:8.4-cli-alpine AS runtime

RUN apk add --no-cache \
    sqlite-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install pdo pdo_sqlite zip

WORKDIR /app

COPY --from=build /app /app

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    database \
    && addgroup -S laravel \
    && adduser -S laravel -G laravel \
    && chown -R laravel:laravel /app

USER laravel

EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=5s --start-period=15s --retries=3 \
  CMD curl -f http://localhost:8000/api/projects || exit 1

ENTRYPOINT ["docker-entrypoint.sh"]
