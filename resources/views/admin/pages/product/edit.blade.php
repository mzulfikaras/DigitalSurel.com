@extends('admin.master-admin')
@section('title','Edit Product | DigitalSurel.com')

@section('main')
    <form role="form" action="{{route('admin.update.product', $product->id)}}" method="POST" enctype="multipart/form-data" style="margin-top: 50px">

    @method('PUT')
    @csrf
    <h1>Tambah Produk</h1><br>
      <div class="form-group">
        <label for="nama_product">Nama Product</label>
        <input type="nama_product" class="form-control @error('nama_product') is-invalid @enderror" id="nama_product" name="nama_product" value="{{old('nama_product', $product->nama_product)}}">
        @error('nama_product')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Image Product</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi Product</label><br>
        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10">{{old('deskripsi', $product->deskripsi)}}</textarea>
        @error('deskripsi')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="Text" class="form-control" id="harga" name="harga" value="{{old('harga', $product->harga)}}">
        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
