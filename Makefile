env = ./.env.example

ifneq ("$(wildcard ./.env)","")
    env = ./.env
endif

docker = docker-compose -f ./docker/docker-compose.yml -f ./docker/docker-compose.override.yml --env-file ${env}

include ${env}
export

# Запустить установку проекта
.PHONY: install
install:
	echo ${env}
	cp docker/example.docker-compose.override.yml docker/docker-compose.override.yml
	cp .env.example .env
	${docker} up -d
	${docker} exec -i postgres psql -U ${DB_USERNAME} -d ${DB_DATABASE} -c "CREATE EXTENSION postgis;"
	${docker} exec php-fpm sh -c "composer update"
	${docker} exec php-fpm sh -c "php artisan key:generate"
	${docker} exec php-fpm sh -c "php artisan storage:link"
	${docker} exec php-fpm sh -c "php artisan migrate:fresh --seed"
	${docker} exec php-fpm sh -c "php artisan voyager:admin admin@rocketfirm.net --create"


# Запустить Docker демона
.PHONY: run
run:
	${docker} up -d
	${docker} exec php-fpm sh -c "composer install"
	${docker} exec php-fpm sh -c "php artisan migrate --seed"

# Остановить работу Docker'а
.PHONY: stop
stop:
	${docker} stop

# Зайти в bash php-fpm
.PHONY: php
php:
	${docker} exec php-fpm bash -l

# Зайти в sh postgres
.PHONY: postgres
postgres:
	${docker} exec postgres sh -l

# Зайти в sh nginx
.PHONY: nginx
nginx:
	${docker} exec nginx sh -l

# Зайти в sh adminer
.PHONY: adminer
adminer:
	${docker} exec adminer sh -l
