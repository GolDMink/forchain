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
                                            class="zmdi zmdi-flower-alt"></i></span> Data User</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="btntambah"><i
                                            class="fa fa-plus"></i> Tambah User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabeluser">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Nama User</th>
                                                <th class="wd-15p border-bottom-0">Username</th>
                                                <th class="wd-20p border-bottom-0">Level</th>
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
                <div class="modal fade" id="modalinputuser" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah User</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Nama</label>
                                        <div class="col-md-9">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Masukan Nama">
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Masukan Nama Pengguna">
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="inputName" class="col-md-3 form-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="text" name="password" id="password" class="form-control"
                                                placeholder="Masukan Password">
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
            var tabel = $('#tabeluser').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side

                ajax: {
                    url: "{{ route('user.getDatatableuser') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });
        }
        $(document).on('click', '#edituser', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('user/edituser') }}" + "/" + id,
                dataType: "json",
                success: function(html) {
                    console.log(html)

                    $('.modal-title').text("Edit User");

                    $('#hidden_id').val(html.data.id);
                    $('#username').val(html.data.username);
                    $('#name').val(html.data.name);

                    $('#modalinputuser').modal('show');
                    $('#action_button').val("Simpan");
                    $('#action').val("Edit");
                }
            })
        })
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('user.simpan') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        $('#tabeluser').DataTable().ajax.reload(null, false);
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
                            $('#modalinputuser').modal('hide');
                        }
                        $('#form_result').html(html);
                    }
                })
            }

            if ($('#action').val() == "Edit") {
                $.ajax({
                    url: "{{ route('user.update') }}",
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
                            $('#modalinputuser').modal('hide');
                            $('#tabeluser').DataTable().ajax.reload(null, false);
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
            $('#username').val('');
            $('#name').val('');
            $('#action_button').val("Tambah user");
            $('#action').val("Add");
            $("#modalinputuser").modal("show")
        })





        $(document).on('click', '#deleteuser', function() {
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
                            url: "{{ url('user/hapususer') }}" + "/" + id,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(respon) {
                                swal('Berhasil!', 'data tersebut berhasil dihapus', 'success');
                                $('#tabeluser').DataTable().ajax.reload();
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
