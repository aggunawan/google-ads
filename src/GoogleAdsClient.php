<?php

namespace Aggunawan\GoogleAds;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V5\GoogleAdsClientBuilder;

class GoogleAdsClient
{

    private $oauthToken;
    private $client;

    public function __construct(array $config)
    {
        $config = collect($config);

        $this->oauthToken = (new OAuth2TokenBuilder)
            ->withClientId($config->get('client_id'))
            ->withClientSecret($config->get('client_secret'))
            ->withRefreshToken($config->get('refresh_token'))
            ->build();

        $this->client = (new GoogleAdsClientBuilder)
            ->withDeveloperToken($config->get('developer_token'))
            ->withLoginCustomerId($config->get('manager_id'))
            ->withOAuth2Credential($this->oauthToken)
            ->build();

    }

    public function getOauthClient()
    {
        return $this->oauthToken;
    }

    public function getClient()
    {
        return $this->client;
    }
    
}