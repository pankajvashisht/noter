FROM jdecode/php8-my-pg-node:ssl

ARG BUILD
ENV BUILD=${BUILD}

WORKDIR /var/www/html

# Make "public" the webroot for Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy files inside the container
COPY composer* ./
RUN if [ "$BUILD" = "local" ] ; then ls -al ; else composer install -n --prefer-dist ; fi

RUN if [ "$BUILD" = "local" ] ; then rm -rf vendor node_modules ; else echo "vendor and node_modules not on GCP" ; fi

COPY . .
RUN chmod -R 0777 storage bootstrap
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN touch storage/database.sqlite
RUN php artisan migrate --env=testing --database=sqlite --force
RUN php artisan test --stop-on-error --stop-on-failure
