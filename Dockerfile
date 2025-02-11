FROM cgr.dev/chainguard/php:latest

ARG COMMIT=(local)
ENV COMMIT=$COMMIT
ARG LASTMOD=(local)
ENV LASTMOD=$LASTMOD

USER php
COPY www /app/www
COPY bin/start.php /app/bin/start.php
ENV PORT=6000
ENV LISTEN=0.0.0.0:$PORT
EXPOSE 6000
ENTRYPOINT [ "php", "/app/bin/start.php"]
