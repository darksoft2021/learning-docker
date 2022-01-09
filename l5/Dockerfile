FROM php:fpm

RUN apt-get update && apt-get install -y \
libmcrypt-dev 
RUN docker-php-ext-install -j$(nproc) sockets

WORKDIR /docker/learning-docker/l5

COPY . .

LABEL multi.com.example.vendor="DarkSoft2021" \
      multi.version="2.6" \
      multi.description="Learn docker containers" \
      multi.changed="Add php-daemon. Listen 31337 port."

EXPOSE 31337

CMD ["php", "simple-daemon.php"]

