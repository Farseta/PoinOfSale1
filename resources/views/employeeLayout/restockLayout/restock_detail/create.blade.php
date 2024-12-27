@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="stuff">Nama Barang</label>
                        <input type="text" class="form-control" id="stuff" name="stuff" value="{{ $stuffs->id }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="stock">Jumlah barang</label>
                        <input type="number" class="form-control" id="stock" placeholder="Masukkan jumlah barang"
                            name="stuff_total">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga per unit</label>
                        <input type="number" class="form-control" id="price" placeholder="Masukkan Harga"
                            name="cost_unit">
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

@section('javascript')
    <script>
        function saveData() {
            const stock_stuff = $('#stock').val();
            const price_stuff = $('#price').val();
           
            const id_stuff = {{ $stuffs->id }};

            var stuffArray = JSON.parse(localStorage.getItem('stuffArray')) || [];
            var newStuffs = {
                id: id_stuff,
                stock_stuff: stock_stuff,
                price_stuff: price_stuff,
                
            }
            var index = stuffArray.findIndex(stuff=>stuff.id === id_stuff);
            if (index === -1) {

                stuffArray.push(newStuffs);
            } else {
                stuffArray[index] = newStuffs;
               
            }
            localStorage.setItem('stuffArray', JSON.stringify(stuffArray));
            // localStorage.setItem('id_stuff', id_stuff);
            // localStorage.setItem('price_stuff', price_stuff);
            // localStorage.setItem('stock_stuff', stock_stuff);
            // localStorage.setItem('id_user', user);

        }
        $('form').on('submit', function(event) {
            event.preventDefault();
            saveData();
            window.location.href = '{{ route('restocks.create') }}';
        })
    </script>
@endsection
