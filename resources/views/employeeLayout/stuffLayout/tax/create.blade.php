@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('taxes/store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori">Nama Pajak</label>
                        <input type="text" class="form-control" id="tax_name" name="tax_name"
                            placeholder="Masukkan Nama Pajak">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Nilai Pajak</label>
                        <input type="number" class="form-control" id="value" name="value"
                            placeholder="Masukkan Jumlah Pajak">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
