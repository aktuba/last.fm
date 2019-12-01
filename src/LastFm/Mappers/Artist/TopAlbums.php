<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Artist;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Album;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopAlbums
 * @package aktuba\LastFm\Mappers\Artist
 *
 * @property Collection|Album[] $albums
 * @property Items\Meta $meta
 */
class TopAlbums extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'albums' => 'Album[]',
        'meta' => 'Items\Meta',
    ];

    /** @var array */
    protected const ALIASES = [
        'albums' => 'album',
        'meta' => '@attr',
    ];

    /** @var array */
    protected const REQUIRED = [
        'album',
        '@attr'
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['topalbums'] ?? [];
    }

}
