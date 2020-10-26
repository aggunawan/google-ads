<?php

namespace Aggunawan\GoogleAds\Account;

use Aggunawan\GoogleAds\GoogleAdsClient;

class AccessibleAccount
{

    /**
     * Constructed Google Ads Client build from
     * given credentials
     * 
     * @var \Aggunawan\GoogleAds\GoogleAdsClient
     */
    protected $client;

    /**
     * Build this class
     * 
     */
    public function __construct()
    {
        $this->client = app(GoogleAdsClient::class)->getClient();
    }

    /**
     * Get list of Accessible Google Ads account resource name
     * 
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $accounts = collect();
        $customerServiceClient = $this->client->getCustomerServiceClient();
        $accessibleCustomers = $customerServiceClient->listAccessibleCustomers();

        foreach ($accessibleCustomers->getResourceNames() as $resourceName) {
            $accounts->push($resourceName);
        }

        return $accounts;
    }

    /**
     * Get Account Information based on given resource name
     * 
     * @param  string $resourceName
     * @return \Illuminate\Support\Collection
     */
    public function show(string $resourceName)
    {
        $customerServiceClient = $this->client->getCustomerServiceClient();
        $customer = $customerServiceClient->getCustomer($resourceName);
        $account = collect();

        $account->put('name', $customer->getDescriptiveName());

        return $account;
    }

}