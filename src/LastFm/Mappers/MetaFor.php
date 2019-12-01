<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class MetaFor
 * @package aktuba\LastFm\Mappers
 *
 * @property string $for
 */
class MetaFor extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'for' => 'string',
    ];

}
