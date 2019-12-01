<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Tag;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Wiki;

/**
 * Class Info
 * @package aktuba\LastFm\Mappers\Tag
 *
 * @property string $name
 * @property int $total
 * @property int $reach
 * @property Wiki $wiki
 */
class Info extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'name' => 'string',
        'total' => 'int',
        'reach' => 'int',
        'wiki' => 'Wiki',
    ];

    /** @var array */
    protected const REQUIRED = [
        'name',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['tag'] ?? [];
    }

}
