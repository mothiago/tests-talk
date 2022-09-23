
# Makefile
build-and-serve:
	@eval $(ssh-agent); docker run --rm --interactive --tty \
		--volume ${PWD}:/app \
  		--volume ${SSH_AUTH_SOCK}:/ssh-auth.sock \
  		--env SSH_AUTH_SOCK=/ssh-auth.sock \
  		composer:2.3.10 composer install --ignore-platform-reqs --no-scripts && \
	cp .env.example .env && \
  	docker-compose -f ./docker-compose.yaml up --build --remove-orphans

serve:
	@docker-compose -f ./docker-compose.yaml up

shell:
	@docker-compose -f ./docker-compose.yaml exec teste_talk bash

run:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan $(filter-out $@, $(MAKECMDGOALS))"

help:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan doctrine:generate:proxies && composer dump-autoload && chmod -R 777 storage/proxies"

composer-install:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "composer install"

composer-update:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "composer update"

db_update:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "php artisan migrate && php artisan db:seed"

dump-autoload:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "composer dump-autoload"

database-migrate:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan doctrine:migrations:migrate"

schema-update:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan doctrine:schema:update"

migration:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan doctrine:migrations:diff && chmod 777 -Rf database/migrations/*"

unit-tests:
	@docker-compose -f ./docker-compose.yaml exec teste_talk sh -c "/var/www/artisan test --testsuite Unit"

feature-tests:
	@docker-compose -f ./docker-compose.yaml exec teste_talk sh -c "/var/www/artisan test --testsuite Feature"

all-tests:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "./vendor/bin/phpunit -d memory_limit=-1"

generate-doc:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "/var/www/artisan l5-swagger:generate && chmod 777 -Rf storage/api-docs/*"

coverage:
	@docker-compose -f ./docker-compose.yaml exec -T teste_talk sh -c "php -dpcov.enabled=1 -dpcov.directory=app/ -dpcov.exclude="~vendor~" ./vendor/bin/phpunit -d memory_limit=-1 && chmod -R 777 coverage/"

list-tag-number:
	@git fetch --tags && git tag -l | grep "^[0-9]\.[0-9]\.*" | sort -n

last-tag-number:
	@git fetch --tags && git tag -l | grep "^[0-9]\.[0-9]\.*" | sort -n | tail -n 1

%:
	@true

fix-migrations-permissions:
	@chmod -R 1000:1000 database/migrations/*
