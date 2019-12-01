<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class TopTags
 * @package aktuba\LastFm\Mappers\Tag
 *
 * @property Collection $tags
 * @property Items\TopTagsMeta $meta
 */
class TopTags extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'tags' => 'Tag[]',
        'meta' => 'Items\TopTagsMeta',
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
