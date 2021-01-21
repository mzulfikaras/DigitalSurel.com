<?php

namespace App\Repositories\Checkout;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class CheckoutRepository{

    public function cartRequest(){
        $carts = Cart::where('user_id', Auth::user()->id);

        return $carts->get();
    }

}
