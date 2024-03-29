<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Track;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopTracks
 * @package aktuba\LastFm\Mappers\Tag
 *
 * @property Collection|Track[] $tracks
 * @property Items\Meta $meta
 */
class TopTracks extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'tracks' => 'Track[]',
        'meta' => 'Items\Meta',
    ];

    /** @var array */
    protected const ALIASES = [
        'tracks' => 'track',
        'meta' => '@attr',
    ];

    /** @var array */
    protected const REQUIRED = [
        'track',
        '@attr',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['tracks'] ?? [];
    }

}
