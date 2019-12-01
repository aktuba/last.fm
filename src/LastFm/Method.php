<?php declare(strict_types=1);

namespace aktuba\LastFm;

use GuzzleHttp\Client;

abstract class Method
{

    /** @var string */
    private $apiKey;

    /** @var Client */
    private $client;

    /**
     * Method constructor.
     * @param string $apiKey
     * @param Client $client
     */
    public function __construct(string $apiKey, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return Request
     */
    protected function getRequest(string $method, array $parameters): Request
    {
        return new Request($this->apiKey, $this->client, $method, $parameters);
    }

}
