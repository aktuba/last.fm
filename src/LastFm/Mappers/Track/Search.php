<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track;

use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Traits\SearchQuery;

/**
 * Class Search
 * @package aktuba\LastFm\Mappers\Track
 *
 * @property Mappers\Query $query
 * @property Collection $results
 * @property Mappers\MetaFor $meta
 */
class Search extends JsonMapper
{

    use SearchQuery;

    /** @var array */
    protected const PROPERTIES = [
        'query' => 'Query',
        'results' => 'Track[]',
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
        $data = $jsonData['results'] ?? [];//dd($data);

        $query = $this->getSearchQuery($jsonData);
        if (count($query) > 0) {
            $result['query'] = $query;
        }

        if (
            array_key_exists('trackmatches', $data) &&
            array_key_exists('track', $data['trackmatches'])
        ) {
            $result['results'] = $data['trackmatches']['track'];
        }

        if (array_key_exists('@attr', $data)) {
            $result['meta'] = $data['@attr'];
        }

        return $result;
    }

}
