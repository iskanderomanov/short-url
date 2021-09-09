## Установка проекта

В README.md команды php artisan key:generate и cp .env.example .env перепутаны местами.
Сначала нужно выполнить `cp .env.example .env` а потом php `artisan key:generate` иначе выходит ошибка:


```bash
$ php artisan key:generate
```


```bash
ErrorException

file_get_contents(/Users/nikolay/Developer/php/review/short-url/.env): failed to open stream: No such file or directory
```

## Работа проекта.

* После запуска (php artisan serve) у меня запускается на http://127.0.0.1:8000, но ссылки генерятся как: 127.0.0.1/abKvc
* Если ничего не ввести в поле ссылки, то все равно генерирует коротку ссылку и после перехода по ней происходит бесконечный редирект (ERR_INVALID_REDIRECT) и в базу ложится адрес вида: http://

## Архитектура БД

* Таблица urls
    * Типы полей указаны как text. Для поля originalUrl можно указать тип VARCHAR(2000) https://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers
    * Тип поля generatedUrl также можно задать определенной длины, тем более мы знаем какой размер будет у ссылки. Также поле необходимо сделать уникальным.
* Таблица statistics
    * Для ip адреса (ip_adress) есть специальный тип.
    * Для user_agent и url также можно указать типы VARCHAR с определеннйо длиной.

## Код
* Метод UrlController::generateUrl при генерации адреса (Str::random(5)). Нет проверки на дубликат в бд.
* Метод StatisticController::url нет проверок на то, что ты получил из бд. Например такой запрос уже не работает http://127.0.0.1:8000/stat/url/1000
* Метод StatisticController::urlIp см п. 1 
* Метод StatisticController::urlUserAgent см п. 1 
* Пустых методов StatisticController::update и StatisticController::destroy быть в коде не должно 
* Метод RedirectController::redirectUrl имеет странную проверку на url. Достаточно было проверить что введен валидный урл валидацией или filter_var($text, FILTER_VALIDATE_URL)

## Заключение
* Нет валидации введенных данных 
* Нет обработок ошибок, например если с БД не удалось получить запись. 
* Нет понимания построения БД
