<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist;
use aktuba\LastFm\Mappers\Artist\Similar;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
/** @var Similar $similar */
$similar = $lastFm->artist()->getSimilar('Cher');

/** @var Artist $artist */
foreach ($similar->artists as $artist) {
	echo $artist->name, ': ', $artist->url, PHP_EOL;
}
