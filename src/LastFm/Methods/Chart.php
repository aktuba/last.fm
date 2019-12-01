<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;

/**
 * Class Chart
 * @package aktuba\LastFm\Methods
 */
class Chart extends Method
{

    /**
     * Get the top artists chart
     *
     * @param int $page
     * @param int $limit
     * @return Mappers\Chart\TopArtists
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopArtists(int $page = 1, int $limit = 50): Mappers\Chart\TopArtists
    {
        /** @var Mappers\Chart\TopArtists $result */
        $result = $this->getRequest('chart.getTopArtists', [
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Get the top artists chart
     *
     * @param int $page
     * @param int $limit
     * @return Mappers\Chart\TopTags
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTags(int $page = 1, int $limit = 50): Mappers\Chart\TopTags
    {
        /** @var Mappers\Chart\TopTags $result */
        $result = $this->getRequest('chart.getTopTags', [
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return Mappers\Chart\TopTracks
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTracks(int $page = 1, int $limit = 50): Mappers\Chart\TopTracks
    {
        /** @var Mappers\Chart\TopTracks $result */
        $result = $this->getRequest('chart.getTopTracks', [
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

}
