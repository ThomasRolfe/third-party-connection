<?php

namespace App\Services\Orders;

use App\Models\Channel;
use App\Models\Order;
use App\Services\Factories\ThirdPartyActionFactory;
use App\Services\Factories\ThirdPartyTransformerFactory;

class OrderImportService
{
    public function importOrders()
    {
        // Get all channels (probably reduce that to a specific user if multiple companies in one system)
        $channels = Channel::all();

        foreach ($channels as $channel) {
            $this->importChannelOrders($channel);
        }
    }

    public function importChannelOrders(Channel $channel)
    {
        // For this channel, get the connection config
        $connectionConfig = $channel->connectionConfig;
        $orderFetchService = ThirdPartyActionFactory::createGetOrdersService($channel, $connectionConfig);
        $inboundOrderTransformer = ThirdPartyTransformerFactory::createInboundOrderTransformer($channel);

        try {
            $orders = $orderFetchService->execute();
            foreach($orders as $order) {
                $transformedOrder = $inboundOrderTransformer->execute($order);
                // Would probably hand this off to another service to decide if its insert/update/log an error etc...
                Order::create($transformedOrder);
            }
        } catch (\Exception $e) {
            // do some proper error handling...
        }
    }
}
