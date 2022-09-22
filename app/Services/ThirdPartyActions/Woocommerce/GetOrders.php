<?php

namespace App\Services\ThirdPartyActions\Woocommerce;

use Exception;

class GetOrders extends WoocommerceAction
{
    const ENDPOINT = '/orders';

    public function execute(): array
    {
        $response = $this->connection->get(self::ENDPOINT);

        if($response->failed()) {
            throw new Exception('Client error ' . $response->body(), $response->status());
        }

        return $response->json();
    }
}
