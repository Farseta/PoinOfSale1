@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('stuffs/store')}}" method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="kategori">Nama Barang</label>
              <input type="text" class="form-control" id="kategori" name="name_stuff" placeholder="Masukkan Nama Barang">
            </div>
            <div class="form-group">
                <label for="disabledSelect" class="form-label">Kategori</label>
                <select id="disabledSelect" class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        
                    <option value="{{$category->id}}">
                        {{ $category->category_name}}
                    </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="disabledSelect" class="form-label">diskon</label>
                <select id="disabledSelect" class="form-select" name="discount_id">
                    @foreach ($discounts as $discount)

                    <option value="{{$discount->id}}" >
                        {{ $discount->discount_name}}
                    </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="disabledSelect" class="form-label">Pajak</label>
                <select id="disabledSelect" class="form-select" name="tax_id">
                    @foreach ($taxes as $tax)
                        
                    <option value="{{$tax->id}}">
                        {{$tax->tax_name}}
                    </option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="kategori">stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Banyak Stock Barang">
              </div>
              <div class="form-group">
                <label for="kategori">Harga</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga Barang">
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