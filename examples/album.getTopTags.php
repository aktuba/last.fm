<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Tag;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$tags = $lastFm->album()->getTopTags('Cher', 'Believe', '61bf0388-b8a9-48f4-81d1-7eb02706dfb0');

/** @var Tag $tag */
foreach ($tags->tags as $tag) {
	echo $tag->name, ': ', $tag->url, PHP_EOL;
}
