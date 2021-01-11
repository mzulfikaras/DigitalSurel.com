@extends('admin.master-admin')
@section('title','Create Product | DigitalSurel.com')

@section('main')
    <form role="form" action="{{route('admin.store.product')}}" method="POST" enctype="multipart/form-data" style="margin-top: 50px">

    @csrf
    <h1>Tambah Produk</h1><br>
      <div class="form-group">
        <label for="nama_product">Nama Product</label>
        <input type="nama_product" class="form-control" id="nama_product" name="nama_product" value="{{old('nama_product')}}">
        @error('nama_product')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="image">Image Product</label>
        <input type="file" class="form-control" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi Product</label><br>
        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
        @error('deskripsi')
            <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
        <label for="harga">Harga</label>
        <input type="Text" class="form-control" id="harga" name="harga">
        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection
