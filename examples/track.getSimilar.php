<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Track;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$similar = $lastFm->track()->getSimilar('Believe', 'Cher');

/** @var Track $track */
foreach ($similar->tracks as $track) {
	echo $track->artist->name, ', ', $track->name, PHP_EOL;
}
