<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Artist;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Artist;
use aktuba\LastFm\Mappers\Tag;
use Tightenco\Collect\Support\Collection;

/**
 * Class Info
 * @package aktuba\LastFm\Mappers\Artist
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property Items\Stats $stats
 * @property Collection|Artist[] $similar
 * @property Collection|Tag[] $tags
 * @property Items\Bio $bio
 */
class Info extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'url' => 'string',
        'images' => 'Image[]',
        'stats' => 'Items\Stats',
        'similar' => 'Artist[]',
        'tags' => 'Tag[]',
        'bio' => 'Items\Bio',
    ];

    /** @var array */
    protected const ALIASES = [
        'id' => 'mbid',
        'images' => 'image',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
        'url',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        $result = $jsonData['artist'] ?? [];
        $result['similar'] = $result['similar']['artist'] ?? [];
        $result['tags'] = $result['tags']['tag'] ?? [];
        return $result;
    }

}
