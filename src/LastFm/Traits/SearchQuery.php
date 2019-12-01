<?php declare(strict_types=1);

namespace aktuba\LastFm\Traits;

/**
 * Trait SearchQuery
 * @package aktuba\LastFm\Traits
 */
trait SearchQuery
{

    /**
     * @param  array  $jsonData
     * @return array
     */
    public function getSearchQuery(array $jsonData): array
    {
        $result = [];

        $data = $jsonData['results'] ?? [];
        if (
            array_key_exists('opensearch:Query', $data) &&
            (
                array_key_exists('searchTerms', $data['opensearch:Query']) ||
                array_key_exists('#text', $data['opensearch:Query'])
            ) &&
            array_key_exists('opensearch:totalResults', $data) &&
            array_key_exists('opensearch:startIndex', $data) &&
            array_key_exists('opensearch:itemsPerPage', $data)
        ) {
            $result = [
                'query' => $data['opensearch:Query']['searchTerms'] ?? $data['opensearch:Query']['#text'],
                'total' => (int) $data['opensearch:totalResults'],
                'startIndex' => (int) $jsonData['results']['opensearch:startIndex'],
                'page' => (int) $data['opensearch:Query']['startPage'],
                'perPage' => (int) $data['opensearch:itemsPerPage'],
            ];
        }

        return $result;
    }

}
