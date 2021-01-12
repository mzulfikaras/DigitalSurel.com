<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductRepository{

    public function dataProduct(){

        $dataProduct = Product::orderBy('created_at','DESC');

        return $dataProduct->get();
    }

    public function storeProduct(Request $request){

        $result = [
            'status' => false,
            'message' => ''
        ];

        try {

            $product = new Product();

            $product->nama_product = $request->nama_product;
            $product->image = $request->file('image')->store('assets/admin/img','public');
            $product->deskripsi = $request->deskripsi;
            $product->harga = $request->harga;
            $product->save();

            $result['status'] = true;
            $result['message'] = 'Data Product Berhasil Ditambahkan';

            return $result;
        } catch (\Throwable $th) {
            $result['message'] = 'Function Store Product Error => ' . $th->getMessage();
            return $result;
        }
    }

    public function productId($id){
        return Product::with([])->find($id);
    }

    public function showProduct($id){
        $product = $this->productId($id);

        return $product;
    }

    public function updateProduct($request,$id){

        $product = $this->productId($id);

        $result = [
            'status' => false,
            'message' => ''
        ];

        try {
            if($request->image == true){
                Storage::delete('public/' . $product->image);
                $product['image'] = $request->file('image')->store('assets/admin/img','public');
            }
            $product->update();
            $product->nama_product = $request->nama_product;
            $product->deskripsi = $request->deskripsi;
            $product->harga = $request->harga;
            $product->save();
            $result['status'] = true;
            $result['message'] = 'Data Product Berhasil Diupdate';
            return $result;

        } catch (\Throwable $th) {
            $result['message'] = 'Function Update Product Error => ' . $th->getMessage();
            return $result;
        }
    }

    public function deleteProduct($id){
      $product = $this->productId($id);

      $result = [
        'status' => false,
        'message' => ''
      ];

      try {
          Storage::delete('public/' . $product->image);
          $product->delete();

          $result['status'] = true;
          $result['message'] = 'Data Product Berhasil di Delete';

          return $result;

      } catch (\Throwable $th) {

        $result['message'] = 'Function Update Product Error => ' . $th->getMessage();
        return $result;
      }
    }
}
