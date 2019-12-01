<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class Image
 * @package aktuba\LastFm\Mappers
 *
 * @property string $url
 * @property string $size
 */
class Image extends JsonMapper
{

    protected const PROPERTIES = [
        'url' => 'string',
        'size' => 'string',
    ];

    protected const ALIASES = [
        'url' => '#text',
    ];

    protected const REQUIRED = [
        '#text',
        'size',
    ];

}
