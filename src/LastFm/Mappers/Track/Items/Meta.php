<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Meta
 * @package aktuba\LastFm\Mappers\Track\Items
 *
 * @property string $artist
 * @property string $track
 */
class Meta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'artist' => 'string',
        'track' => 'string',
    ];

    /** @var array */
    protected const REQUIRED = [
        'artist',
    ];

}
