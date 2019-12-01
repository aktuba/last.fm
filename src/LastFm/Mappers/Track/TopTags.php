<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopTags
 * @package aktuba\LastFm\Mappers\Track
 *
 * @property Collection $tags
 * @property Items\Meta $meta
 */
class TopTags extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'tags' => 'Tag[]',
        'meta' => 'Items\Meta',
    ];

    /** @var array */
    protected const ALIASES = [
        'tags' => 'tag',
        'meta' => '@attr',
    ];

    /** @var array */
    protected const REQUIRED = [
        'tag',
        '@attr',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['toptags'] ?? [];
    }

}
