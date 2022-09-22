<?php

namespace Database\Seeders;

use App\Models\ChannelIntegration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelIntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channelIntegrations = [
            [
                'name' => 'woocommerce',
                'display_name' => 'Woocommerce',
            ],
            [
                'name' => 'amazon',
                'display_name' => 'Amazon',
            ],
            [
                'name' => 'shopify',
                'display_name' => 'Shopify',
            ],
        ];

        foreach($channelIntegrations as $channelIntegration) {
            ChannelIntegration::create($channelIntegration);
        }
    }
}
