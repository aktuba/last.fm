<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Artist;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopArtists
 * @package aktuba\LastFm\Mappers\Tag
 *
 * @property Collection|Artist[] $artists
 * @property Items\Meta $meta
 */
class TopArtists extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'artists' => 'Artist[]',
        'meta' => 'Items\Meta',
    ];

    /** @var array */
    protected const ALIASES = [
        'artists' => 'artist',
        'meta' => '@attr',
    ];

    /** @var array */
    protected const REQUIRED = [
        'artist',
        '@attr'
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['topartists'] ?? [];
    }

}
