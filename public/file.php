<?php
use App\Domain\Insurance;
use App\Domain\Collection\ProviderCollection;
use App\Domain\Provider\BankProvider;
use App\Domain\Provider\InsuranceCompanyProvider;

require __DIR__ . '/../vendor/autoload.php';

$providerCollection = new ProviderCollection([
    new BankProvider(),
    new InsuranceCompanyProvider(3),
]);

$insurance = new Insurance($providerCollection);
var_export($insurance->quote());
?>
