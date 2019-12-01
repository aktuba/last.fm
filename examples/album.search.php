<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Album;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$searchResult = $lastFm->album()->search('Believe');

/** @var Album $album */
foreach ($searchResult->results as $album) {
	echo $album->name, ': ', $album->url, PHP_EOL;
}
