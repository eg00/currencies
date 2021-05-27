

## Демо

https://currencies.2ql.ru/docs


## Установка и запуск

```shell
    git clone git clone https://github.com/eg00/currencies.git
    cd currencies
    cp .env.example .env
```

### в локальной среде:

```shell
    composer install
    php artisan key:generate
    php artisan serve
```
**Настроить параметры БД в файле .env**

```shell
   php artisan migrate:fresh --seed
```

### при использовании docker
```shell
docker-compose up -d
docker exec -it currencies_laravel.test_1 composer install  
docker exec -it currencies_laravel.test_1 php artisan key:generate
docker exec -it currencies_laravel.test_1 php artisan migrate:fresh --seed
```

### Email и пароль

Email и пароль устанавливаются переменными окружения **USER_EMAIL** и **USER_PASSWORD** соответственно

