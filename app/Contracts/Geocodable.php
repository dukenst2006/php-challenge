<?php

namespace App\Contracts;

use App\Models\Customer;

interface Geocodable
{
    /**
     *
     * @return string
     */
    public function getAddressString(): string;

    /**
     * @param array $attributes
     * @return bool
     */
    public function setCoordinates($latitude, $longitude): bool;
}
