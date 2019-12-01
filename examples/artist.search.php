<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$searchResult = $lastFm->artist()->search('Cher');

/** @var Artist $artist */
foreach ($searchResult->results as $artist) {
	echo $artist->name, ': ', $artist->url, PHP_EOL;
}
