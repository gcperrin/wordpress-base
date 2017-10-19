# Wordpress base image
FROM debian:latest

# Dependencies
RUN apt-get update && apt-get install -y curl apache2 php7.0 php-pear php7.0-mysql
RUN a2enmod rewrite
RUN apachectl -k graceful

ARG envpath
ADD ./env/${envpath} /tmp/envfile
RUN cat /tmp/envfile >> /etc/apache2/envvars

# Apache setup
ADD ./apache2 /etc/apache2
RUN rm -rf /etc/apache2/sites-enabled/*
RUN ln -s /etc/apache2/sites-available/wp.conf \
    /etc/apache2/sites-enabled/

# Wordpress setup
RUN rm /var/www/html/index.html
ADD ./wp /var/www/html
RUN mkdir /var/www/conf
ADD ./conf /var/www/conf
RUN chown -R root:www-data /var/www/html
RUN find /var/www/html -type d -exec chmod g+s {} \;

RUN chmod g+w /var/www/html/wp-content
RUN chmod -R g+w /var/www/html/wp-content/themes
RUN chmod -R g+w /var/www/html/wp-content/plugins
RUN chmod 660 /var/www/html/.htaccess

# Compose setup
# RUN curl -sS https://getcomposer.org/installer | php -- \
#     --install-dir=/usr/local/bin --filename=composer

env APACHE_RUN_USER    www-data
env APACHE_RUN_GROUP   www-data
env APACHE_PID_FILE    /var/run/apache2.pid
env APACHE_RUN_DIR     /var/run/apache2
env APACHE_LOCK_DIR    /var/lock/apache2
env APACHE_LOG_DIR     /var/log/apache2
env LANG               C
CMD ["apachectl", "-D", "FOREGROUND"]
