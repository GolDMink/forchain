@extends('layout.masters')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Halaman Riwayat Konsultasi</h1>
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
                                            class="zmdi zmdi-flower-alt"></i></span> Data Riwayat</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabelkonsul">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Kode Konsultasi</th>
                                                <th class="wd-20p border-bottom-0">Nama Penyakit</th>
                                                <th class="wd-20p border-bottom-0">Gejala</th>
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
                <div class="modal fade" id="modalinputgejala" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Gejala</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Kode Gejala</label>
                                        <div class="col-md-9">
                                            <input type="text" name="kode" id="kode" class="form-control">
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Nama Gejala</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                placeholder="nama inovasi">
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Gambar Gejala</label>
                                        <div class="col-md-9">
                                            <input type="file" name="gambar" id="gambar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group" align="center">
                                        <input type="hidden" name="action" id="action" />
                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="action_button" id="action_button"
                                    class="btn btn-primary theme-bg gradient" value="Add" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW-2 CLOSED -->

    </div>
    <!-- CONTAINER CLOSED -->
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
            var tabel = $('#tabelkonsul').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side

                ajax: {
                    url: "{{ route('konsultasi.datatable') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_konsultasi',
                        name: 'kode_konsultasi'
                    },
                    {
                        data: 'penyakit_nama',
                        name: 'penyakit_nama'
                    },
                    {
                        data: 'gejala',
                        name: 'gejala'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });
        }
        $(document).on('click', '#editGejala', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('gejala/editgejala') }}" + "/" + id,
                dataType: "json",
                success: function(html) {

                    $('.modal-title').text("Edit Gejala");

                    $('#hidden_id').val(html.data.id);
                    $('#kode').val(html.data.kode_gejala);
                    $('#nama').val(html.data.nama_gejala);

                    $('#modalinputgejala').modal('show');
                    $('#action_button').val("Simpan");
                    $('#action').val("Edit");
                }
            })
        })
        $(document).on('click', '#cetak', function() {
            var id = $(this).data('id');
            window.location.href = '/konsultasi/cetak' + '/' + id
        })
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('gejala.simpan') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)

                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            $('#tabelkonsul').DataTable().ajax.reload(null, false);
                            swal(
                                'Berhasil',
                                'Data telah berhasil ditambah',
                                'success'
                            );
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#modalinputgejala').modal('hide');
                        }
                        $('#form_result').html(html);
                    }
                })
            }

            if ($('#action').val() == "Edit") {
                $.ajax({
                    url: "{{ route('gejala.update') }}",
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
                            $('#modalinputgejala').modal('hide');
                            $('#tabelkonsul').DataTable().ajax.reload(null, false);
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
            $('#action_button').val("Tambah Gejala");
            $('#action').val("Add");
            $("#modalinputgejala").modal("show")
        })





        $(document).on('click', '#deleteGejala', function() {
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
                            url: "{{ url('gejala/hapusgejala') }}" + "/" + id,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(respon) {
                                swal('Berhasil!', 'data tersebut berhasil dihapus', 'success');
                                $('#tabelkonsul').DataTable().ajax.reload();
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
