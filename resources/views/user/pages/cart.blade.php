@extends('user.master')
@section('title', 'Cart | DigitalSurel.com')

@if ($carts->isEmpty())
@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart Alert</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h3 style="text-align: center">Pilih Barang Terlebih Daulu :)</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@endif

@section('main')
<div class="container-fluid">
@if (Session::has('sukses'))
<div class="alert alert-success">
    {{ Session::get('sukses') }}
</div>
@endif

@if (Session::has('gagal'))
<div class="alert alert-danger">
    {{ Session::get('gagal') }}
</div>
@endif
@php
$total = 0;
@endphp

<h3>{{ $carts->count() }} Barang di cart anda</h3>
<table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    @if ($carts->count() == 0)
    <p style="text-align: center;">Cart masih kosong</p>
    @endif
    @foreach ($carts as $cart)
      <tr>
        <td data-th="Product">
          <div class="row">
              <div class="col-sm-2 hidden-xs"><img src="{{ Storage::url($cart->product->image) }}" alt="..." class="img-responsive" width="100"/></div>
              <div class="col-sm-10">
                  <h4 class="nomargin" id="nama">{{ $cart->product->nama_product }}</h4>
                  <p id="deskripsi">{{ $cart->product->deskripsi }}.</p>
                    </div>
                </div>
            </td>
            <td data-th="Price" id="harga">Rp {{ number_format($cart->product->harga) }}</td>
            <td data-th="Quantity">
                <select name="qty" id="qty" class="quantity" data-item="{{ $cart->id }}">
                    @for ($i = 1; $i < 10; $i++)
                        <option value="{{ $i }}" {{ $cart->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </td>
            <td data-th="Subtotal" class="text-center"><strong>Rp. {{ number_format($cart->product->harga * $cart->qty) }}</strong> </td>
            <td class="actions" data-th="">
                <form action="{{route('user.delete.cart', $cart->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </form>
            </td>
        </tr>
        @php
            $total += ($cart->product->harga * $cart->qty)
        @endphp
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td><a href="{{route('user.product')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center">
            <strong>
                Total Harga : Rp. <b id="total">{{ number_format($total) }}<b>
            </strong>
        </td>
        <td>
            @if ($carts->isEmpty())
                <button type="button" id="checkout" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                    Checkout <i class="fa fa-angle-right"></i>
                </button>
            @else
                <a href="{{route('user.checkout')}}">
                    <button type="button" id="checkout" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Checkout <i class="fa fa-angle-right"></i>
                    </button>
                </a>
            @endif
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection

@section('js')
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-item');
                    axios.patch(`/user/cart/${id}`, {
                        quantity: this.value,
                        id: id
                    })
                    .then(function(response){
                        window.location.href = '/user/cart'
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                })
            })
        })();
    </script>
@endsection
