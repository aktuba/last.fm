<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist\Info;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
/** @var Info $info */
$info = $lastFm->artist()->getInfo('Loboda', null, true, null, 'ru');

var_dump($info);
