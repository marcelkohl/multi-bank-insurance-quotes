<?php
namespace App\Domain\Collection;

use App\Domain\Provider\InsuranceProviderInterface;

class ProviderCollection extends BaseCollection
{
    /**
     * adds an item into the collection
     *
     * @param InsuranceProviderInterface   $provider object to be added to the collection
     * @param mixed   $key      optional key as index
     */
    public function add($provider, $key = null)
    {
        if ($provider instanceof InsuranceProviderInterface) {
            parent::add($provider, $key);
        }
    }
}
