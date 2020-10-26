<?php

namespace Aggunawan\GoogleAds;

use Illuminate\Support\ServiceProvider;

class GoogleAdsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoogleAdsClient::class, function ($app) {
            return new GoogleAdsClient(config('services.googleads'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
