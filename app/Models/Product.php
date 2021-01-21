<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];

    public function cart(){
        return $this->hasMany('App\Models\Cart','product_id','id');
    }

    public function invoice(){
        return $this->hasMany('App\Models\Invoice', 'product_id', 'id');
    }
}
