@extends('user.master')
@section('title', 'Checkout | DigitalSurel.com')

@section('main')
@php
$total = 0;
@endphp
<div class="container">
    <div class="py-5 text-center">

      <h2>Checkout Details</h2>
      <p class="lead">Please Check Your Checkout Details</p>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your Orders</span>
          <span class="badge badge-secondary badge-pill">{{ $carts->count() }}</span>
        </h4>
        <ul class="list-group mb-3">
          @foreach ($carts as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $cart->product->nama_product }}</h6>
                <small class="text-muted">Jumlah: {{$cart->qty}}</small>
              </div>
              <span class="text-muted">Rp {{ number_format($cart->product->harga) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Sub Total (RP)</span>
              <strong>Rp. {{ number_format($cart->product->harga * $cart->qty) }}</strong>
            </li>

            @php
                $total += ($cart->product->harga * $cart->qty)
            @endphp
          @endforeach
          <li class="list-group-item d-flex justify-content-between">
            <span>All Total (RP)</span>
            <strong>Rp. {{ number_format($total) }}</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Personal Details</h4>
        <form class="needs-validation" novalidate action="{{route('user.go.checkout')}}" method="POST">
            @csrf

          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Nama</label>
              <input type="text" class="form-control" name="nama" id="firstName" placeholder="" value="{{Auth::user()->name}}" required>
              <div class="invalid-feedback">
                Valid Nama is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{Auth::user()->email}}">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <span class="input-group-text" id="no_telepon">+62</span>&nbsp;
            </div>
            <input type="text" class="form-control" aria-describedby="no_telepon" name="no_telepon" value="{{Auth::user()->no_telepon}}">
          </div>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address" required>
            <label class="custom-control-label" for="same-address">I agree with the Terms & Conditions</label>
          </div>
          <hr class="mb-4">

          <input type="hidden" name="total" value="{{ $total }}">
          <input type="hidden" name="paid" value="Belum Dibayar">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
@endsection
