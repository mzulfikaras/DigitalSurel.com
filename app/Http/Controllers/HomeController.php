<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Contact;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ContactUsRequest;

class HomeController extends Controller
{
    protected $contact;
    protected $product;

    public function __construct(ContactRepository $contact, ProductRepository $product ){
        $this->contact = $contact;
        $this->product = $product;
    }

    public function index(){
        $dataProduct = $this->product->dataProduct();
        return view('user.pages.home', compact('dataProduct'));
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

       return view('user.pages.product', compact('dataProduct'));
    }
}
