<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;
use aktuba\LastFm\Mappers;

/**
 * Class Info
 * @package aktuba\LastFm\Mappers\Track
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property int $dusration
 * @property int $listeners
 * @property int $playcount
 * @property Mappers\Artist $artist
 * @property Mappers\Album $album
 * @property Collection|Mappers\Tag[] $tags
 * @property Mappers\Wiki $wiki
 */
class Info extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'url' => 'string',
        'duration' => 'int',
        'listeners' => 'int',
        'playcount' => 'int',
        'artist' => 'Artist',
        'album' => 'Album',
        'tags' => 'Tag[]',
        'wiki' => 'Wiki',
    ];

    /** @var array */
    protected const ALIASES = [
        'id' => 'mbid',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        $result = $jsonData['track'] ?? [];
        $result['tags'] = $result['toptags']['tag'] ?? [];

        if (
            array_key_exists('album', $result) &&
            array_key_exists('title', $result['album']) &&
            !array_key_exists('name', $result['album'])
        ) {
            $result['album']['name'] = $result['album']['title'];
        }

        return $result;
    }

}
