<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$info = $lastFm->tag()->getInfo('disco');

echo $info->name, ': ', $info->wiki->content, PHP_EOL;
