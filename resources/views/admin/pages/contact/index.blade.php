@extends('admin.master-admin')
@section('title', 'Contact | DigitalSurel.com')

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
                    Contact Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataContact as $data)
                                    <tr class="odd gradeX">
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->subject}}</td>
                                        <td>{{$data->notes}}</td>
                                        <td>
                                            <form action="{{route('admin.delete.contact', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')

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