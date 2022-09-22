<?php

namespace App\Models;

use App\Models\ThirdPartyConnectionConfig\AmazonConnectionConfig;
use App\Models\ThirdPartyConnectionConfig\ShopifyConnectionConfig;
use App\Models\ThirdPartyConnectionConfig\WoocommerceConnectionConfig;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channelIntegration()
    {
        return $this->belongsTo(ChannelIntegration::class, 'channel_integration_id');
    }

    public function connectionConfig()
    {
        switch($this->channelIntegration->name) {
            case 'woocommerce':
                return $this->hasOne(WoocommerceConnectionConfig::class);
            case 'amazon':
                return $this->hasOne(AmazonConnectionConfig::class);
            case 'shopify':
                return $this->hasOne(ShopifyConnectionConfig::class);
            default:
                return null;
        }
    }
}
