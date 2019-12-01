<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;

/**
 * Class Artist
 * @package aktuba\LastFm\Mappers\Geo\TopArtists
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property int $listeners
 * @property int $playcount
 * @property Collection $images
 * @property int $rank
 */
class Artist extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'id' => 'string',
        'name' => 'string',
        'url' => 'string',
        'listeners' => 'int',
        'playcount' => 'int',
        'images' => 'Image[]',
        'rank' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
    ];

    /** @var array */
    protected const ALIASES = [
        'id' => 'mbid',
        'images' => 'image',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        $jsonData['rank'] = $jsonData['@attr']['rank'] ?? 0;
        return $jsonData;
    }

}
