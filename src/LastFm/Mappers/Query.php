<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Query
 * @package aktuba\LastFm\Mappers
 *
 * @property string $query
 * @property int $total
 * @property int $startIndex
 * @property int $page
 * @property int $perPage
 */
class Query extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'query' => 'string',
        'total' => 'int',
        'startIndex' => 'int',
        'page' => 'int',
        'perPage' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'query',
        'total',
        'startIndex',
        'page',
        'perPage',
    ];

}
