<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Artist;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$topArstists = $lastFm->chart()->getTopArtists();

/** @var Artist $artist */
foreach ($topArstists->artists as $artist) {
	echo $artist->name, ': ', $artist->url, PHP_EOL;
}
