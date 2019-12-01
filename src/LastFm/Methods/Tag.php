<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;
use aktuba\LastFm\Traits\Country;

/**
 * Class Tag
 * @package aktuba\LastFm\Methods
 */
class Tag extends Method
{

    use Country;

    /**
     * Get the metadata for a tag
     *
     * @param string $tag
     * @param null $lang
     * @return Mappers\Tag\Info
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getInfo(string $tag, $lang = null): Mappers\Tag\Info
    {
        /** @var Mappers\Tag\Info $result */
        $result = $this->getRequest('tag.getInfo', [
            'tag' => $tag,
            'lang' => $this->getCountryName($lang),
        ])->get();
        return $result;
    }

    /**
     * Search for tags similar to this one. Returns tags ranked by similarity, based on listening data.
     *
     * @param string $tag
     * @return Mappers\Tag\Similar
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getSimilar(string $tag): Mappers\Tag\Similar
    {
        /** @var Mappers\Tag\Similar $result */
        $result = $this->getRequest('tag.getSimilar', [
            'tag' => $tag,
        ])->get();
        return $result;
    }

    /**
     * Get the top albums tagged by this tag, ordered by tag count.
     *
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return Mappers\Tag\TopAlbums
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopAlbums(string $tag, int $page = 1, int $limit = 50): Mappers\Tag\TopAlbums
    {
        /** @var Mappers\Tag\TopAlbums $result */
        $result = $this->getRequest('tag.getTopAlbums', [
            'tag' => $tag,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Get the top artists tagged by this tag, ordered by tag count.
     *
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return Mappers\Tag\TopArtists
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopArtists(string $tag, int $page = 1, int $limit = 50): Mappers\Tag\TopArtists
    {
        /** @var Mappers\Tag\TopArtists $result */
        $result = $this->getRequest('tag.getTopArtists', [
            'tag' => $tag,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Fetches the top global tags on Last.fm, sorted by popularity (number of times used)
     *
     * @return Mappers\Tag\TopTags
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTags(): Mappers\Tag\TopTags
    {
        /** @var Mappers\Tag\TopTags $result */
        $result = $this->getRequest('tag.getTopTags', [])->get();
        return $result;
    }

    /**
     * Get the top tracks tagged by this tag, ordered by tag count.
     *
     * @param string $tag
     * @param int $page
     * @param int $limit
     * @return Mappers\Tag\TopTracks
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTracks(string $tag, int $page = 1, int $limit = 50): Mappers\Tag\TopTracks
    {
        /** @var Mappers\Tag\TopTracks $result */
        $result = $this->getRequest('tag.getTopTracks', [
            'tag' => $tag,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

}
