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
                            <a href="#" class="btn btn-success">Tambah</a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Nama Barang</th>
                                    <th>Banyak Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
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
                tableBody.empty();
                stuffArray.forEach(function(stuff, index) {
                    var rowNumber = index + 1
                    var row = `
                    <tr data-id= "${stuff.id}">
                    <td> ${rowNumber} </td>
                    <td> ${stuff.user_id} </td>
                    <td>  ${stuff.id} </td>
                    <td> ${stuff.stock_stuff}</td>
                    <td> ${stuff.price_stuff} </td>
                    <td><a href="${baseUrl}/restock_details/${stuff.id}/edit" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger delete-btn" data-id="${stuff.id}"  >Delete</a></td>
                    </tr>
                `;
                    tableBody.append(row);
                });
            }

            function deleteData(id) {
                var stuffArray = JSON.parse(localStorage.getItem('stuffArray')) || [];
                var index = stuffArray.findIndex(stuff => stuff.id === id);
                
                if (index !== -1) {
                    stuffArray.splice(index, 1);
                    localStorage.setItem('stuffArray', JSON.stringify(stuffArray));
                    var row =$('tr[data-id="' + id + '"]');
                  
                    console.log('ro delete',row);
                    row.remove();
                    updateTable();
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

        });
    </script>
@endsection
