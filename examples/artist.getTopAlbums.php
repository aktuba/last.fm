<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Album;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$topAlbums = $lastFm->artist()->getTopAlbums('Cher');

/** @var Album $album */
foreach ($topAlbums->albums as $album) {
	echo $album->name, ': ', $album->url, PHP_EOL;
}
