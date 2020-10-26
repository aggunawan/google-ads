<?php

namespace Aggunawan\GoogleAds;

use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;
use Google\Ads\GoogleAds\Lib\V5\GoogleAdsClientBuilder;

class GoogleAdsClient
{

    /**
     * Constructed Google OAuth 2 object
     * 
     * @var \Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder
     */
    private $oauthToken;

    /**
     * Constructed Google Ads Client object
     * 
     * @var \Google\Ads\GoogleAds\Lib\V5\GoogleAdsClientBuilder
     */
    private $client;

    /**
     * Build this class
     * 
     * @param array $config
     */
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

    /**
     * Get crafted OAuth object
     * 
     * @return \Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder
     */
    public function getOauthClient()
    {
        return $this->oauthToken;
    }

    /**
     * Get crafted Google Ads Client object
     * 
     * @return \Google\Ads\GoogleAds\Lib\V5\GoogleAdsClientBuilder
     */
    public function getClient()
    {
        return $this->client;
    }
    
}