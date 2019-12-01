<?php declare(strict_types=1);

namespace aktuba\LastFm\Traits;

use League\ISO3166\ISO3166;
use League\ISO3166\Exception\OutOfBoundsException;
use aktuba\LastFm\Exceptions\InvalidArgument;

/**
 * Trait Country
 * @package aktuba\Larafm\Traits
 */
trait Country
{

    /**
     * @param string|int $country
     * @return string|null
     * @throws InvalidArgument
     */
    private function getCountryName($country): ?string
    {
        $data = [];
        $iso3166 = new ISO3166();
        try {

            if (is_string($country)) {
                $length = mb_strlen((string) $country);
                if ($length > 3) {
                    $data = $iso3166->name($country);
                } elseif ($length > 2) {
                    $data = $iso3166->alpha3($country);
                } elseif ($length > 1) {
                    $data = $iso3166->alpha2($country);
                }
            } elseif (is_numeric($country)) {
                $data = $iso3166->numeric($country);
            }

        } catch (OutOfBoundsException $exception) {
            throw new InvalidArgument("Country {$country} not found");
        }

        return $data['name'] ?? null;
    }

}
