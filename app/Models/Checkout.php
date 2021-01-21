<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $guarded = [];

    public function invoice(){
        return $this->hasMany('App\Models\Invoice', 'checkout_id', 'id');
    }
}
