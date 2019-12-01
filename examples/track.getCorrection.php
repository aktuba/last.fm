<?php declare(strict_types=1);

use aktuba\LastFm\LastFm;

require __DIR__.'/../vendor/autoload.php';

$lastFm = new LastFm('...');
$correction = $lastFm->track()->getCorrection('Believe', 'Cher');

echo $correction->track->artist->name, ', ', $correction->track->name, ': ', $correction->track->url, PHP_EOL;
