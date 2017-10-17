# Wordpress base image
FROM debian:latest

# Dependencies
RUN apt-get update && apt-get install -y curl apache2 php7.0 php-pear php7.0-mysql
RUN a2enmod rewrite
RUN apachectl -k graceful

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
RUN chown -R root:www-data /var/www/conf
RUN find /var/www/html -type d -exec chmod g+s {} \;

RUN chmod g+w /var/www/html/wp-content
RUN chmod -R g+w /var/www/html/wp-content/themes
RUN chmod -R g+w /var/www/html/wp-content/plugins

# Compose setup
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer
ENV TERM xterm-256color

RUN service apache2 restart
