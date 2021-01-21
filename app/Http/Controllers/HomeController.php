<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ContactUsRequest;
use App\Models\Invoice;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Checkout\CheckoutRepository;
use App\Repositories\Invoice\InvoiceRepository;

class HomeController extends Controller
{
    protected $contact;
    protected $product;
    protected $cart;
    protected $checkout;
    protected $invoice;

    public function __construct(ContactRepository $contact, ProductRepository $product, CartRepository $cart, CheckoutRepository $checkout, InvoiceRepository $invoice){
        $this->contact = $contact;
        $this->product = $product;
        $this->cart = $cart;
        $this->checkout = $checkout;
        $this->invoice = $invoice;
    }

    public function index(){
        $dataProduct = $this->product->dataProductHome();
        $carts = $this->cart->cart();
        return view('user.pages.home', compact('dataProduct','carts'));
    }

    public function getContactHome(ContactUsRequest $request){

       $data = $this->contact->storeContact($request);

       if ($data['status']) {
        return redirect()->route('user.home')->with(['sukses' => $data['message']]);
       } else {
        return redirect()->route('user.home')->with(['gagal' => $data['message']]);
       }
    }

    public function getDataProduct(){
       $dataProduct = $this->product->dataProduct();
       $carts = $this->cart->cart();

       return view('user.pages.product', compact('dataProduct', 'carts'));
    }

    public function getShowProduct($id){
        $showProduct = $this->product->showProduct($id);
        $carts = $this->cart->cart();

        return view('user.pages.product-details', compact('showProduct', 'carts'));
    }

    public function getCheckout(){
        $carts = $this->checkout->cartRequest();

        return view('user.pages.checkout', compact('carts'));
    }

    public function getStorecheckout(Request $request){
        $carts = Cart::where('user_id', Auth::user()->id);

        $cartUser = $carts->get();

        $checkout = Checkout::create([
            'user_id' => Auth::user()->id
        ]);

        foreach($cartUser as $cart){
            $checkout->invoice()->create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'total' => $request->total,
                'paid' => $request->paid,
            ]);
        }

        $carts->delete();
        return redirect('/user/invoice');
    }

    public function getInvoice(){
        $data = $this->invoice->allDataInvoice();
        $invoice = $this->invoice->oneDataInvoice();

        return view('user.pages.invoice', compact('data','invoice'));
    }
}
