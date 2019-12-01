<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class TopTagsMeta
 * @package aktuba\LastFm\Mappers\Tag\Items
 *
 * @property int $offset
 * @property int $num_res
 * @property int $total
 */
class TopTagsMeta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'offset' => 'int',
        'num_res' => 'int',
        'total' => 'int',
    ];

}
