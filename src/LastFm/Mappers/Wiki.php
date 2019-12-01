<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Wiki
 * @package aktuba\LastFm\Mapperså
 *
 * @property string $published
 * @property string $summary
 * @property string $content
 */
class Wiki extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'published' => 'string',
        'summary' => 'string',
        'content' => 'string',
    ];

}
