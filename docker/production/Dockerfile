FROM webdevops/php-nginx:8.2-alpine

ENV WEB_DOCUMENT_ROOT=/app/public

ENV PHP_DISMOD=bz2,calendar,exiif,ffi,intl,gettext,ldap,mysqli,imap,pdo_gsql,soap,sockets,sysvsm,shmop,xsl,zip,gd,apcu,vips,yaml,imagick,mongodb,amqp

WORKDIR /app

COPY . .

RUN composer install --no-dev --no-interaction --prefer-dist
RUN sudo apt-get install php8.2-gd

COPY docker/production/start-container /usr/local/bin/start-container
RUN chmod +x /usr/local/bin/start-container

RUN chown -R application:application .

ENTRYPOINT ["start-container"]
