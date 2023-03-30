@extends('layout.masters')
@section('css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        label.box {
            display: flex;
            margin-top: 10px;
            padding: 10px 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid #ddd
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third,
        #four:checked~label.forth,
        #five:checked~label.fifth,
        #six:checked~label.sixth,
        #seven:checked~label.seveth,
        #eight:checked~label.eighth {
            border-color: #8e498e
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle,
        #four:checked~label.forth .circle,
        #five:checked~label.fifth .circle,
        #six:checked~label.sixth .circle,
        #seven:checked~label.seveth .circle,
        #eight:checked~label.eighth .circle {
            border: 6px solid #8e498e;
            background-color: #fff
        }

        label.box:hover {
            background: #d5bbf7
        }

        label.box .course {
            display: flex;
            align-items: center;
            width: 100%
        }

        label.box .circle {
            height: 22px;
            width: 22px;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid #ddd;
            display: inline-block
        }

        input[type="radio"] {
            display: none
        }
    </style>
@endsection
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Konsultasi</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Switcher</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Switcher Style-1</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                Form Konsultasi
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form id="postformgejala" method="post">
                                            @csrf
                                            <h2 class="text-center fw-semibold mb-7" id="quest">Isikan Form dibawah ini .</h2>
                                            <h3 class="fw-bold text-center mt-5" id="quest"></h3>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img src="" id="gambargejala" alt="" srcset="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio" value="1" name="box" id="five">
                                                        <label for="five" class="box fifth w-100">
                                                            <div class="course"> <span class="circle"></span> <span
                                                                    class="subject">Ya</span> </div>
                                                        </label>
                                                        <input type="radio" value="0" name="box" id="six">
                                                        <label for="six" class="box sixth w-100">
                                                            <div class="course"> <span class="circle"></span> <span
                                                                    class="subject"> Tidak
                                                                </span> </div>
                                                        </label>
                                                        <div class="d-flex justify-content-center">
                                                            <input type="submit" name="action_button" id="action_button"
                                                                class="btn btn-primary theme-bg gradient btn-block"
                                                                value="Submit" />
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

            </div>
        </div>
    @endsection
    @section('js')
        <script>
            var awal = '{{ $first }}';
            fetchform(awal)

            $('#postformgejala').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('konsultasi.postform') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        if (data.rules) {
                            fetchform(data.rules.kode_gejala)
                        }
                        if (data.hasil) {
                            window.location.href = 'hasilform' + '/' + data.hasil
                        }
                    }
                })
            });

            function fetchform(id) {
                $.ajax({
                    url: "{{ url('konsultasi/getform') }}" + "/" + id,
                    dataType: "json",
                    success: function(html) {
                        console.log(html)

                        $("#quest").html(html.nama_gejala)
                        $("#gambargejala").attr('src', "{{ URL::to('/') }}/gambargejala/" + html.gambar_gejala)
                        $("#five").val(html.ya)
                        $("#six").val(html.tidak)
                    }
                })
            }
        </script>
    @endsection
