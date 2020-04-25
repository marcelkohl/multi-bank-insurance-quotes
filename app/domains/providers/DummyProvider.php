<?php
namespace App\Domain\Provider;

use App\Domain\Collection\PriceCollection;

/**
 * dummy provider to prove provider's concepts before using the real providers
 */
class DummyProvider implements InsuranceProviderInterface
{
    /** @var string */
    private $name = "dummy";

    /**
     * get a list of prices from the provider
     * @return PriceCollection
     */
    public function getPrices():PriceCollection
    {
        $prices = new PriceCollection();

        $prices->add(0);
        $prices->add(0.33);
        $prices->add(1);
        $prices->add(1.1);
        $prices->add(1.01);
        $prices->add(9999.9);

        return $prices;
    }

    /**
     * name of the provider for listing identification
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }
}
