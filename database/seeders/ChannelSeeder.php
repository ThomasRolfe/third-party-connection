<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\ChannelIntegration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $integrations = ChannelIntegration::where('name', 'woocommerce')->get();

        foreach($integrations as $integration){
            Channel::create([
                'name' => fake()->company(),
                'channel_integration_id' => $integration->id,
                'user_id' => User::first()->id
            ]);

            Channel::create([
                'name' => fake()->company(),
                'channel_integration_id' => $integration->id,
                'user_id' => User::first()->id
            ]);
        }
    }
}
