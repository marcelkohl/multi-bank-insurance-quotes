<?php

use App\Domain\Collection\PriceCollection;
use App\Domain\Provider\InsuranceCompanyProvider;
use PHPUnit\Framework\TestCase;

class InsuranceCompanyProviderTest extends TestCase
{
    public function testGetName()
    {
        $insuranceProvider = new InsuranceCompanyProvider(1);

        $this->assertEquals(
            "insurance-company",
            $insuranceProvider->getName(),
            "price collecition instance MUST be instantiated on new"
        );
    }

    public function testPricesObjectToArray()
    {
        $insuranceProvider = new InsuranceCompanyProvider(3);
        $objectToTest = json_decode('[{"month": 3, "price": 100}]', true);

        $class = new \ReflectionClass($insuranceProvider);
        $method = $class->getMethod('pricesObjectToArray');
        $method->setAccessible(true);

        $prices = $method->invokeArgs($insuranceProvider, [$objectToTest]);

        $this->assertIsArray(
            $prices,
            "prices as array MUST be an array"
        );
    }

    public function testGetPrices()
    {
        $insuranceProvider = new InsuranceCompanyProvider(3);
        $prices = $insuranceProvider->getPrices();

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
