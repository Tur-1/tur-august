web: node public/js/ssr.js & vendor/bin/heroku-php-nginx -C nginx_app.conf /public

worker: php artisan queue:listen
