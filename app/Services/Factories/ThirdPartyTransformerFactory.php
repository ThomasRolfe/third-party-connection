<?php

namespace App\Services\Factories;

use App\Models\Channel;
use App\Services\ThirdPartyTransformers\Woocommerce;
use Exception;
use Illuminate\Support\Facades\App;

class ThirdPartyTransformerFactory
{
    public static function createInboundOrderTransformer(Channel $channel)
    {
        switch($channel->name) {
            case 'woocommerce':
                return App::make(Woocommerce\TransformOrderInbound::class);
            default:
                throw new Exception('Invalid channel');
        }
    }
}
