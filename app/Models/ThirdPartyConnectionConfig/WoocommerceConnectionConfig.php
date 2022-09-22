<?php

namespace App\Models\ThirdPartyConnectionConfig;

use App\Interfaces\ConnectionConfig;
use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoocommerceConnectionConfig extends Model implements ConnectionConfig
{
    use HasFactory;

    protected $table = 'woocommerce_connection_config';

    protected $guarded = [];

    protected $casts = [
        'access_key' => 'encrypted',
        'secret' => 'encrypted',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
