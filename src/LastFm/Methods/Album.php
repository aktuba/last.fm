<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;
use aktuba\LastFm\Traits\Country;

class Album extends Method
{

    use Country;

    /**
     * Get the metadata and tracklist for an album on Last.fm using the album name or a musicbrainz id.
     * @param string $name
     * @param string $album
     * @param string|null $id
     * @param bool $autoCorrect
     * @param string|null $username
     * @param null $lang
     * @return Mappers\Album\Info
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getInfo(
        string $name,
        string $album,
        ?string $id = null,
        bool $autoCorrect = true,
        ?string $username = null,
        $lang = null
    ): Mappers\Album\Info {
        /** @var Mappers\Album\Info $result */
        $result = $this->getRequest('album.getInfo', [
            'name' => $name,
            'album' => $album,
            'mbid' => $id,
            'autocorrect' => (int)$autoCorrect,
            'username' => $username,
            'lang' => $this->getCountryName($lang)
        ])->get();
        return $result;
    }

    /**
     * Get the top tags for an album on Last.fm, ordered by popularity.
     *
     * @param string $artist
     * @param string $album
     * @param string|null $id
     * @param bool $autocorrect
     * @return Mappers\Album\TopTags
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTags(
        string $artist,
        string $album,
        ?string $id = null,
        bool $autocorrect = true
    ): Mappers\Album\TopTags {
        /** @var Mappers\Album\TopTags $result */
        $result = $this->getRequest('album.getTopTags', [
            'artist' => $artist,
            'album' => $album,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
        ])->get();
        return $result;
    }

    /**
     * Search for an album by name. Returns album matches sorted by relevance.
     *
     * @param string $album
     * @param int $page
     * @param int $limit
     * @return Mappers\Album\Search
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function search(string $album, int $page = 1, int $limit = 50): Mappers\Album\Search
    {
        /** @var Mappers\Album\Search $result */
        $result = $this->getRequest('album.search', [
            'album' => $album,
            'page' => $page,
            'limit' => $limit
        ])->get();
        return $result;
    }

}
