FROM ubuntu/apache2

# Install PHP and Laravel
RUN apt update
RUN apt install php php-cli php-mbstring php-xml php-bcmath php-curl php-mysql -y

# Install curl
RUN apt-get install ca-certificates -y
RUN apt install curl -y
RUN apt install zip unzip php-zip -y

# Setting php configuration
RUN php -c /etc/php/8.1/cli/php.ini

# Install composer
WORKDIR /home/root
RUN curl https://getcomposer.org/installer --output composer-setup.php
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Install application
ENV APP_NAME=agenda_app
WORKDIR /var/www/html/${APP_NAME}
COPY . .
RUN composer install --no-dev --prefer-dist --optimize-autoloader
RUN php artisan key:generate
RUN php artisan cache:clear
RUN php artisan route:clear
RUN php artisan config:clear
RUN php artisan view:clear

RUN chown -R :www-data /var/www/html/${APP_NAME}
RUN chmod -R 775 /var/www/html/${APP_NAME}
RUN chown -R www-data.www-data /var/www/html/${APP_NAME}/storage
RUN chown -R www-data.www-data /var/www/html/${APP_NAME}/bootstrap/cache

# Generating SSL
COPY ./cert-ssl/apache-selfsigned.key /etc/ssl/private/apache-selfsigned.key
COPY ./cert-ssl/apache-selfsigned.crt /etc/ssl/certs/apache-selfsigned.crt

# Setting up Apache 2
RUN rm -f /etc/apache2/sites-available/*
COPY apache2.conf /etc/apache2/sites-available/${APP_NAME}.conf
RUN a2enmod rewrite
RUN a2ensite ${APP_NAME}.conf

# SSL
RUN a2enmod ssl
RUN a2enmod headers
RUN service apache2 restart

EXPOSE 443
EXPOSE 80
