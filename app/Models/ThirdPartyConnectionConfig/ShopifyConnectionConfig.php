<?php

namespace App\Models\ThirdPartyConnectionConfig;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopifyConnectionConfig extends Model
{
    use HasFactory;

    protected $table = 'shopify_connection_config';

    protected $guarded = [];

    protected $casts = [
        'key' => 'encrypted',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
