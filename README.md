## Установка проекта

Клонируем репозиторий

```bash
git clone git@gitlab.com:rocketfirm/bi_lms/backend.git
```

Запускаем установщик (данные для простого запуска, для более кастомного решения под проект, нужно будет перенастроить тот же .env)

```bash
make install
```


## Технический стек

* PHP 7.4
* Postgres (PostGIS)
* Laravel ^8.40
* laravel-debugbar ^3.5


## Полезные ссылки


## Работа с докером (Makefile)

|Команда|Описание|
|:-:|:-:|
|run|Запустить __docker-compose__|
|stop|Остановить __docker-compose__|
|php|Зайти в контейнер __php-fpm__|
|nginx|Зайти в контейнер __nginx__|
|adminer|Зайти в контейнер __adminer__|
|mariadb|Зайти в контейнер __mariadb__|


## Пользовател для Voyager

Зайти в админку можно через http://localhost/admin

|Поле|Значение|
|:-:|:-:|
|Почта|admin@rocketfirm.net|
|Пароль|Задается программистом|


## Adminer (Database)

Заходим в http://localhost:8080

|Поле|Значение|
|:-:|:-:|
|System|PostgreSQL|
|Server|postgres|
|Username|postgres|
|Password|docker|
