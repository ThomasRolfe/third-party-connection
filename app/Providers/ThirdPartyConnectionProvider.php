<?php

namespace App\Providers;

use App\Services\Api\ConnectionStrategies\ApiStrategy;
use App\Services\Api\ConnectionStrategies\RestApiStrategy;
use App\Services\ThirdPartyConnection\WoocommerceConnection;
use Illuminate\Support\ServiceProvider;

class ThirdPartyConnectionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
