@extends('layout.masters')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Konsultasi</h1>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                Form Konsultasi
                            </div>
                            <div class="card-body">
                                @if (Session::has('error'))
                                    <input type="hidden" id="err" value="1">
                                @else
                                    <input type="hidden" id="err" value="0">
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        <form id="postformgejala" method="post"
                                            action="{{ route('konsultasi.postforms') }}">
                                            @csrf
                                            <h3 class="fw-semibold mb-5" id="quest">Isikan Form dibawah ini
                                                .</h3>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($gejala as $item)
                                                <div class="form-group">

                                                    <p class="fw-bold">{{ $no++ }}. {{ $item->nama_gejala }}
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-check">
                                                                        <div class="form-check-label">
                                                                            <input type="radio" name="{{ $item->id }}"
                                                                                id="a1" class="form-check-input"
                                                                                value="1">Ya
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-check">
                                                                        <div class="form-check-label">
                                                                            <input type="radio" name="{{ $item->id }}"
                                                                                id="a1" class="form-check-input"
                                                                                value="0">Tidak
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                            <div class="my-3"></div>
                                            <div class="d-flex justify-content-center">
                                                <input type="submit" name="action_button" id="action_button"
                                                    class="btn btn-primary theme-bg gradient btn-block" value="Submit" />
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-warning pt-2 pb-2"><i
                        class="fe fe-arrow-left me-2 d-inline-flex"></i>Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalerror" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-close fs-70 text-danger lh-1 my-4 d-inline-block"></i>
                    <h4 class="text-danger mb-20">Ooops...</h4>
                    <p class="mb-4 mx-4">Mohon Maaf Sistem Kami belum mengenali Penyakit dengan gejala
                        tersebut </p>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var err = $("#err").val()
            if (err == 1) {
                $("#modalerror").modal("show")
            }
        });
    </script>
@endsection
