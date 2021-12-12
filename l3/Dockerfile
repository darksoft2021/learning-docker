FROM php

LABEL multi.com.example.vendor="DarkSoft2021" \
      multi.version="2.4" \
      multi.description="Learn docker containers"

ENV Counter=234
ENV ServerIp="10.34.81.234"

WORKDIR /docker/l3

COPY . .

CMD ["echo", "Test docker CLI messages"]
CMD ["id"]
CMD ["ps"]
CMD ["ls /"]
CMD ["df -h"]
CMD ["uname -a"]
CMD ["php", "index.php"]