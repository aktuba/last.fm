<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Track;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$album = $lastFm->album()->getInfo('Cher', 'Believe', '61bf0388-b8a9-48f4-81d1-7eb02706dfb0');

/** @var Track $track */
foreach ($album->tracks as $track) {
	echo $track->name, PHP_EOL;
}
