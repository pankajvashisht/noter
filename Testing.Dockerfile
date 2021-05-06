FROM jdecode/php8-my-pg-node:ssl

ARG BUILD
ENV BUILD=${BUILD}

WORKDIR /var/www/html

# Make "public" the webroot for Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy files inside the container
COPY . .

# Make these folders writable, and update permissions
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN chmod -R 0777 storage bootstrap database
RUN chown -R www-data:www-data storage/ bootstrap/ database/
RUN touch database/sqlite

# If GCP (non-local), run composer install (with "dev" dependencies)
RUN if [ "$BUILD" = "local" ] ; then echo "This is local build!" ; else composer install -n --prefer-dist ; fi

RUN php artisan cache:clear
RUN php artisan migrate --env=testing --database=sqlite --force
RUN php artisan key:generate --env=testing
RUN vendor/bin/phpunit --stop-on-error --stop-on-failure
