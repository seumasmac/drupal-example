ARG CLI_IMAGE
FROM ${CLI_IMAGE} as cli

FROM amazeeio/php:7.2-fpm

COPY --from=cli /app /app

RUN apk update

# Add dependencies here
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS openldap-dev

# Add new modules here
RUN docker-php-ext-install ldap
