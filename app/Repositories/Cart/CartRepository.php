<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartRepository{

    public function cart(){

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id);
        } else {
            $cart = Cart::with([]);
        }

        return $cart->get();
    }

    public function productId($request){
        return Cart::where('product_id', $request->id)->first();
    }

    public function cartId($id){
        return Cart::with([])->find($id);
    }


    public function storeCart($request,$id){

        $result = [
            'status' => false,
            'message' => ''
        ];

        try {
            $product = Product::find($id);

            $cart = new Cart();

            $cart->user_id = Auth::user()->id;
            $cart->product_id = $product->id;
            $cart->qty = 1;
            $cart->save();

            $result['status'] = true;
            $result['message'] = "Cart Berhasil Ditambahkan";
            return $result;
        } catch (\Throwable $th) {
            $result['message'] = "Function Store Cart Error => " . $th->getMessage();
            return $result;
        }

    }


    public function deleteCart($id){
        $cart = $this->cartId($id);

        $result = [
            'status' => false,
            'message' => ''
        ];

        try {

            $cart->delete();

            $result['status'] = true;
            $result['message'] = 'Barang berhasil dihapus';

        } catch (\Throwable $th) {

            $result['message'] = 'Function Delete Error =>' . $th->getMessage();
        }
    }
}
