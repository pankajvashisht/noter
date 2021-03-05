FROM jdecode/laravel-mysql:2

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


#COPY . .
#RUN rm -rf vendor
#RUN composer install -n --prefer-dist

RUN a2enmod rewrite
#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

#change ownership of our applications
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap

#RUN chmod -R 0777 /var/www/html/storage /var/www/html/bootstrap

