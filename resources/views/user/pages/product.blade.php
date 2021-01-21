@extends('user.master')
@section('title','Products | DigitalSurel.com')
@section('cart-icon')
    <i class="fa fa-shopping-cart" style="font-size:36px"></i>
    <span class='badge badge-warning' id='lblCartCount'> {{ $carts->count() }} </span>
@endsection

@section('main')
    <div id="main">
        <div class="inner">
            <h1>Products</h1>

            <div class="image main">
                <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
            </div>

            <!-- Products -->
            <section class="tiles">
                @foreach ($dataProduct as $data)
                    <article class="style1">
                        <span class="image">
                            <img src="{{ Storage::url($data->image)}}" alt="" height="400" />
                        </span>
                        <a href="{{ route('user.product.details', $data->id) }}">
                            <h2>{{ $data->nama_product }}</h2>

                            <p><strong>Rp. {{ $data->harga }}</strong></p>

                            <p>{{ $data->deskripsi }}</p>
                        </a>
                    </article>
                @endforeach
            </section>
        </div>
    </div>
@endsection
