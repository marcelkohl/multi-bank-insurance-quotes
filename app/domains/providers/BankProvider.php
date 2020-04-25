<?php
namespace App\Domain\Provider;

use App\Domain\Collection\PriceCollection;

class BankProvider implements InsuranceProviderInterface
{
    /** @var string */
    private $name = "bank";
    /** @var string */
    private $bankUrl = "http://demo9084693.mockable.io/bank";

    /**
     * get a list of prices from the provider
     * @return PriceCollection
     */
    public function getPrices():PriceCollection
    {
        $prices = new PriceCollection();
        $serverPrices = $this->getServerPrices();

        foreach ($serverPrices as $price) {
            $prices->add((float) $price);
        }

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

    /**
     * get prices from the server
     * @return string[] a list of the values returned
     */
    public function getServerPrices():array
    {
        $serverContent = file_get_contents($this->bankUrl);

        if ($serverContent !== false) {
            return $this->pricesStringToArray($serverContent);
        } else {
            return [];
        }
    }

    /**
     * converts a group of prices as string into an array
     * @param  string $pricesAsString the prices string to be converted
     * @return float[]
     */
    private function pricesStringToArray(string $pricesAsString):array
    {
        $asArray = explode(PHP_EOL, $pricesAsString);
        $values = array_map(
            function($value){
                return (float) $value;
            },
            $asArray
        );

        return array_filter($values, function ($value) { return $value > 0; });
    }
}
