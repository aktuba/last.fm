<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track;

use aktuba\JsonMapper\JsonMapper;
use aktuba\LastFm\Mappers\Track;

/**
 * Class Correction
 * @package aktuba\LastFm\Mappers\Track
 *
 * @property Track $track
 * @property Items\CorrectionMeta $meta
 */
class Correction extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'track' => 'Track',
        'meta' => 'Items\CorrectionMeta',
    ];

    /** @var array */
    protected const ALIASES = [
        'meta' => '@attr',
    ];

    /** @var array */
    protected const REQUIRED = [
        'track',
        '@attr',
    ];

    /**
     * @param  array  $jsonData
     * @return array
     */
    protected function formatJson(array $jsonData): array
    {
        return $jsonData['corrections']['correction'] ?? [];
    }

}
