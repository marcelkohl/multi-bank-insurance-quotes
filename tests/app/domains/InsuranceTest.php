<?php

use App\Domain\Collection\ProviderCollection;
use App\Domain\Insurance;
use App\Domain\Provider\DummyProvider;
use PHPUnit\Framework\TestCase;

class InsuranceTest extends TestCase
{
    public function testInstance()
    {
        $providerCollection = new ProviderCollection();
        $providerCollection->add(new DummyProvider());

        $insurance = new Insurance();

        $this->assertInstanceOf(
            Insurance::class,
            $insurance,
            "insurance instance MUST be instantiated on new"
        );

        $this->assertNotEmpty(
            $insurance->quote($providerCollection),
            "result for quote MUST NOT be empty"
        );
    }

    public function testQuote()
    {
        $providerCollection = new ProviderCollection();
        $providerCollection->add(new DummyProvider());

        $insurance = new Insurance();
        $quote = $insurance->quote($providerCollection);

        $this->assertIsArray(
            $quote,
            "insurance quote result MUST be an array"
        );

        $this->assertNotEmpty(
            $quote,
            "insurance quote MUST NOT be empty"
        );

        $this->assertNotEmpty(
            $quote['dummy'],
            "insurance quote index MUST NOT be empty"
        );
    }
}
?>
