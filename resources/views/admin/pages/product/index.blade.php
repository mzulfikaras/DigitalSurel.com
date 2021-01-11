@extends('admin.master-admin')
@section('title','Product | DigitalSurel.com')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div>
                @if(session()->has('gagal'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Gagal </strong> {{ session()->get('gagal') }}
                </div>
                @elseif(session()->has('sukses'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Sukses </strong> {{ session()->get('sukses') }}
                    </div>
                @endif
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Product Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <a href="{{route('admin.create.product')}}" class="btn btn-warning" style="margin-bottom:20px;">Tambah Product</a>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nama Product</th>
                                    <th>Image</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataProduct as $data)
                                    <tr class="odd gradeX">
                                        <td>{{$data->nama_product}}</td>
                                        <td>
                                            <img src="{{Storage::url($data->image)}}" width="150px" alt="">
                                        </td>
                                        <td>{{$data->deskripsi}}</td>
                                        <td>Rp. {{$data->harga}}</td>
                                        <td>
                                            <form action="{{route('admin.delete.product', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a href="{{route('admin.edit.product', $data->id)}}" class="btn btn-primary">Edit</a>

                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection
