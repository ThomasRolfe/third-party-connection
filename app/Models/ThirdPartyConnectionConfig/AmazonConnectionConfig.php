<?php

namespace App\Models\ThirdPartyConnectionConfig;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazonConnectionConfig extends Model
{
    use HasFactory;

    protected $table = 'amazon_connection_config';

    protected $guarded = [];

    protected $casts = [
        'username' => 'encrypted',
        'password' => 'encrypted'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
