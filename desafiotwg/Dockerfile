FROM php:7.3.5-fpm-alpine3.9


ARG USER_ID

RUN  apk add --update git \
	libzip-dev \
	zip \
	unzip \
	nodejs npm \
	&& docker-php-ext-install  pdo_mysql zip

RUN docker-php-ext-configure zip --with-libzip

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
        mv composer.phar /usr/local/bin/composer

RUN adduser -D -s /bin/sh -u $USER_ID laravel -G www-data

USER laravel

