@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    Restock
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>

                                <th>Harga Total</th>
                                <th>Status</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restocks as $key => $restock)
                                <tr>
                                    <td class="text-center">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $restock->user->name }}
                                    </td>
                                    <td>
                                        {{ $restock->cost_total }}
                                    </td>
                                    <td>
                                        {{ $restock->status }}
                                    </td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-primary view-detail"
                                            data-toggle="modal" data-target="#modal-primary"
                                            data-id = "{{ $restock->id }}">Lihat Detail</a>

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

        </div>

        <div class="modal fade" id="modal-primary">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-dialog">
                <div class="modal-content bg-primary">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Restock</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody id="restock-detail-body">
                                <tr>
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
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-light approve-btn">setujui penambahan stock</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var restock_id;
            $(".view-detail").on('click', function() {
                restock_id = $(this).data('id');
                // console.log(restock_id);
                var totalPrice = 0;
                $.ajax({
                    url: `/restocks/${restock_id}/show_detail`,
                    method: 'GET',
                    success: function(response) {
                        var tableBody = $('#restock-detail-body');
                        tableBody.empty();
                        // console.log(response);
                        response.forEach(function(restock_detail, index) {
                            var rowNumber = index + 1
                            var row = `
                            <tr>
                                <td>${rowNumber}</td>
                            <td>${restock_detail.stuff.name_stuff}</td>
                            <td>${restock_detail.stuff_total}</td>
                            <td>${restock_detail.cost_unit}</td>
                          </tr>
                            `;
                            tableBody.append(row);
                            totalPrice += parseFloat(restock_detail.cost_unit);
                        });
                        $('#priceTotal').text(totalPrice.toFixed(2));
                        
                    },
                    error: function(xhr) {
                        console.log('error', xhr.responseText);
                    }
                })
            })


           

            $('.approve-btn').on('click', function() {
                // var restock_id = $(this).closest('.modal-content').find(('.view-detail')).data('id');
                // var restock_id = $(this).closest('.modal-content').find('.view-detail').data('id');
                // var restockId = $(this).closest('.modal-content').find('.view-details').data('id');
                console.log(restock_id);
                $.ajax({
                    url: `/approve_stock/${restock_id}`,
                    method: "POST",
                    data: {
                        approvalValue: 1,
                        restock_id: restock_id,
                        _token: $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function(response) {
                        console.log(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log('Error', xhr.responseText);
                    }
                })
            });
        });
    </script>
@endsection
