<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Tag
 * @package aktuba\LastFm\Mappers
 *
 * @property string $name
 * @property string $url
 * @property int $count
 * @property int $reach
 * @property int $taggings
 */
class Tag extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'name' => 'string',
        'url' => 'string',
        'count' => 'int',
        'reach' => 'int',
        'taggings' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
    ];

}
