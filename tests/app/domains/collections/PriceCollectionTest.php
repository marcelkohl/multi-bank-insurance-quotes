<?php

use App\Domain\Collection\PriceCollection;
use PHPUnit\Framework\TestCase;

class PriceCollectionTest extends TestCase
{
    public function testInstance()
    {
        $priceCollection = new PriceCollection();

        $this->assertInstanceOf(
            PriceCollection::class,
            $priceCollection,
            "price collecition instance MUST be instantiated on new"
        );
    }

    public function testAdd()
    {
        $priceCollection = new PriceCollection();
        $priceCollection->add(2.12);

        $this->assertCount(
            1,
            $priceCollection,
            "price collecition MUST have the added prices"
        );
    }
}
?>
