@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Barang</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-success"> Tambah</a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">
                                        as
                                    </td>
                                    <td>
                                        as
                                    </td>
                                    <td>
                                        tes
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>

            </div>


            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kategori</h3>
                        <div class="card-tools">
                            <a href="{{ url('categories/create') }}" class="btn btn-success">Tambah</a>
                            
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    @if ($key != 0)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>
                                                {{ $category->category_name }}
                                            </td>

                                            <td>
                                                <a href="{{ url('categories/' . $category->id . '/edit') }}"
                                                    class="btn btn-primary">Edit</a>

                                                <form action="{{ url('categories', ['id' => $category->id]) }}"
                                                    method="POST">
                                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete"
                                                        onclick="return confirm ('are you sure?')">
                                                    @method('delete')
                                                    @csrf
                                                </form>

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pajak</h3>

                        <div class="card-tools">
                           <a href="{{url('taxes/create')}}" class="btn btn-success">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Pajak</th>
                                    <th>nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taxes as $key=>$tax)
                                
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        {{$tax->tax_name}}
                                    </td>
                                    
                                    <td>
                                        {{$tax->value}}
                                    </td>
                                    <td>
                                        <a href="{{url('taxes/'.$tax->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                        <form action="{{ url('taxes', ['id' => $tax->id]) }}"
                                            method="POST">
                                            <input class="btn btn-danger btn-sm" type="submit" value="Delete"
                                                onclick="return confirm ('are you sure?')">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Discount</h3>

                        <div class="card-tools">
                            <a href="{{url('discounts/create')}}" class="btn btn-success">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Diskon</th>
                                    <th>Tipe Diskon</th>
                                    <th >Nilai Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $key=> $discount)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>
                                        {{$discount->discount_name}}
                                    </td>
                                    <td>
                                        {{$discount->discount_type}}
                                    </td>
                                    <td>
                                        {{$discount->discount_value}}
                                    </td>
                                    <td>
                                        <a href="{{url('discounts/'.$discount->id.'/edit')}}" class="btn btn-primary">Edit</a>

                                        <form action="{{ url('discounts', ['id' => $discount->id]) }}"
                                            method="POST">
                                            <input class="btn btn-danger btn-sm" type="submit" value="Delete"
                                                onclick="return confirm ('are you sure?')">
                                            @method('delete')
                                            @csrf
                                        </form>

                                    </td>
                                </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
    @endsection
