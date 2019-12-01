<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class Similar
 * @package aktuba\LastFm\Mappers\Track
 *
 * @property Collection $tracks
 * @property Items\Meta $meta
 */
class Similar extends JsonMapper
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
        return $jsonData['similartracks'] ?? [];
    }

}
