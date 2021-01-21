<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }
}
