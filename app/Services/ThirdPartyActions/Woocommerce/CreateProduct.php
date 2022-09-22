<?php

namespace App\Services\ThirdPartyActions\Woocommerce;

use Exception;

class CreateProduct extends WoocommerceAction
{
    const ENDPOINT = '/products';

    public function execute(array $productData): array
    {
        $response = $this->connection->post(self::ENDPOINT, $productData);

        if($response->failed()) {
            throw new Exception('Client error ' . $response->body(), $response->status());
        }

        return $response->json();
    }
}
