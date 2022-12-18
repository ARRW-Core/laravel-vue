<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $table = 'goods';

    protected $primaryKey = 'item_id';

    public function goodsRequests()
    {
        return $this->belongsToMany(GoodsRequest::class, 'requested_goods', 'good_id', 'goods_request_id');
    }

}
