<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public function getIndex()
    {
        return $this->belongsTo(Order::class , 'order_id');
    }
}
