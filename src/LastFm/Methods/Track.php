<?php declare(strict_types=1);

namespace aktuba\LastFm\Methods;

use aktuba\LastFm\Exceptions;
use aktuba\LastFm\Mappers;
use aktuba\LastFm\Method;

class Track extends Method
{

    /**
     * Use the last.fm corrections data to check whether the supplied track has a correction to a canonical track
     *
     * @param string $track
     * @param string $artist
     * @return Mappers\Track\Correction
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getCorrection(string $track, string $artist): Mappers\Track\Correction
    {
        /** @var Mappers\Track\Correction $result */
        $result = $this->getRequest('track.getCorrection', [
            'track' => $track,
            'artist' => $artist,
        ])->get();
        return $result;
    }

    /**
     * Get the metadata for a track on Last.fm using the artist/track name or a musicbrainz id.
     *
     * @param string $track
     * @param string $artist
     * @param string|null $id
     * @param string|null $username
     * @param bool $autocorrect
     * @return Mappers\Track\Info
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getInfo(
        string $track,
        string $artist,
        ?string $id = null,
        ?string $username = null,
        bool $autocorrect = true
    ): Mappers\Track\Info {
        /** @var Mappers\Track\Info $result */
        $result = $this->getRequest('track.getInfo', [
            'track' => $track,
            'artist' => $artist,
            'mbid' => $id,
            'username' => $username,
            'autocorrect' => (int)$autocorrect,
        ])->get();
        return $result;
    }

    /**
     * Get the similar tracks for this track on Last.fm, based on listening data.
     *
     * @param string $track
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @param int|null $limit
     * @return Mappers\Track\Similar
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getSimilar(
        string $track,
        string $artist,
        ?string $id = null,
        bool $autocorrect = true,
        ?int $limit = null
    ): Mappers\Track\Similar {
        /** @var Mappers\Track\Similar $result */
        $result = $this->getRequest('track.getSimilar', [
            'track' => $track,
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
            'limit' => $limit,
        ])->get();
        return $result;
    }

    /**
     * Get the top tags for this track on Last.fm, ordered by tag count. Supply either track & artist name or mbid.
     *
     * @param string $track
     * @param string $artist
     * @param string|null $id
     * @param bool $autocorrect
     * @return Mappers\Track\TopTags
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function getTopTags(
        string $track,
        string $artist,
        ?string $id = null,
        bool $autocorrect = true
    ): Mappers\Track\TopTags {
        /** @var Mappers\Track\TopTags $result */
        $result = $this->getRequest('track.getTopTags', [
            'track' => $track,
            'artist' => $artist,
            'mbid' => $id,
            'autocorrect' => (int)$autocorrect,
        ])->get();
        return $result;
    }

    /**
     * Search for a track by track name. Returns track matches sorted by relevance.
     *
     * @param string $track
     * @param string|null $artist
     * @param int $page
     * @param int $limit
     * @return Mappers\Track\Search
     *
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function search(
        string $track,
        ?string $artist = null,
        int $page = 1,
        int $limit = 30
    ): Mappers\Track\Search {
        /** @var Mappers\Track\Search $result */
        $result = $this->getRequest('track.search', [
            'track' => $track,
            'artist' => $artist,
            'page' => $page,
            'limit' => $limit,
        ])->get();
        return $result;
    }

}
