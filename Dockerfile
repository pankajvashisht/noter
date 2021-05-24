FROM jdecode/php8-my-pg-node:ssl

WORKDIR /var/www/html

ARG BUILD
ENV BUILD=${BUILD}

# Make "public" the webroot for Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . .
RUN if [ "$BUILD" = "local" ] ; then composer install ; else composer install -n --no-dev --prefer-dist ; fi
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN chmod -R 0777 storage bootstrap public
#RUN if [ "$BUILD" = "local" ] ; then npm install ; else npm install ; fi
#RUN npm install

#RUN chmod -R 0777 public;
#RUN if [ "$BUILD" = "local" ] ; then npm run dev ; else npm run prod ; fi

## Disabled following when running locally (keep it enabled for GCP Cloud Run)
RUN if [ "$BUILD" = "local" ] ; then echo "This is NOT GCP!" ; else sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf ; fi
