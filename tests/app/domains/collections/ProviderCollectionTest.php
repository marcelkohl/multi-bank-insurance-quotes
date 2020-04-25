<?php

use App\Domain\Collection\ProviderCollection;
use App\Domain\Provider\DummyProvider;

use PHPUnit\Framework\TestCase;

class ProviderCollectionTest extends TestCase
{
    public function testInstance()
    {
        $providerCollection = new ProviderCollection();

        $this->assertInstanceOf(
            ProviderCollection::class,
            $providerCollection,
            "provider collecition instance MUST be instantiated on new"
        );
    }

    public function testAdd()
    {
        $provider = new DummyProvider();
        $providerCollection = new ProviderCollection();

        $providerCollection->add($provider);

        $this->assertCount(
            1,
            $providerCollection,
            "provider collecition MUST have the added providers"
        );
    }
}
?>
