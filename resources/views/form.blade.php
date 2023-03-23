{{-- @php
    dd(Session::get('user_app'));
@endphp --}}
<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>SPK – Forward Chaining</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/switcher/demo.css') }}" rel="stylesheet">

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

</head>

<body class="app ltr landing-page horizontal">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="assets/images/brand/logo-white.png" class="header-brand-img desktop-logo"
                                alt="logo">
                            <img src="assets/images/brand/logo-dark.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">
                                        <a class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto ">New User
                                        </a>
                                        <button class="btn ripple btn-min w-sm btn-primary me-2 my-auto btnlogin">Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
                                        <img alt="" class="logo-2" src="assets/images/brand/logo-dark.png">
                                        <img src="assets/images/brand/logo-white.png" class="logo-3" alt="logo">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide"
                                                href="#home"><span class="side-menu__label">Home</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span
                                                    class="side-menu__label">Panduan</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#About"><span
                                                    class="side-menu__label">Tentang</span></a>
                                        </li>

                                    </ul>
                                    <div class="header-nav-right d-none d-lg-flex">
                                        @if (Session::has('user_app'))
                                            <div class="profile">
                                                <h4 class="mr-5"><b>{{ Session::get('user_app')['name'] }}</b></h4>

                                            </div>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;

                                            <button
                                                class="btn ripple btn-min w-sm btn-danger me-2 my-auto d-lg-none d-xl-block d-block"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="dropdown-icon fa fa-sign-out text-white"></i> Logout
                                            </button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                    </div>
                                @else
                                    <button
                                        class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block btnregister">Register
                                    </button>
                                    <button
                                        class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block btnlogin">Masuk
                                    </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
        </div>
    <!-- ROW-8 OPEN -->
    <div class="section bg-landing" id="Blog">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Halaman Konsultasi </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">Isikan Form dibawah ini .</h2>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Form Konsultasi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form id="postformgejala" method="post">
                                    @csrf
                                    <h3 class="fw-bold text-center mt-5" id="quest"></h3>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6"> <input type="radio" value="1"
                                                    name="box" id="five">
                                                <label for="five" class="box fifth w-100">
                                                    <div class="course"> <span class="circle"></span> <span
                                                            class="subject">Ya</span> </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6"> <input type="radio" value="0"
                                                    name="box" id="six">
                                                <label for="six" class="box sixth w-100">
                                                    <div class="course"> <span class="circle"></span> <span
                                                            class="subject"> Tidak
                                                        </span> </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="action_button" id="action_button"
                                        class="btn btn-primary theme-bg gradient" value="Submit" />
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{url('/')}}" target="_blank" class="btn btn-outline-warning pt-2 pb-2"><i
                            class="fe fe-arrow-left me-2 d-inline-flex"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-8 CLOSED -->
    </div>

    <!--app-content open-->
    <div class="main-content mt-0">
        <div class="side-app">



            <footer class="main-footer px-0 pb-0 text-center">
                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        SPK forward Chaining <span id="year"></span> | Rizky Suliazuhro
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- COUNTERS JS-->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counters-1.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('assets/plugins/rating/jquery-rate-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/rating-picker.js') }}"></script>

    <!-- Star Rating-1 Js-->
    <script src="{{ asset('assets/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('assets/plugins/ratings-2/star-rating.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>
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
                    $("#five").val(html.ya)
                    $("#six").val(html.tidak)
                }
            })
        }
    </script>

</body>

</html>
