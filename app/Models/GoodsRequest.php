<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsRequest extends Model
{
    use HasFactory;

    protected $table = 'goods_requests';

    public function goods()
    {
        return $this->belongsToMany(Good::class, 'requested_goods', 'goods_request_id', 'good_id');
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class, 'request_type_id');
    }
}
