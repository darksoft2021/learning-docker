# С какого образа грузимся
FROM php:8-fpm

# Доставляем пакеты расширения для php
RUN apt-get update && apt-get install -y \
apt-utils libmcrypt-dev libfreetype6-dev libbz2-dev curl wget
RUN docker-php-ext-install -j$(nproc) sockets pdo_mysql 
#\
#json libxml snmp \
#mysqli simplexml 
#mcrypt libpng12-dev filesystem  imagemagic  oauth  recode libzip zlib  libzip bz2 zip intl  exif fileinfo ldap iconv  readline mbstring libcurl curl ftp 

#
WORKDIR /docker/learning-docker/l5

# Копируем все файлы из текущей папки в рабочую папку образа
COPY . .

# Копируем конфиг-файлы php в имидж
#ADD ../ini-files/php8-fpm/php.ini /etc
#ADD ../ini-files/php8-fpm/www.conf /etc

# Разные метки типа вендора и версии 
LABEL multi.com.example.vendor="DarkSoft2021" \
      multi.com.example.label-with-value="foo" \
      multi.version="2.6" \
      multi.description="Learn docker containers" \
      multi.changed="Add php-daemon. Listen 31337 port."


# Устанавливаем переменные
ENV Counter=234
ENV ServerIp="10.34.81.234"

# Открываем порт 31337
EXPOSE 31337
#RUN apt update && apt install -y php-iconv php-json php-mbstring php-zip php-sockets php-curl php-gd

CMD ["php-fpm"]
CMD ["date"]
CMD ["echo", "Test docker CLI messages"]
CMD ["echo", Counter]
CMD ["php", "index.php"]
CMD ["php", "simple-daemon.php"]

ONBUILD CMD ["date"]