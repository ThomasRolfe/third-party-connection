<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\ThirdPartyConnectionConfig\WoocommerceConnectionConfig;
use Illuminate\Database\Seeder;

class ConnectionConfigSeeder extends Seeder
{
    public function run()
    {
        $channels = Channel::whereHas('channelIntegration', function($query) {
            $query->where('name', 'woocommerce');
        })->get();

        foreach($channels as $channel) {
            WoocommerceConnectionConfig::create([
                'uri' => fake()->url(),
                'access_key' => fake()->uuid(),
                'secret' => fake()->uuid(),
                'channel_id' => $channel->id
            ]);
        }
    }
}
