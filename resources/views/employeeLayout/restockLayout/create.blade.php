@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{-- akan ditambahkan --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            <a href="#" class="btn btn-success" id="saveBtn">Tambah</a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>

                                    <th>Nama Barang</th>
                                    <th>Banyak Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="name_stuff"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><strong>Total Harga</strong></td>
                                    <td colspan="2" id="priceTotal"></td>
                                </tr>

                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            {{-- ditambahkan secara lokal --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stock</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stuffs as $key => $stuff)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $stuff->name_stuff }}
                                        </td>
                                        <td>
                                            {{ $stuff->stock }}
                                        </td>
                                        <td>
                                            <a href="{{ url('restock_details/' . $stuff->id . '/create') }}"
                                                class="btn btn-success">Tambah</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            getData();

            function getData() {
                var baseUrl = '{{ url('') }}'
                var stuffArray = JSON.parse(localStorage.getItem('stuffArray')) || [];
                var tableBody = $("#dataTable tbody")
                var totalPrice = 0;
                tableBody.empty();
                stuffArray.forEach(function(stuff, index) {
                    var rowNumber = index + 1
                    var row = `
                    <tr data-id= "${stuff.id}">
                    <td> ${rowNumber} </td>
                    
                    <td data-id= "${stuff.id}" class ="name-stuff">  ${stuff.id} </td>
                    <td> ${stuff.stock_stuff}</td>
                    <td> ${stuff.price_stuff} </td>
                    <td><a href="${baseUrl}/restock_details/${stuff.id}/edit" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger delete-btn" data-id="${stuff.id}"  >Delete</a></td>
                    </tr>
                `;
                    tableBody.append(row);
                    searcItem(stuff.id);
                    totalPrice += parseInt(stuff.price_stuff);
                });
                // $("#totalAmount").text(totalPrice.toFixed(2));
                $('#priceTotal').text(totalPrice.toFixed(2));
                console.log(totalPrice);
            }

            function deleteData(id) {
                var stuffArray = JSON.parse(localStorage.getItem('stuffArray')) || [];
                var index = stuffArray.findIndex(stuff => stuff.id === id);

                if (index !== -1) {
                    stuffArray.splice(index, 1);
                    localStorage.setItem('stuffArray', JSON.stringify(stuffArray));
                    var row = $('tr[data-id="' + id + '"]');

                    console.log('ro delete', row);
                    row.remove();
                    updateTable();
                    getData();
                }
            }

            function updateTable() {
                $('#dataTable tbody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });

            }

            $(document).on('click', '.delete-btn', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                deleteData(id);
            })

            function searcItem(idstuff) {
                console.log(idstuff);
                $.ajax({
                    url: "{{ url('search_items') }}",
                    mehtod: "GET",
                    data: {
                        id: idstuff
                    },
                    success: function(response) {
                        console.log(response.stuff_name);
                        // return response.stuff_name;
                        var namecel = $('.name-stuff[data-id="' + idstuff + '"]')
                        namecel.text(response.stuff_name);
                    },
                    error: function(xhr) {
                        console.error('Error', xhr.responseText);
                    }
                })
            }
            function sendData(){
                var stuffArray = JSON.parse(localStorage.getItem('stuffArray')) || [];
                var totalPrice = 0;
                var id_user = {{Auth::user()->id}};
                stuffArray.forEach(function(stuff){
                    totalPrice += parseFloat(stuff.price_stuff);
                });
                console.log(stuffArray);
                console.log(totalPrice);
                console.log(id_user);
                
                $.ajax({
                    url: "{{url('restocks/store')}}",
                    method:"POST",
                    data: {
                        stuffArray: stuffArray,
                        totalPrice: totalPrice,
                        id_user: id_user,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success:function(response){
                        console.log('Data saved', response);
                    },
                    error:function(xhr){
                        console.error('Error', xhr.responseText);
                    }
                })
            }
            
            $("#saveBtn").on('click',function(){
                event.preventDefault();
                sendData();
                clearStorage();
            })
            function clearStorage(){
                localStorage.clear();
                $("#dataTable tbody").empty();
                $("#priceTotal").text(0);
                
            }

        });
    </script>
@endsection
