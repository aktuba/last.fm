<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Artist\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Meta
 * @package aktuba\LastFm\Mappers\Artist\Items
 *
 * @property string $artist
 */
class Meta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'artist' => 'string',
        'page' => 'int',
        'perPage' => 'int',
        'totalPages' => 'int',
        'total' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'artist',
    ];

}
