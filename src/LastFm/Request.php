<?php declare(strict_types=1);

namespace aktuba\LastFm;

use GuzzleHttp\Client;
use aktuba\JsonMapper\JsonMapper;
use Tightenco\Collect\Support\Collection;
use Throwable;
use aktuba\LastFm\Exceptions;

/**
 * Class Request
 * @package aktuba\LastFm
 */
class Request
{

    /** @var string */
    private const URL = 'https://ws.audioscrobbler.com/2.0/';

    /** @var array */
    private const MAPPERS = [
        'album' => [
            'getInfo' => Mappers\Album\Info::class,
            'getTopTags' => Mappers\Album\TopTags::class,
            'search' => Mappers\Album\Search::class,
        ],
        'artist' => [
            'getInfo' => Mappers\Artist\Info::class,
            'getSimilar' => Mappers\Artist\Similar::class,
            'getTopAlbums' => Mappers\Artist\TopAlbums::class,
            'getTopTags' => Mappers\Artist\TopTags::class,
            'getTopTracks' => Mappers\Artist\TopTracks::class,
            'search' => Mappers\Artist\Search::class,
        ],
        'chart' => [
            'getTopArtists' => Mappers\Chart\TopArtists::class,
            'getTopTags' => Mappers\Chart\TopTags::class,
            'getTopTracks' => Mappers\Chart\TopTracks::class,
        ],
        'geo' => [
            'getTopArtists' => Mappers\Geo\TopArtists::class,
            'getTopTracks' => Mappers\Geo\TopTracks::class,
        ],
        'tag' => [
            'getInfo' => Mappers\Tag\Info::class,
            'getSimilar' => Mappers\Tag\Similar::class,
            'getTopAlbums' => Mappers\Tag\TopAlbums::class,
            'getTopArtists' => Mappers\Tag\TopArtists::class,
            'getTopTags' => Mappers\Tag\TopTags::class,
            'getTopTracks' => Mappers\Tag\TopTracks::class,
        ],
        'track' => [
            'getCorrection' => Mappers\Track\Correction::class,
            'getInfo' => Mappers\Track\Info::class,
            'getSimilar' => Mappers\Track\Similar::class,
            'getTopTags' => Mappers\Track\TopTags::class,
            'search' => Mappers\Track\Search::class,
        ],
    ];

    /** @var string */
    private $apiKey;

    /** @var Client */
    private $client;

    /** @var string|null */
    private $method;

    /** @var array */
    private $parameters;

    /**
     * Request constructor.
     * @param string $apiKey
     * @param Client $client
     * @param string $method
     * @param array $parameters
     */
    public function __construct(string $apiKey, Client $client, string $method, array $parameters)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
        $this->method = $method;
        $this->parameters = $parameters;
    }

    /**
     * @return JsonMapper
     * @throws Exceptions\InvalidArgument
     * @throws Exceptions\InvalidMapper
     * @throws Exceptions\InvalidResponse
     */
    public function get(): JsonMapper
    {
        if (null === $this->method) {
            throw new Exceptions\InvalidArgument('Method not found');
        }

        [$group, $method] = explode('.', $this->method);

        if (!array_key_exists($group, self::MAPPERS)) {
            throw new Exceptions\InvalidArgument("Mappers group for {$group} not found");
        }

        if (!array_key_exists($method, self::MAPPERS[$group])) {
            throw new Exceptions\InvalidArgument("Mapper {$method} for group {$group} not found");
        }

        /** @var JsonMapper $mapper */
        $mapper = self::MAPPERS[$group][$method];

        if (!class_exists($mapper)) {
            throw new Exceptions\InvalidMapper("Mapper for {$this->method} not found");
        }

        $result = new $mapper($this->getJsonResponse(), Collection::class);
        if (!$result instanceof JsonMapper) {
            throw new Exceptions\InvalidMapper('Mapper must be instance of '.JsonMapper::class);
        }

        return $result;
    }

    /**
     * @return array
     * @throws Exceptions\InvalidResponse
     */
    private function getJsonResponse(): array
    {
        try {
            $response = $this->client->get(self::URL, [
                'query' => array_merge($this->parameters, [
                    'method' => $this->method,
                    'api_key' => $this->apiKey,
                    'format' => 'json',
                ])
            ]);
        } catch (Throwable $throwable) {
            throw new Exceptions\InvalidResponse("Error request to {$this->method}: {$throwable->getMessage()}");
        }


        $data = json_decode($response->getBody()->getContents(), true);
        if (!is_array($data)) {
            throw new Exceptions\InvalidResponse("Error request from {$this->method}: {$response->getBody()->getContents()}");
        }

        if (array_key_exists('error', $data) && (int) $data['error'] > 0) {
            $message = $data['message'] ?? 'Error response from api';
            $code = $data['error'] ?? 0;
            throw new Exceptions\InvalidResponse("{$message}, code: {$code}");
        }

        return $data;
    }

}
