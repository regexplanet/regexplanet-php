# https://github.com/s6n-labs/distroless-php/blob/main/Dockerfile

ARG TAG=8.4
FROM php:${TAG} AS php

RUN mkdir -p /tmp/lib && cd /lib && \
    ldd /usr/local/bin/php | grep '=> /lib/' | cut -d' ' -f3 | sed 's#/lib/##g' | xargs -I % cp --parents "%" /tmp/lib/

RUN mkdir -p /tmp/usr/lib && cd /usr/lib && \
    ldd /usr/local/bin/php | grep '=> /usr/lib/' | cut -d' ' -f3 | sed 's#/usr/lib/##g' | xargs -I % cp --parents "%" /tmp/usr/lib/

FROM gcr.io/distroless/cc-debian12 AS runner

ARG COMMIT=(local)
ENV COMMIT=$COMMIT
ARG LASTMOD=(local)
ENV LASTMOD=$LASTMOD

ENV PORT=5000

COPY --from=php /bin/sh /bin/
COPY --from=php /tmp/lib/ /lib/
COPY --from=php /tmp/usr/lib/ /usr/lib/
COPY --from=php /usr/local/lib/libphp.* /usr/local/lib/
COPY --from=php /usr/local/bin/docker-php-* /usr/local/bin/php /usr/local/bin/
COPY www /var/www

#CMD [ "/usr/local/bin/php", "-S", "0.0.0.0:$PORT", "-t", "/var/www" ]
CMD exec /usr/local/bin/php -S 0.0.0.0:$PORT -t /var/www
