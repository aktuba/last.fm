<?php declare(strict_types=1);

namespace aktuba\LastFm;

use GuzzleHttp\Client;
use aktuba\LastFm\Methods;
use aktuba\LastFm\Exceptions\NotImplemented;

/**
 * Class LastFm
 * @package aktuba\LastFm
 *
 * @method Methods\Geo geo()
 * @method Methods\Album album()
 * @method Methods\Artist artist()
 * @method Methods\Chart chart()
 * @method Methods\Tag tag()
 * @method Methods\Track track()
 */
class LastFm
{

    /** @var string */
    private $apiKey;

    /** @var Client */
    private $client;

    /** @var array */
    private $methods = [];

    /**
     * LastFm constructor.
     * @param string $apiKey
     * @param array $guzzleOptions
     */
    public function __construct(string $apiKey, array $guzzleOptions = [])
    {
        $this->apiKey = $apiKey;
        $this->client = new Client($guzzleOptions);
    }

    /**
     * @param string $name
     * @param mixed $arguments
     * @return mixed
     * @throws NotImplemented
     */
    public function __call(string $name, $arguments)
    {
        $className = mb_strtoupper(mb_substr($name, 0, 1)).mb_substr($name, 1);
        $className = __NAMESPACE__ . "\\Methods\\{$className}";

        if (!array_key_exists($className, $this->methods)) {
            if (!class_exists($className)) {
                throw new NotImplemented("Method {$name} not implemented");
            }
            $this->methods[$className] = new $className($this->apiKey, $this->client);
        }

        return $this->methods[$className];
    }

}
