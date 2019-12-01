<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Artist\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Bio
 * @package aktuba\LastFm\Mappers\Artist\Items
 *
 * @property string $published
 * @property string $summary
 * @property string $content
 */
class Bio extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'published' => 'string',
        'summary' => 'string',
        'content' => 'string',
    ];

    /** @var array */
    protected const REQUIRED = [
        'published',
        'summary',
        'content',
    ];

}
