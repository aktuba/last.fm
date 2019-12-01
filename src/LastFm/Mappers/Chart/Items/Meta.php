<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Chart\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Meta
 * @package aktuba\LastFm\Mappers\Chart\Items
 *
 * @property int $page
 * @property int $perPage
 * @property int $totalPages
 * @property int $total
 */
class Meta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'page' => 'int',
        'perPage' => 'int',
        'totalPages' => 'int',
        'total' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'page',
        'perPage',
        'totalPages',
        'total',
    ];

}
