<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Album\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Meta
 * @package aktuba\LastFm\Mappers\Album\Items
 *
 * @property string $artist
 * @property string $album
 */
class Meta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'artist' => 'string',
        'album' => 'string',
    ];

    /** @var array */
    protected const REQUIRED = [
        'artist',
        'album',
    ];

}
