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
                                            class="zmdi zmdi-hospital"></i></span> Data Penyakit</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="btntambah"><i
                                            class="fa fa-plus"></i> Tambah Rule</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="tabelrule">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Gejala</th>
                                                <th class="wd-20p border-bottom-0">Ya</th>
                                                <th class="wd-20p border-bottom-0">Tidak</th>
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
                <div class="modal fade" id="modalinputrule" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah rule</h5>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="inputName" class="col-md-3 form-label">Pilih kode Gejala</label>
                                            <select name="kodeg" id="kodeg" class="form-control">
                                                <option value="">Pilih Kode Gejala</option>
                                                @foreach ($gejala as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_gejala }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName" class="form-label">Gejala Sebelumnya</label>
                                            <select name="kodeg1" id="kodeg1" class="form-control">
                                                <option value="">Pilih Kode Gejala</option>
                                                @foreach ($gejala as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_gejala }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="inputName" class="form-label">Jika "YA" , Maka :</label>
                                                <div class="form-group">
                                                    <select id="ya" name="ya" class="form-control select2-show-search form-select"
                                                        data-placeholder="Choose one" style="width: 100%">
                                                        <optgroup label="Data Gejala">
                                                            @foreach ($gejala as $g)
                                                                <option value="{{$g->kode_gejala}}">{{$g->nama_gejala}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Data Penyakit">
                                                            @foreach ($penyakit as $p)
                                                                <option value="{{$p->penyakit_kode}}">{{$p->penyakit_nama}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputName" class="form-label">Jika "TIDAK" , Maka :</label>
                                                <div class="form-group">
                                                    <select id="tidak" name="tidak" class="form-control select2-show-search form-select"
                                                        data-placeholder="Choose one" style="width: 100%">
                                                        <optgroup label="Data Gejala">
                                                            @foreach ($gejala as $g)
                                                                <option value="{{$g->kode_gejala}}">{{$g->nama_gejala}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Data Penyakit">
                                                            @foreach ($penyakit as $p)
                                                                <option value="{{$p->penyakit_kode}}">{{$p->penyakit_nama}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
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
    <script src="{{ asset('assets/plugins/quill/quill.min.js') }}"></script>
    <!-- SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#ya').select2({
                dropdownParent: $('#modalinputrule')
            })

        });
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            ['link', 'image', 'video']
        ];
        var quillModal = new Quill('#sebab', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        var quillModal1 = new Quill('#solusi', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        fill_datatable()

        function fill_datatable() {
            var tabel = $('#tabelrule').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side

                ajax: {
                    url: "{{ route('rule.getDatatable') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'gejala',
                        name: 'gejala'
                    },
                    {
                        data: 'ya',
                        name: 'ya'
                    },
                    {
                        data: 'tidak',
                        name: 'tidak'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });
        }
        $(document).on('click', '#editrule', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('rule/editrule') }}" + "/" + id,
                dataType: "json",
                success: function(html) {

                    console.log(html)
                    $('.modal-title').text("Edit Rules");
                    $('#hidden_id').val(html.data.id);
                    $('#kodeg').val(html.data.gejala_id);
                    $('#kodeg1').val(html.data.parent_id);
                    $("#ya").val(html.data.ya).trigger('change');
                    $("#tidak").val(html.data.tidak).trigger('change');

                    $('#modalinputrule').modal('show');
                    $('#action_button').val("Simpan");
                    $('#action').val("Edit");
                }
            })
        })
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('rule.simpan') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        $('#tabelrule').DataTable().ajax.reload(null, false);
                        swal(
                            'Berhasil',
                            'Data telah berhasil ditambah',
                            'success'
                        );

                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#modalinputrule').modal('hide');
                        }
                        $('#form_result').html(html);
                    }
                })
            }

            if ($('#action').val() == "Edit") {
                $.ajax({
                    url: "{{ route('penyakit.update') }}",
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
                            $('#modalinputrule').modal('hide');
                            $('#tabelrule').DataTable().ajax.reload(null, false);
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
            $('#action_button').val("Tambah penyakit");
            $('#action').val("Add");
            $("#modalinputrule").modal("show")
        })





        $(document).on('click', '#deleterule', function() {
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
                            url: "{{ url('rule/hapusrule') }}" + "/" + id,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(respon) {
                                swal('Berhasil!', 'data tersebut berhasil dihapus', 'success');
                                $('#tabelrule').DataTable().ajax.reload();
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

        function getgejala() {
            $('#search1').select2({
                ajax: {
                    url: '/rule/gejalaselect',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_gejala,
                                    id: item.kode_gejala
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function getgejala1() {
            $('#search2').select2({
                ajax: {
                    url: '/rule/gejalaselect',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_gejala,
                                    id: item.kode_gejala
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function getpenyakit() {
            $('#search1').select2({
                ajax: {
                    url: '/rule/penyakitselect',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.penyakit_nama,
                                    id: item.penyakit_kode
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function getpenyakit1() {
            $('#search2').select2({
                ajax: {
                    url: '/rule/penyakitselect',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.penyakit_nama,
                                    id: item.penyakit_kode
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        function jenis1change(event) {
            event.preventDefault()
            var selectElement = event.target;
            var value = selectElement.value;
            if (value == "G") {
                getgejala()
            }
            if (value == "P") {
                getpenyakit()
            }

        }

        function jenis2change(event) {
            event.preventDefault()
            var selectElements = event.target;
            var values = selectElements.value;
            if (values == "G") {
                getgejala1()
            }
            if (values == "P") {
                getpenyakit1()
            }

        }
    </script>
@endsection
