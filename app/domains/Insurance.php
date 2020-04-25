<?php
namespace App\Domain;

use App\Domain\Collection\PriceCollection;
use App\Domain\Collection\ProviderCollection;

class Insurance
{
    /**
     * get quotes from the provider collection set on the instance
     * @param  ProviderCollection $providers providers to be quoted
     * @return PriceCollection[] a list of PriceCollections
     */
    public function quote(ProviderCollection $providers):array
    {
        $quote = [];

        foreach ($providers as $provider) {
            $prices = new PriceCollection();
            $providerPrices  = $provider->getPrices();

            foreach ($providerPrices as $price) {
                $prices->add((float) $price);
            }

            $quote[$provider->getName()] = $prices;
        }

        return $quote;
    }
}
