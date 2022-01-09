FROM php:fpm

RUN apt-get update && apt-get install -y \
libmcrypt-dev 
RUN docker-php-ext-install -j$(nproc) sockets

WORKDIR /docker/learning-docker/l4

COPY . .

LABEL multi.com.example.vendor="DarkSoft2021" \
      multi.version="2.6" \
      multi.description="Learn docker containers" \
      multi.changed="Add php-daemon. Listen 31337 port."


ENV Counter=234
ENV ServerIp="10.34.81.234"

EXPOSE 31337
#RUN apt update && apt install -y php-iconv php-json php-mbstring php-zip php-sockets php-curl php-gd

CMD ["echo", "Test docker CLI messages"]
#CMD ["echo", Counter]
#CMD ["id"]
CMD ["php", "index.php"]
CMD ["php", "simple-daemon.php"]

