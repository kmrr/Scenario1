FROM php:7.0-apache

# ENV DEBCONF_NOWARNINGS yes
# ENV APACHE_RUN_USER www-data
# ENV APACHE_RUN_GROUP www-data
# ENV APACHE_LOG_DIR /var/log/apache2

COPY php.ini /usr/local/etc/php/
# COPY index.php /var/www/html
# COPY index_comfirm.php /var/www/html

RUN apt-get update \
    && docker-php-ext-install mysqli mbstring