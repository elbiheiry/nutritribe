<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
