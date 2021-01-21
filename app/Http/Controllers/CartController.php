<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\Repositories\Cart\CartRepository;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->middleware('auth');
        $this->cart = $cart;

    }

    public function getCart(){
        $carts = $this->cart->cart();

        return view('user.pages.cart', compact('carts'));
    }

    public function getStoreCart(Request $request, $id){
        $duplicate = $this->cart->productId($request);

        if ($duplicate) {
            return redirect('/user/cart')->with('gagal','Barang Sudah Dipilih');
        }

        $this->cart->storeCart($request, $id);

        return redirect('/user/cart')->with('sukses','Suskses Tambah Cart');
    }

    public function updateCart(Request $request, $id){
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);

        return response()->json([
            'sukses' => true
        ]);
    }

    public function getDeleteCart($id){
        $cart = $this->cart->deleteCart($id);

        if ($cart) {
            return redirect()->route('user.cart')->with(['gagal' => 'Barang Gagal dihapus']);
        } else {
            return redirect()->route('user.cart')->with(['sukses' => 'Barang Berhasil dihapus']);
        }
    }
}

