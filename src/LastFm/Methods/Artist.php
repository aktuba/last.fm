<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;
use aktuba\LastFm\Traits\Country;

/**
 * Class Artist
 * @package aktuba\LastFm\Methods
 */
class Artist extends Method
{

    use Country;

    /**
     * Get the metadata for an artist. Includes biography, truncated at 300 characters.
     *
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @param string|null $username
     * @param null $lang
     * @return Mappers\Artist\Info
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getInfo(
        string $artist,
        ?string $id = null,
        bool $autocorrect = true,
        ?string $username = null,
        $lang = null
    ): Mappers\Artist\Info {
        /** @var Mappers\Artist\Info $result */
        $result = $this->getRequest('artist.getInfo', [
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
            'username' => $username,
            'lang' => $this->getCountryName($lang)
        ])->get();
        return $result;
    }

    /**
     * Get all the artists similar to this artist
     *
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @param int|null $limit
     * @return Mappers\Artist\Similar
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getSimilar(
        string $artist,
        ?string $id = null,
        bool $autocorrect = true,
        ?int $limit = null
    ): Mappers\Artist\Similar {
        /** @var Mappers\Artist\Similar $result */
        $result = $this->getRequest('artist.getSimilar', [
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
            'limit' => $limit
        ])->get();
        return $result;
    }

    /**
     * Get the top tags for an album on Last.fm, ordered by popularity.
     *
     * @param string $artist
     * @param string|null $album
     * @param string|null $id
     * @param bool $autocorrect
     * @return Mappers\Artist\TopTags
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTags(
        string $artist,
        ?string $album = null,
        ?string $id = null,
        bool $autocorrect = true
    ): Mappers\Artist\TopTags {
        /** @var Mappers\Artist\TopTags $result */
        $result = $this->getRequest('artist.getTopTags', [
            'artist' => $artist,
            'album' => $album,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
        ])->get();
        return $result;
    }

    /**
     * Get the top albums for an artist on Last.fm, ordered by popularity.
     *
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @param int $page
     * @param int $limit
     * @return Mappers\Artist\TopAlbums
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopAlbums(
        string $artist,
        ?string $id = null,
        bool $autocorrect = true,
        int $page = 1,
        int $limit = 50
    ): Mappers\Artist\TopAlbums {
        /** @var Mappers\Artist\TopAlbums $result */
        $result = $this->getRequest('artist.getTopAlbums', [
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
            'page' => $page,
            'limit' => $limit
        ])->get();
        return $result;
    }

    /**
     * Get the top tracks by an artist on Last.fm, ordered by popularity
     *
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @param int $page
     * @param int $limit
     * @return Mappers\Artist\TopTracks
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTracks(
        string $artist,
        ?string $id = null,
        bool $autocorrect = true,
        int $page = 1,
        int $limit = 50
    ): Mappers\Artist\TopTracks {
        /** @var Mappers\Artist\TopTracks $result */
        $result = $this->getRequest('artist.getTopTracks', [
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Search for an artist by name. Returns artist matches sorted by relevance.
     *
     * @param string $artist
     * @param int $page
     * @param int $limit
     * @return Mappers\Artist\Search
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function search(string $artist, int $page = 1, int $limit = 30): Mappers\Artist\Search
    {
        /** @var Mappers\Artist\Search $result */
        $result = $this->getRequest('artist.search', [
            'artist' => $artist,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

}
