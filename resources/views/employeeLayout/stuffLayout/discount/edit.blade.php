@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('discounts/'.$discount->id) }}" method="POST">
            @csrf
            {{method_field('PUT')}}
            
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori">Nama Diskon</label>
                    <input type="text" class="form-control" id="discount_name" name="discount_name"
                        placeholder="Masukkan Nama Kategori" value="{{$discount->discount_name}}">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Diskon</label>
                    <input type="text" class="form-control" id="discount_type" name="discount_type"
                        placeholder="Masukkan Jenis diskon" value="{{$discount->discount_type}}">
                </div>
                <div class="form-group">
                    <label for="kategori">Nilai Discount</label>
                    <input type="number" class="form-control" id="discount_value" name="discount_value"
                        placeholder="Masukkan Nilai Diskon" value="{{$discount->discount_value}}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection