<?php

namespace App\Services\ThirdPartyTransformers\Woocommerce;

use App\Models\Order;

class TransformOrderInbound
{
    public function execute(array $woocommerceOrderRow): Order
    {
        // Do some array mapping magic to turn woo api data into the format of a local order (more generic)
        // Maybe also produce some kind of meta object that can be used to store non standard info separate to a generic order
        // Only create the object in memory, hand this off to another function which decides to insert/update/fall over
        return new Order();
    }
}
