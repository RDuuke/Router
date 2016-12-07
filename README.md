# RDuuke\\Router

## Installation

It's recommended that you use [Composer](https://getcomposer.org/) to install Slim.

```bash
$ composer require rduuke/router
```

Rduuke/Router requires PHP 5.5.0 or newer.

## Usage

Create an index.php file with the following contents:

```php
<?php

require 'vendor/autoload.php';

$app = new RDuuke\Router\Router();

$app->get('/', function (){
   echo "Welcome RDuuke\\Router";
});

$app->run();
```

You may quickly test this using the built-in PHP server:
```bash
$ php -S localhost:8080
```

Going to http://localhost:8080/ will now display "Welcome RDuuke\\Router".

## Tests

To execute the test suite, you'll need phpunit.

```bash
$ phpunit
```
