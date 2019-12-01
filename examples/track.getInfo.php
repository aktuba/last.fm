<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;
use aktuba\LastFm\Mappers\Tag;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$info = $lastFm->track()->getInfo('Believe', 'Cher');

/** @var Tag $tag */
foreach ($info->tags as $tag) {
	echo $tag->name, PHP_EOL;
}
