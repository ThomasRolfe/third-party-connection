<?php

namespace App\Services\Factories;

use App\Interfaces\ConnectionConfig;
use App\Models\Channel;
use App\Services\ThirdPartyActions\ThirdPartyAction;
use App\Services\ThirdPartyActions\Woocommerce\GetOrders;
use Exception;
use Illuminate\Support\Facades\App;

class ThirdPartyActionFactory
{
    public static function createGetOrdersService(
        Channel $channel,
        ConnectionConfig $connectionConfig
    ): ThirdPartyAction
    {
        switch($channel->name) {
            case 'woocommerce':
                return App::makeWith(GetOrders::class, ['connectionConfig' => $connectionConfig]);
            default:
                throw new Exception('Invalid channel');
        }
    }
}
