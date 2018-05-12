# guber-parser

Библиотека позволяет получить список губернаторов субъектов РФ

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205-blue.svg)](https://php.net/)
## Установка

```bash
composer require brizhanev/guber-parser
```

## Базовое использование

```php
<?php

require 'vendor/autoload.php';

use GuberParser\GuberParser;

$guberParser = new GuberParser();

$guberParser->run();

$guberParser->getRecords();

```
## Пример сохранения результатов с помощью класса хранилища (должен реализовывать интерфейс StorageInterface)

```php
<?php

require 'vendor/autoload.php';

use GuberParser\GuberParser;
use GuberParser\JSON;

$guberParser = new GuberParser();

$jsonStorage = new JSON("test.json");

$guberParser->setStorage($jsonStorage);

$guberParser->run();

```





