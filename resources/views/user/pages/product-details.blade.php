@extends('user.master')
@section('title','Product Details | DigitalSurel.com')

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
                            {{-- <a href="{{route('user.checkout')}}"> --}}
                                <input type="button" class="primary" value="Add to Cart"
                                onclick="cartLS.add({id: {{$showProduct->id}}, name: '{{$showProduct->nama_product}}', price: {{$showProduct->harga}} })">
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow-sm" id="cart">
                <div class="card-header">
                    <h2>Cart</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody class="cart">
                        </tbody>
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right" id="total">Total: <strong class="total"></strong></td>
                            <td></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <br>
        <br>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/user/js/cart-localstorage.min.js')}}" type="text/javascript"></script>

<script>
    var carts = document.getElementById('cart')
    var totals = document.getElementById('total')
    if (totals.innerHTML == "") {
        carts.style.display = 'none';
    } else {

    }
    function renderCart(items) {
        const $cart = document.querySelector(".cart")
        const $total = document.querySelector(".total")

        $cart.innerHTML = items.map((item) => `
                <tr>
                    <td>#${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td style="width: 60px;">
                        <button type="button" class="btn btn-block btn-sm btn-outline-secondary"
                            onClick="cartLS.quantity(${item.id},1)">+</button>
                    </td>
                    <td style="width: 60px;">
                        <button type="button" class="btn btn-block btn-sm btn-outline-secondary"
                            onClick="cartLS.quantity(${item.id},-1)">-</button>
                    </td>
                    <td class="text-right">Rp ${item.price}</td>
                    <td class="text-right"><Button class="btn btn-secondary" onClick="cartLS.remove(${item.id})">Delete</Button></td>
                </tr>`).join("")

        $total.innerHTML = "Rp" + cartLS.total()
    }
    renderCart(cartLS.list())
    cartLS.onChange(renderCart)
</script>
@endsection
