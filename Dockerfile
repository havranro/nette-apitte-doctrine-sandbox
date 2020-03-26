FROM php:7.3-apache

RUN a2enmod rewrite

#install library necessary for php gd extension
RUN apt-get update -y && apt-get install -y libpng-dev git zip

#install PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli gd

#set document root for apache
RUN sed -ri -e 's!/var/www/html!/var/www/html/www!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/www!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

EXPOSE 80
