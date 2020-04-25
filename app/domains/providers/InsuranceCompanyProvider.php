<?php
namespace App\Domain\Provider;

use App\Domain\Collection\PriceCollection;

class InsuranceCompanyProvider implements InsuranceProviderInterface
{
    /** @var int */
    private $monthIndex;
    /** @var string */
    private $name = "insurance-company";
    /** @var string */
    private $requestUrl = "http://demo9084693.mockable.io/insurance"; //working result "http://demo9903621.mockable.io/";

    /**
     * constructor
     * @param int $monthIndex month index to be used as a reference on the prices
     */
    public function __construct(int $monthIndex)
    {
        $this->monthIndex = $monthIndex;
    }

    /**
     * get a list of prices from the provider
     * @return PriceCollection
     */
    public function getPrices():PriceCollection
    {
        $prices = new PriceCollection();
        $serverPrices = $this->getPricesFromServer();

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
     * converts a group of prices objects from server into an array
     * @param  mixed[] $prices the prices objects to be converted
     * @return float[]
     */
    private function pricesObjectToArray(array $prices):array
    {
        $values = array_map(
            function($item){
                return (float) $item["price"];
            },
            $prices
        );

        return array_filter($values, function ($value) { return $value > 0; });
    }

    /**
     * make the request to the server using specific settings
     * @return array
     */
    private function getPricesFromServer():array
    {
        $curl = curl_init($this->requestUrl);
        curl_setopt_array($curl, [
            CURLOPT_POSTFIELDS => ['month' => $this->monthIndex],
            CURLOPT_HTTPHEADER => ['Content-Type:application/json'],
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $prices = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if (is_array($prices)) {
            return $this->pricesObjectToArray($prices);
        } else {
            return [];
        }
    }
}
