@extends('layout.master')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid my-5">
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
                                                <th class="wd-15p border-bottom-0">Kode Rules</th>
                                                <th class="wd-15p border-bottom-0">Nama Penyakit</th>
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
                <div class="modal fade" id="modalinputpengetahuan" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah pengetahuan</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 form-label">Rule</label>
                                        <input type="text" name="rule" id="rule" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 form-label">Gejala</label>
                                        <select multiple="multiple" id="gejala" class="filter-multi" name="gejala[]">
                                            @foreach ($gejala as $i)
                                                <option value="{{ $i->id }}">{{ $i->nama_gejala }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 form-label">Penyakit</label>
                                        <select name="penyakit" id="penyakit" class="form-control">
                                            <option value="">Pilih Penyakit</option>
                                            @foreach ($penyakit as $item)
                                                <option value="{{ $item->id }}">{{ $item->penyakit_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" align="center">
                                        <input type="hidden" name="action" id="action" />
                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="action_button" id="action_button"
                                    class="btn btn-primary theme-bg gradient" value="Add" />
                            </div>
                        </div>
                        </form>
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
    <!-- MULTI SELECT JS-->
    <script src="{{ asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/multipleselect/multi-select.js') }}"></script>



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
            columns: [
                // {
                //     "className": 'details-control',
                //     "orderable": false,
                //     "searchable": false,
                //     "data": null,
                //     "defaultContent": '<i class = "fa fa-eye text-primary"> </ i>',
                // },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'kode_rule',
                    name: 'kode_rule'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'datagejala',
                    name: 'datagejala'
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
        // $('#tabelpengetahuan tbody').on('click', 'td.details-control', function() {
        //     var tr = $(this).closest('tr');
        //     var row = table.row(tr);
        //     var tableId = 'penyakit-' + row.data().idpenyakit;

        //     if (row.child.isShown()) {
        //         // This row is already open - close it
        //         row.child.hide();
        //         tr.removeClass('shown');
        //     } else {
        //         // Open this row
        //         row.child(template(row.data())).show();
        //         initTable(tableId, row.data());
        //         console.log(row.data());
        //         tr.addClass('shown');
        //         tr.next().find('td').addClass('no-padding');
        //     }
        // });

        // function initTable(tableId, data) {
        //     $('#' + tableId).DataTable({
        //         processing: true,
        //         searching: false,
        //         paging: false,
        //         serverSide: true,
        //         ajax: data.details_url,
        //         columns: [{
        //                 data: 'gejala',
        //                 name: 'gejala'
        //             },
        //             {
        //                 data: 'aksi',
        //                 name: 'aksi'
        //             }
        //         ]
        //     })
        // }
        $("#btntambah").click(function() {
            $('#penyakit').val('');
            $('#gejala').val('');
            $('#action_button').val("Tambah Pengetahuan");
            $('#action').val("Add");
            $("#modalinputpengetahuan").modal('show');

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
                        console.log(data)
                        // $('#tabelpengetahuan').DataTable().ajax.reload(null, false);
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
                        location.reload();
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
        $(document).on('click', '#editpengetahuan', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('pengetahuan/editpengetahuan') }}" + "/" + id,
                dataType: "json",
                success: function(html) {
                    console.log(html.opt)

                    $('.modal-title').text("Edit pengetahuan");

                    $('#hidden_id').val(html.data.id);
                    $('#rule').val(html.data.kode_rule);
                    $('#penyakit').val(html.data.penyakit_id);
                    $('#gejala').multipleSelect('setSelects', html.opt);

                    $('#modalinputpengetahuan').modal('show');
                    $('#action_button').val("Simpan");
                    $('#action').val("Edit");
                }
            })
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
                            url: "{{ url('pengetahuan/hapus') }}" + "/" + id,
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
