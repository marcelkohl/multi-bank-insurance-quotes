<?php
namespace App\Domain\Collection;

class PriceCollection extends BaseCollection
{
    /**
     * adds an item into the collection
     *
     * @param float   $price    object to be added to the collection
     * @param mixed   $key            optional key as index
     */
    public function add($price, $key = null)
    {
        parent::add((float) $price, $key);
    }
}
