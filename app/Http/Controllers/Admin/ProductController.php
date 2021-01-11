<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function getDataProduct(){
        $dataProduct = $this->product->dataProduct();

        return view('admin.pages.product.index', compact('dataProduct'));
    }

    public function getViewCreate(){
        return view('admin.pages.product.create');
    }

    public function getStoreProduct(ProductRequest $request){

        $product = $this->product->storeProduct($request);

        if ($product['status']) {
            return redirect()->route('admin.product')->with(['sukses' => $product['message']]);
        } else {
            return redirect()->route('admin.product')->with(['gagal' => $product['message']]);
        }
    }

    public function getViewUpdate($id){
        $product = $this->product->productId($id);

        return view('admin.pages.product.edit', compact('product'));
    }

    public function getUpdateProduct(UpdateProductRequest $request, $id){
        $product = $this->product->updateProduct($request, $id);

        if ($product['status']) {
            return redirect()->route('admin.product')->with(['sukses' => $product['message']]);
        } else {
            return redirect()->route('admin.product')->with(['gagal' => $product['message']]);
        }
    }

    public function getDeleteProduct($id){
        $product = $this->product->deleteProduct($id);

        if ($product['status']) {
            return redirect()->route('admin.product')->with(['sukses' => $product['message']]);
        } else {
            return redirect()->route('admin.product')->with(['gagal' => $product['message']]);
        }
    }
}
