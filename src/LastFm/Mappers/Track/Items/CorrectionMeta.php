<?php declare(strict_types=1);

namespace aktuba\LastFm\Mappers\Track\Items;

use aktuba\JsonMapper\JsonMapper;

/**
 * Class CorrectionMeta
 * @package aktuba\LastFm\Mappers\Track\Items
 *
 * @property int $index
 * @property bool $artistcorrected
 * @property bool $trackcorrected
 */
class CorrectionMeta extends JsonMapper
{

    /** @var array */
    protected const PROPERTIES = [
        'index' => 'int',
        'isArtistCorrected' => 'bool',
        'isTrackCorrected' => 'bool',
    ];

    /** @var array */
    protected const ALIASES = [
        'isArtistCorrected' => 'artistcorrected',
        'isTrackCorrected' => 'trackcorrected',
    ];

}
