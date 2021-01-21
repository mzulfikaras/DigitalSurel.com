@extends('user.master')
@section('title','Invoice | DigitalSurel.com')

@section('main')
@php
    $no = 1;
@endphp
<div class="container">
    <div class="card">
      <div class="card-header">
      Invoice No: &nbsp;
      <strong># {{$invoice->checkout_id}} - {{date('Y', strtotime($invoice->created_at))}}</strong>
        <span class="float-right"> <strong>Status:&nbsp;</strong>{{ $invoice->paid}}</span>

      </div>
      <div class="card-body">
      <div class="row mb-4">
      <div class="col-sm-6">
      <h6 class="mb-3">Personal Details</h6>
      <div>
      <strong>{{$invoice->nama}}</strong>
      </div>
      <div>Email: {{$invoice->email}}</div>
      <div>Phone: +62{{$invoice->no_telepon}}</div>
      </div>

      <div class="col-sm-6"></div>



      </div>

      <div class="table-responsive-sm">
      <table class="table table-striped">
      <thead>
      <tr>
      <th class="center">#</th>
      <th>Item</th>
      <th>Deskripsi</th>

      <th class="right">Harga Pcs</th>
        <th class="center">Qty</th>
      <th class="right">Sub Total</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($data as $d)
        <tr>
            <td class="center">{{$no++}}</td>
            <td class="left strong">{{$d->product->nama_product}}</td>
            <td class="left">{{$d->product->deskripsi}}</td>

            <td class="right">{{$d->product->harga}}</td>
              <td class="center">{{$d->qty}}</td>
            {{-- <td class="right">{{$d->total}}</td> --}}
        </tr>
        @endforeach
      </tbody>
      </table>
      </div>
      <div class="row">
      <div class="col-lg-4 col-sm-5">

      </div>

      <div class="col-lg-4 col-sm-5 ml-auto">
      <table class="table table-clear">
      <tbody>
      <tr>
      <td class="left">
      <strong>Total</strong>
      </td>
      <td class="right">
      <strong>Rp. {{ $invoice->total }}</strong>
      </td>
      </tr>
      </tbody>
      </table>

      </div>

      </div>

      </div>
      </div>
      </div>
@endsection
