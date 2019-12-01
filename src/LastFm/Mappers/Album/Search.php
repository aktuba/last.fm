<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Album;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Traits\SearchQuery;
use Tightenco\Collect\Support\Collection;

/**
 * Class Search
 * @package aktuba\LastFm\Mappers\Album
 *
 * @property Mappers\Query $query
 * @property Collection|Mappers\Album[] $results
 * @property Mappers\MetaFor $meta
 */
class Search extends JsonMapper
{

    use SearchQuery;

    /** @var array */
    protected const PROPERTIES = [
        'query' => 'Query',
        'results' => 'Album[]',
        'meta' => 'MetaFor',
    ];

    /** @var array */
    protected const REQUIRED = [
        'query',
        'results',
        'meta',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        $result = [];
        $data = $jsonData['results'] ?? [];

        $query = $this->getSearchQuery($jsonData);
        if (count($query) > 0) {
            $result['query'] = $query;
        }

        if (
            array_key_exists('albummatches', $data) &&
            array_key_exists('album', $data['albummatches'])
        ) {
            $result['results'] = $data['albummatches']['album'];
        }

        if (array_key_exists('@attr', $data)) {
            $result['meta'] = $data['@attr'];
        }

        return $result;
    }

}
