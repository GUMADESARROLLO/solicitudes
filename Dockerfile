FROM gumadesarrollo/php:7.4-apache-sqlsrv-prod

WORKDIR /var/www/html

RUN mkdir importacion

WORKDIR /var/www/html/importacion

COPY . .

RUN composer install --ignore-platform-reqs

RUN chmod -R 777 storage

EXPOSE 80