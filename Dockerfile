FROM wordpress:php7.1-apache
WORKDIR /var/www/html/wp-content/themes/mytheme/
COPY . /var/www/html/wp-content/themes/mytheme/
