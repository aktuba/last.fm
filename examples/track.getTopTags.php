<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Tag;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$topTags = $lastFm->track()->getTopTags('Believe', 'Cher');

/** @var Tag $tag */
foreach ($topTags->tags as $tag) {
	echo $tag->name, ': ', $tag->url, PHP_EOL;
}
