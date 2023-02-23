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
                                <p class="modal-title">Detail Gejala</p>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>



            <script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <p>Detail Gejala</p>
    <table class="table details-table" id="penyakit-{{idpenyakit}}">
        <thead>
        <tr>
            <th>Nama Gejala</th>
            <th>Aksi</th>
        </tr>
        </thead>
    </table>
    @endverbatim
</script>

            <script>
                var template = Handlebars.compile($("#details-template").html());
                var table = $('#tabelpengetahuan').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('pengetahuan.getDatatable') }}',
                    columns: [{
                            "className": 'details-control',
                            "orderable": false,
                            "searchable": false,
                            "data": null,
                            "defaultContent":  '<i class = "fa fa-eye text-primary"> </ i>',
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
                    order: [
                        [1, 'asc']
                    ]
                });

                // Add event listener for opening and closing details
                $('#tabelpengetahuan tbody').on('click', 'td.details-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var tableId = 'penyakit-' + row.data().idpenyakit;

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
                        tr.next().find('td').addClass('no-padding');
                    }
                });

                function initTable(tableId, data) {
                    $('#' + tableId).DataTable({
                        processing: true,
                        searching: false,
                        paging: false,
                        serverSide: true,
                        ajax: data.details_url,
                        columns: [
                            {
                                data: 'namagejala',
                                name: 'namagejala'
                            },
                            {
                                data: 'aksi',
                                name: 'aksi'
                            }
                        ]
                    })
                }
                $(document).on('click', '#deletegejala', function() {
                    idp = $(this).data('penyakit');
                    idg = $(this).data('gejala');
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
                                    url: "{{ url('pengetahuan/hapusgejala') }}" + "/" + idp + "/" + idg,
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
        @endsection
