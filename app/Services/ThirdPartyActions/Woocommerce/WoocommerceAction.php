<?php

namespace App\Services\ThirdPartyActions\Woocommerce;

use App\Models\ThirdPartyConnectionConfig\WoocommerceConnectionConfig;
use App\Services\ThirdPartyActions\ThirdPartyAction;
use App\Services\ThirdPartyConnection\WoocommerceConnection;
use Illuminate\Support\Facades\App;

abstract class WoocommerceAction implements ThirdPartyAction
{
    protected WoocommerceConnection $connection;

    public function __construct(
        protected WoocommerceConnectionConfig $connectionConfig
    ){
        $this->connection = App::makeWith(
            WoocommerceConnection::class,
            ['connectionConfig' => $connectionConfig]
        );
    }
}
