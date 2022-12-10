FROM php:8-apache

# RUN выполняет идущую за ней команду в контексте нашего образа.
# В данном случае мы установим некоторые зависимости и модули PHP.
# Для установки модулей используем команду docker-php-ext-install.
# На каждый RUN создается новый слой в образе, поэтому рекомендуется объединять команды.
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN docker-php-ext-install mysqli && \
    a2enmod authn_dbd && \
    rm -rf /tmp/pear && \
    apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql && \
    apt-get install -y git


# Указываем рабочую директорию для PHP
WORKDIR /var/www/html

# Запускаем контейнер
# Из документации: The main purpose of a CMD is to provide defaults for an executing container. These defaults can include an executable,
# or they can omit the executable, in which case you must specify an ENTRYPOINT instruction as well.
