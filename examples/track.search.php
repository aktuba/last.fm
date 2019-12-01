<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Track;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$searchResult = $lastFm->track()->search('Believe');

/** @var Track $track */
foreach ($searchResult->results as $track) {
	echo $track->artist->name, ', ', $track->name, ': ', $track->url, PHP_EOL;
}
