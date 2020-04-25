<?php

use App\Domain\Collection\PriceCollection;
use App\Domain\Provider\BankProvider;
use PHPUnit\Framework\TestCase;

class BankProviderTest extends TestCase
{
    public function testGetName()
    {
        $bankProvider = new BankProvider();

        $this->assertEquals(
            "bank",
            $bankProvider->getName(),
            "price collecition instance MUST be instantiated on new"
        );
    }

    public function testPricesStringToArray()
    {
        $bankProvider = new BankProvider();
        $stringToTest = "3,150".PHP_EOL."6,200".PHP_EOL."12,300";

        $class = new \ReflectionClass($bankProvider);
        $method = $class->getMethod('pricesStringToArray');
        $method->setAccessible(true);

        $prices = $method->invokeArgs($bankProvider, [$stringToTest]);

        $this->assertIsArray(
            $prices,
            "prices as array MUST be an array"
        );

        $this->assertCount(
            3,
            $prices,
            "list of converted prices MUST be 3"
        );
    }

    public function testGetPrices()
    {
        $bankProvider = new BankProvider();
        $prices = $bankProvider->getPrices();

        $this->assertInstanceOf(
            PriceCollection::class,
            $prices,
            "price collecition instance MUST be instantiated on getPrices"
        );

        $this->assertGreaterThan(
            0,
            $prices->length(),
            "list of prices MUST be greater than zero"
        );
    }
}
?>
