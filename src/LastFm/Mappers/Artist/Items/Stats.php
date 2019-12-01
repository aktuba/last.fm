<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Artist\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Stats
 * @package aktuba\LastFm\Mappers\Artist\Items
 *
 * @property int $listeners
 * @property int $playcount
 */
class Stats extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'listeners' => 'int',
        'playcount' => 'int',
    ];

}
