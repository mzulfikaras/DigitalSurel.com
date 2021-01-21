<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
    ];


    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }

    public function checkout(){
        return $this->belongsTo('App\Models\Checkout', 'checkout_id', 'id');
    }
}
