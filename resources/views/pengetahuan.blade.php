@extends('layout.master')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">

                    <div>
                        <ol class="breadcrumb">

                        </ol>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> <span class="btn btn-primary btn-round btn-xs"> <i
                                            class="zmdi zmdi-flower-alt"></i></span> Data Pengetahuan</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="btntambah"><i
                                            class="fa fa-plus"></i> Tambah Pengetahuan</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabelpengetahuan">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Nama Penyakit</th>
                                                <th class="wd-20p border-bottom-0">Total Gejala</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Modal -->
                <div class="modal fade" id="modalinputpengetahuan" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah pengetahuan</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabelpengetahuan">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Nama Penyakit</th>
                                                <th class="wd-20p border-bottom-0">Total Gejala</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <!-- ROW-2 CLOSED -->

                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
                <div class="modal fade" id="modalgejala" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Gejala</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabelgejala">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Gejala</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('js')
            <!-- INTERNAL FORMEDITOR JS -->
            <!-- DATA TABLE JS-->
            <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
            <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                });
                fill_datatable()

                function fill_datatable() {
                    var tabel = $('#tabelpengetahuan').DataTable({
                        processing: true,
                        serverSide: true, //aktifkan server-side

                        ajax: {
                            url: "{{ route('pengetahuan.getDatatable') }}",
                        },
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'nama',
                                name: 'nama'
                            },
                            {
                                data: 'totalgejala',
                                name: 'totalgejala'
                            },
                            {
                                data: 'action',
                                name: 'action'
                            },
                        ],
                    });
                }

                function datatablegejala(id = '') {
                    var tabelgejala = $('#tabelgejala').DataTable({
                        processing: true,
                        serverSide: true, //aktifkan server-side

                        ajax: {
                            url: "{{ url('pengetahuan/getgejala') }}" + "/" + id,
                        },
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'nama',
                                name: 'nama'
                            },
                            {
                                data: 'action',
                                name: 'action'
                            },
                        ],
                    });
                }
                $(document).on('click', '#editpengetahuan', function() {
                    var id = $(this).data('id');
                    $('#form_result').html('');
                    $.ajax({
                        url: "{{ url('pengetahuan/editpengetahuan') }}" + "/" + id,
                        dataType: "json",
                        success: function(html) {

                            $('.modal-title').text("Edit pengetahuan");

                            $('#hidden_id').val(html.data.id);
                            $('#kode').val(html.data.kode_pengetahuan);
                            $('#nama').val(html.data.nama_pengetahuan);

                            $('#modalinputpengetahuan').modal('show');
                            $('#action_button').val("Simpan");
                            $('#action').val("Edit");
                        }
                    })
                })
                $(document).on('click', '#getGejala', function() {
                    $('#modalgejala').modal('show');
                    var id = $(this).data('id');
                    datatablegejala(id)
                    $('#modalgejala').on('hidden.bs.modal', function() {
                        $("#tabelgejala").dataTable().fnDestroy();
                    })
                })
                $('#sample_form').on('submit', function(event) {
                    event.preventDefault();
                    if ($('#action').val() == 'Add') {
                        $.ajax({
                            url: "{{ route('pengetahuan.simpan') }}",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "json",
                            success: function(data) {
                                $('#tabelpengetahuan').DataTable().ajax.reload(null, false);
                                swal(
                                    'Berhasil',
                                    'Data telah berhasil ditambah',
                                    'success'
                                );

                                var html = '';
                                if (data.errors) {
                                    html = '<div class="alert alert-danger">';
                                    for (var count = 0; count < data.errors.length; count++) {
                                        html += '<p>' + data.errors[count] + '</p>';
                                    }
                                    html += '</div>';
                                }
                                if (data.success) {
                                    html = '<div class="alert alert-success">' + data.success + '</div>';
                                    $('#sample_form')[0].reset();
                                    $('#modalinputpengetahuan').modal('hide');
                                }
                                $('#form_result').html(html);
                            }
                        })
                    }

                    if ($('#action').val() == "Edit") {
                        $.ajax({
                            url: "{{ route('pengetahuan.update') }}",
                            method: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "json",
                            success: function(data) {
                                var html = '';
                                if (data.errors) {
                                    html = '<div class="alert alert-danger">';
                                    for (var count = 0; count < data.errors.length; count++) {
                                        html += '<p>' + data.errors[count] + '</p>';
                                    }
                                    html += '</div>';
                                }
                                if (data.success) {
                                    html = '<div class="alert alert-success">' + data.success + '</div>';
                                    $('#sample_form')[0].reset();
                                    $('#modalinputpengetahuan').modal('hide');
                                    $('#tabelpengetahuan').DataTable().ajax.reload(null, false);
                                    swal(
                                        'Berhasil',
                                        'Data telah berhasil diubah',
                                        'success'
                                    );

                                }
                                $('#form_result').html(html);
                            }
                        });
                    }
                });
                $("#btntambah").on("click", function() {
                    $('#action_button').val("Tambah pengetahuan");
                    $('#action').val("Add");
                    $("#modalinputpengetahuan").modal("show")
                })





                $(document).on('click', '#deletepengetahuan', function() {
                    id = $(this).data('id');
                    swal({
                            title: "Apakah anda yakin ingin menghapus data tersebut?",
                            text: "data akan dihapus secara permanen",
                            type: "error",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Confirm",
                            cancelButtonText: "Cancel",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    type: 'DELETE',
                                    url: "{{ url('pengetahuan/hapuspengetahuan') }}" + "/" + id,
                                    data: {
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(respon) {
                                        swal('Berhasil!', 'data tersebut berhasil dihapus', 'success');
                                        $('#tabelpengetahuan').DataTable().ajax.reload();
                                    },
                                    error: function(respon) {
                                        swal('oops!', 'gagal hapus', 'error');
                                    }
                                });

                            } else {
                                swal("Cancelled", "You Cancelled", "error");
                            }
                        });
                });
            </script>

            <script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <div class="label label-info">Customer {{ first_name }}'s Purchases</div>
    <table class="table details-table" id="purchases-{{id}}">
        <thead>
        <tr>
            <th>Id</th>
            <th>Bank account number</th>
            <th>Company</th>
        </tr>
        </thead>
    </table>
    @endverbatim
</script>

            <script>
                var template = Handlebars.compile($("#details-template").html());
                var table = $('#customers-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('api.master_details') }}',
                    columns: [{
                            "className": 'details-control',
                            "orderable": false,
                            "searchable": false,
                            "data": null,
                            "defaultContent": ''
                        },
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'first_name',
                            name: 'first_name'
                        },
                        {
                            data: 'last_name',
                            name: 'last_name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                    ],
                    order: [
                        [1, 'asc']
                    ]
                });

                // Add event listener for opening and closing details
                $('#customers-table tbody').on('click', 'td.details-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var tableId = 'purchases-' + row.data().id;

                    if (row.child.isShown()) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child(template(row.data())).show();
                        initTable(tableId, row.data());
                        console.log(row.data());
                        tr.addClass('shown');
                        tr.next().find('td').addClass('no-padding bg-gray');
                    }
                });

                function initTable(tableId, data) {
                    $('#' + tableId).DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: data.details_url,
                        columns: [{
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'bank_acc_number',
                                name: 'bank_acc_number'
                            },
                            {
                                data: 'company',
                                name: 'company'
                            }
                        ]
                    })
                }
            </script>
        @endsection
