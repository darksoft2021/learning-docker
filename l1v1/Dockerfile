FROM python

WORKDIR /docker

COPY . .

ENV Timezone=Europe/Moscow

ENV Counter1="123"

ARG Counter2="456"

CMD python index.py; \
date; \
echo Counter; \
echo Timezone; \
echo $Counter1 $Counter2
