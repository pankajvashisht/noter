FROM jdecode/php8-pg-node-laravel

#ARG BUILD
#ENV BUILD=${BUILD}

#COPY . .
#RUN if [ "$BUILD" = "local" ] ; then composer install ; else composer install -n --no-dev --prefer-dist ; fi
#RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

#RUN chmod -R 0777 storage bootstrap public
#RUN if [ "$BUILD" = "local" ] ; then npm install ; else npm install ; fi
#RUN npm install

#RUN chmod -R 0777 public;
#RUN if [ "$BUILD" = "local" ] ; then npm run dev ; else npm run prod ; fi

## Disabled following when running locally (keep it enabled for GCP Cloud Run)
#RUN if [ "$BUILD" = "local" ] ; then echo "This is NOT GCP!" ; else sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf ; fi
