<?php
namespace App\Domain\Provider;

use App\Domain\Collection\PriceCollection;

interface InsuranceProviderInterface
{
    /**
     * get a list of prices from the provider
     * @return PriceCollection
     */
    public function getPrices():PriceCollection;

    /**
     * name of the provider for listing identification
     * @return string
     */
    public function getName():string;
}
