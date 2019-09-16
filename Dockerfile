FROM mysql:latest

ENV MYSQL_ALLOW_EMPTY_PASSWORD=yes

COPY ./initdb.d/init.sql /docker-entrypoint-initdb.d/init.sql