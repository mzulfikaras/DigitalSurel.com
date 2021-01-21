@extends('user.master')
@section('title','Product Details | DigitalSurel.com')
@section('cart-icon')
    <i class="fa fa-shopping-cart" style="font-size:36px"></i>
    <span class='badge badge-warning' id='lblCartCount'> {{ $carts->count() }} </span>
@endsection

@section('main')
<div id="main">
    <div class="inner">
        <h1>{{ $showProduct->nama_product }} <span class="pull-right">Rp. {{ $showProduct->harga }}</span></h1>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{Storage::url($showProduct->image)}}" class="img-fluid" alt="">
                </div>

                <div class="col-md-7">
                    <p>{{ $showProduct->deskripsi }}</p>

                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{route('user.product')}}">
                                <input type="button" class="primary" value="Back To Product">
                            </a>
                        </div>
                        <div class="col-sm-7">
                            <form action="/user/cart/store/{{ $showProduct->id }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id">
                                <input type="submit" class="btn btn-secondary" value="Masukkan ke cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
