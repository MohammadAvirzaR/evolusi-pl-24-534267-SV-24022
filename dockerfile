FROM php:8.4-cli

ENV DEBIAN_FRONTEND=noninteractive

RUN rm -rf /var/lib/apt/lists/* \
    && apt-get -o Acquire::Retries=3 -o Dpkg::Options::="--force-confold" update \
    && apt-get -y -o Dpkg::Options::="--force-confold" install --no-install-recommends \
        unzip \
        git \
        libzip-dev \
        libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Salin file dependency terlebih dahulu agar layer Composer bisa di-cache.
COPY portofolio/composer.json portofolio/composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Salin kode aplikasi setelah dependency terpasang.
COPY portofolio/ .

RUN composer dump-autoload --optimize

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["docker-entrypoint.sh"]
