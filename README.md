Порядок действий:
* установить глобально composer , либо скачать с официального сайта https://getcomposer.org/ файл `composer.phar` 
и положить в папку с проектом
* определить, какие зависимости нужны в проекте и установить их
    * https://packagist.org/
    * команда устанавливает пакет `[package name]` в блок require - они нужны всегда 
    ```
    composer require [package name]
  ``` 
 
    * удаляет `[package name]`
    ```
    composer remove [package name]
  ```
    * только для разработки (require-dev)
    ```
  composer require --dev [package name]
  ```
    * удаляет пакет из блока require-dev 
    ```
  composer remove --dev [package name]
    ```

#### Установка всех зависимостей проекта (не меняет composer.lock)
```
composer install
```

#### Разворачивает пакеты кроме блока require-dev (для production)
```
composer install --no-dev
```

#### Установка последних версий (меняет composer.lock)
```
composer update
```

#### Создать новый проект с помощью фреймворка
Установит фреймворк `laravel/laravel` в папку `new-project`
```
composer create-project laravel/laravel new-project

// эквивалентно командам
git clone ...
composer install 
```

---
    
Секция `autoload` отвечает за автозагрузку классов. Composer предоставляет несколько способов - 
это стандарт psr-4 и psr-0 (он считается устаревшим)

---
####Обновление composer'а
```
composer self-update
```

####Список всех установленных пакетов
```
composer show
```

#### Обновление автозагрузчика
```
composer dump-autoload

// в production окружении
composer dump-autoload --optimize
```