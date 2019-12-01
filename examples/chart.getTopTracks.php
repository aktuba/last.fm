<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Track;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$topTracks = $lastFm->chart()->getTopTracks();

/** @var Track $track */
foreach ($topTracks->tracks as $track) {
	echo $track->name, ': ', $track->url, PHP_EOL;
}
