<?php

namespace Aggunawan\GoogleAds\Account;

use Aggunawan\GoogleAds\GoogleAdsClient;

class AccessibleAccount
{

    protected $client;

    public function __construct()
    {
        $this->client = app(GoogleAdsClient::class)->getClient();
    }

    public function index()
    {
        $accounts = collect();
        $customerServiceClient = $this->client->getCustomerServiceClient();
        $accessibleCustomers = $customerServiceClient->listAccessibleCustomers();

        foreach ($accessibleCustomers->getResourceNames() as $resourceName) {
            $accounts->push(collect(['resource_name' => $resourceName]));
        }

        return $accounts;
    }

}