FROM jdecode/php8-my-pg-node

# Make "public" the webroot for Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy files inside the container
COPY . .

RUN chmod -R 0777 storage bootstrap
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Prepare fake SSL certificate (for local HTTPS URLs)
RUN apt-get install -y ssl-cert
RUN openssl req -new -newkey rsa:4096 -days 3650 -nodes -x509 -subj  "/C=IN/ST=PB/L=MOH/O=NOTER/CN=202.105.1.1"  -keyout ./docker-ssl.key -out ./docker-ssl.pem -outform PEM
RUN mv docker-ssl.pem /etc/ssl/certs/ssl-cert-snakeoil.pem
RUN mv docker-ssl.key /etc/ssl/private/ssl-cert-snakeoil.key

# Setup Apache2 mod_ssl
RUN a2enmod ssl
# Setup Apache2 HTTPS env
RUN a2ensite default-ssl.conf

ARG BUILD
ENV BUILD=${BUILD}

## Disabled following when running locally (keep it enabled for GCP Cloud Run)
RUN if [ "$BUILD" = "local" ] ; then ls -al ; else sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf ; fi
