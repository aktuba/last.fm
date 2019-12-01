<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopAlbums
 * @package aktuba\LastFm\Mappers\Tag
 *
 * @property Collection $albums
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
        '@attr',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['albums'] ?? [];
    }

}
