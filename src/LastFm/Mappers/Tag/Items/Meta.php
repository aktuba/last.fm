<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Meta
 * @package aktuba\LastFm\Mappers\Tag\Items
 *
 * @property string $tag
 * @property int $page
 * @property int $perPage
 * @property int $totalPages
 * @property int $total
 */
class Meta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'tag' => 'string',
        'page' => 'int',
        'perPage' => 'int',
        'totalPages' => 'int',
        'total' => 'int',
    ];

    /** @var array */
    protected const REQUIRED = [
        'tag',
    ];

}
