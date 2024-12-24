@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('categories/store')}}" method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="kategori">Nama Kategori</label>
              <input type="text" class="form-control" id="kategori" name="category_name" placeholder="Masukkan Nama Kategori">
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