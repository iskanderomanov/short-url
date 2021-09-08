# Сократитель ссылок

Это приложение позволит сократить ссылку для удобного использования и позволяет просматривать статистику переходов по сайту

**Системные требования**
- PHP выше 7.4
- Mysqli 



## Установка

Введите команду в ваш CLI что бы стянуть проект
```bash
$ git clone https://github.com/iskanderomanov/short-url.git
```

В папке проекта введите команду
```bash
$ composer install
```

 Для генерации ключа приложения
```bash
$ php artisan key:generate
```

Скопировать пример конфига .env.example в .env
```bash
$ cp .env.example .env
```

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру
`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=backendTest`

`DB_USERNAME=root`

`DB_PASSWORD=null`


В открытой консоли директории проекта введите команду для генерации таблиц базы данных:
```bash
$ php artisan migrate
```

Используйте для запуска сайта команду 
```bash
$ php artisan serve
```