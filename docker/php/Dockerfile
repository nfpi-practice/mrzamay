FROM php:8.4-fpm

ARG APP_USER_ID
ARG APP_GROUP_ID
ARG APP_USER_NAME

RUN groupadd -g ${APP_GROUP_ID} ${APP_USER_NAME} && \
    useradd -u ${APP_USER_ID} -g ${APP_USER_NAME} -m -d /home/${APP_USER_NAME} -s /bin/bash ${APP_USER_NAME}

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install zip pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /var/www/html && \
    chown -R ${APP_USER_NAME}:${APP_USER_NAME} /var/www/html && \
    chmod -R 775 /var/www/html

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER ${APP_USER_NAME}

WORKDIR /var/www/html