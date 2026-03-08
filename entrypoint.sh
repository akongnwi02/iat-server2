#!/usr/bin/env bash

php /var/www/artisan migrate --force

sed -i "s/8080/$PORT/g" /etc/nginx/conf.d/default.conf

/usr/bin/supervisord -n -c /var/www/supervisord.conf