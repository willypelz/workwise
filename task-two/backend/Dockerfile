FROM alpine:3.10 AS prod

LABEL maintainer="Michael P. Asefon <pelumiasefon@gmail.com>"

RUN apk add --update \
    php7-fpm \
    php7-apcu \
    php7-ctype \
    php7-curl \
    php7-dom \
    php7-gd \
    php7-iconv \
    php7-imagick \
    php7-json \
    php7-intl \
    php7-mcrypt \
    php7-fileinfo \
    php7-mbstring \
    php7-opcache \
    php7-openssl \
    php7-pdo \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-mysqli \
    php7-xml \
    php7-zlib \
    php7-phar \
    php7-tokenizer \
    php7-session \
    php7-simplexml \
    php7-sqlite3 \
#    php7-xdebug \
    php7-zip \
    make \
    php-xmlwriter \
    curl


# Set an environment variable for the application (this enables the development mode of symfony)
ENV APP_ENV=prod

WORKDIR /var/www/symfony

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/* && \
    curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer


ADD ./docker/test-backend/php.ini /etc/php7/conf.d/
ADD ./docker/test-backend/php.ini /etc/php7/cli/conf.d/
ADD ./docker/test-backend/php-fpm.conf /etc/php7/php-fpm.d/
#ADD xdebug.ini  /etc/php7/conf.d/

COPY ./www/test-backend/composer*.json ./

COPY ./www/test-backend ./

# Install application dependencies
#RUN composer self-update --stable
RUN composer install


RUN adduser -D -g 'www' www \
    && chown -R www:www /var/www

#RUN   ./vendor/bin/phpunit

RUN composer install

RUN chmod 777 storage -R

RUN chmod 777 bootstrap/cache -R

RUN cp .env.example .env

RUN php artisan key:generate
#RUN php artisan migrate

CMD ["php-fpm7", "-F"]

COPY ./docker/test-backend/run.sh /tmp
RUN chmod +x /tmp/run.sh
ENTRYPOINT ["/tmp/run.sh"]

EXPOSE 9001
