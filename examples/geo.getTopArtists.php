<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$topArtists = $lastFm->geo()->getTopArtists('ru');

/** @var Artist $artist */
foreach ($topArtists->artists as $artist) {
	echo $artist->name, ': ', $artist->url, PHP_EOL;
}
