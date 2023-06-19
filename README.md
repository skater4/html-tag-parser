# Технологический стек

* **Язык программирования бэкенда:** PHP 8.2
* **Веб-Сервер:** Apache
* **Инструмент контейнеризации:** Docker
* **Тестирование:** PHPUnit

# Инструкции по локальному развертыванию

* Клонируем реп

```bash
git clone git@github.com:skater4/html-tag-parser.git
```

* Заходим в папку с проектом и разворачиваем докер

 ```bash
make build && make up && make composer-install
```

Проект будет доступен по http://localhost/

* Юнит тесты выполняем в папке src

 ```bash
phpunit tests
```

* В index.php задаем урл для парсинга
