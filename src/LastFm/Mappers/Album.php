<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class Album
 * @package aktuba\LastFm\Mappers
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property Artist $artist
 * @property Collection $images
 * @property int $position
 */
class Album extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'url' => 'string',
        'artist' => 'Artist',
        'images' => 'Image[]',
        'position' => 'int',
    ];

    /** @var array */
    protected const ALIASES = [
        'id' => 'mbid',
        'images' => 'image',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
        'artist',
        'url',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        if (array_key_exists('artist', $jsonData) && is_string($jsonData['artist'])) {
            $jsonData['artist'] = [
                'name' => $jsonData['artist'],
            ];
        }

        if (array_key_exists('@attr', $jsonData)) {
            $jsonData['position'] = $jsonData['@attr']['position'] ?? 0;
        }

        return $jsonData;
    }

}
