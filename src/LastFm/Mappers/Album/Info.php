<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Album;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers;
use Tightenco\Collect\Support\Collection;

/**
 * Class Info
 * @package aktuba\LastFm\Mappers\Album
 *
 * @property string $id
 * @property string $name
 * @property string $artist
 * @property string $url
 * @property Collection $images
 * @property int $listeners
 * @property int $playcount
 * @property Collection $tracks
 * @property Collection $tags
 * @property Mappers\Wiki $wiki
 */
class Info extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'artist' => 'string',
        'url' => 'string',
        'images' => 'Image[]',
        'listeners' => 'int',
        'playcount' => 'int',
        'tracks' => 'Track[]',
        'tags' => 'Tag[]',
        'wiki' => 'Wiki',
    ];

    /** @var array */
    protected const ALIASES = [
        'id' => 'mbid',
        'images' => 'image',
        'tags' => 'tag',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
        'artist',
        'url',
        'tracks',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        $jsonData = $jsonData['album'] ?? [];
        if (count($jsonData) > 0) {
            $jsonData['tracks'] = $jsonData['tracks']['track'] ?? [];
            $jsonData['tags'] = $jsonData['tags']['tag'] ?? [];
        }
        return $jsonData;
    }

}
