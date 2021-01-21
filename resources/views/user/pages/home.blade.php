@extends('user.master')
@section('title','Home | DigitalSurel.com')

@section('cart-icon')
    <i class="fa fa-shopping-cart" style="font-size:36px"></i>
    <span class='badge badge-warning' id='lblCartCount'> {{ $carts->count() }} </span>
@endsection

@section('main')
<div id="main">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/user/img_user/background1.jpg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/user/img_user/background2.jpg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/user/img_user/background3.jpg')}}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="fa fa-arrow-circle-left" aria-hidden="true" style="font-size:48px"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:48px"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br>
    <br>

    <div class="inner">
        <!-- About Us -->
        <header id="inner">
            <h1>Find Your Digital Invitation!</h1>
            <p>Find digital invitation concepts and models on our website. The price is cheap, but not cheap. login, and choose the product now!</p>
        </header>

        <br>

        <h2 class="h2">Featured Products</h2>

        <!-- Products -->
        <h3> - Wedding Invitation</h3>
        <section class="tiles">
            @foreach ($dataProduct as $data)
                <article class="style1">
                    <span class="image">
                        <img src="{{Storage::url($data->image)}}" alt="" height="400" />
                    </span>
                    <a href="{{route('user.product.details', $data->id)}}">
                        <h2>{{ $data->nama_product }}</h2>

                        <p><strong>Rp. {{ $data->harga }}</strong></p>

                        <p>{{ $data->deskripsi }}</p>
                    </a>
                </article>

            @endforeach
        </section>

        {{-- <h3> - Brochure Invitation</h3>
        <section class="tiles">
            <article class="style1">
                <span class="image">
                    <img src="images/product-1-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>
            <article class="style2">
                <span class="image">
                    <img src="images/product-2-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>
            <article class="style3">
                <span class="image">
                    <img src="images/product-3-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>

            <article class="style4">
                <span class="image">
                    <img src="images/product-4-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>

            <article class="style5">
                <span class="image">
                    <img src="images/product-5-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>

            <article class="style6">
                <span class="image">
                    <img src="images/product-6-720x480.jpg" alt="" />
                </span>
                <a href="product-details.html">
                    <h2>Lorem ipsum dolor sit amet, consectetur</h2>

                    <p><del>$19.00</del> <strong>$19.00</strong></p>

                    <p>Vestibulum id est eu felis vulputate hendrerit uspendisse dapibus turpis in </p>
                </a>
            </article>
        </section> --}}

        <p class="text-center"><a href="{{route('user.product')}}">More Invitation &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>

        <br>

        <h2 class="h2">Testimonials</h2>

        <div class="row">
            <div class="col-sm-6 text-center">
                <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique, delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em></p>

                <p><strong> - John Doe</strong></p>
            </div>

            <div class="col-sm-6 text-center">
                <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique, delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em></p>

                <p><strong>- John Doe</strong> </p>
            </div>
        </div>

        <p class="text-center"><a href="testimonials.html">Read More &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>


    </div>
</div>
@endsection
