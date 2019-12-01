## Клиент для api last.fm

### Требовния для использования

- PHP 7.1 и выше

### Установка

```bash
$ composer require aktuba/lastfm
```

### Пример использования:

```php
<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist\Info;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('');
/** @var Info $info */
$info = $lastFm->artist()->getInfo('Cher');

var_dump($info->url);
```

Больше примеров в `examples`