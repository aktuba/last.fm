<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class Track
 * @package aktuba\LastFm\Mappers
 *
 * @property string $id
 * @property string $name
 * @property int $duration
 * @property int $listeners
 * @property string $url
 * @property Artist $artist
 * @property Collection $images
 * @property int $rank
 * @property float $match
 */
class Track extends JsonMapper
{

    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'url' => 'string',
        'duration' => 'int',
        'listeners' => 'int',
        'artist' => 'Artist',
        'images' => 'Image[]',
        'rank' => 'int',
        'match' => 'float',
    ];

    protected const REQUIRED = [
        'name',
        'url',
        'artist',
    ];

    protected const ALIASES = [
        'id' => 'mbid',
        'images' => 'image',
    ];

    protected function formatJson(array $jsonData): array
    {
        if (array_key_exists('artist', $jsonData) && is_string($jsonData['artist'])) {
            $jsonData['artist'] = [
                'name' => $jsonData['artist'],
            ];
        }

        return $jsonData;
    }

}
