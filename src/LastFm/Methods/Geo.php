<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;
use aktuba\LastFm\Traits\Country;

/**
 * Class Geo
 * @package aktuba\LastFm\Methods
 */
class Geo extends Method
{

    use Country;

    /**
     * Get the most popular artists on Last.fm by country
     *
     * @param string|int $country
     * @param int $page
     * @param int $limit
     * @return Mappers\Geo\TopArtists
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopArtists($country, int $page = 1, int $limit = 50): Mappers\Geo\TopArtists
    {
        /** @var Mappers\Geo\TopArtists $result */
        $result = $this->getRequest('geo.getTopArtists', [
            'country' => $this->getCountryName($country),
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Get the most popular tracks on Last.fm last week by country
     *
     * @param string|int $country
     * @param string|null $location
     * @param int $page
     * @param int|null $limit
     * @return Mappers\Geo\TopTracks
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTracks(
        $country,
        ?string $location = null,
        int $page = 1,
        int $limit = null
    ): Mappers\Geo\TopTracks {
        /** @var Mappers\Geo\TopTracks $result */
        $result = $this->getRequest('geo.getTopTracks', [
            'country' => $this->getCountryName($country),
            'location' => $location,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

}
