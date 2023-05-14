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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}">

    <!-- TITLE -->
    <title>forchain – </title>

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
          table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        #example td,
        th {
            border: solid 0.05px;
        }

        #tablettd {
            border: solid 1px white;
        }

        #tablekop {
            border: solid 2px white;
        }

        #table tr td {
            font-size: 10px;
        }
    </style>
</head>

<body onload="window.print()"
    class="app ltr horizontal horizontal-hover default-logo light-mode layout-fullwidth fixed-layout header-light gradient-menu">


    <div class="main-content app-content mt-0">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">

            </div>
            <!-- PAGE-HEADER END -->

            <div class="container-fluid">
                <table width="100%" id="tablekop">
                    <tr>
                        <td width="10%"><img src="{{asset('assets/images/logo.png')}}" width="100" height="100"></td>
                        <td>
                            <font style="font-family: Tahoma; font-size:24px;">AVOMANGO
                            </font>
                            <br>
                            <font style="font-family: Tahoma; font-size:14;"><b>SISTEM PAKAR PENYAKIT BUAH </b></font>
                            <br>
                            <font style="font-family: Tahoma; font-size:10;">Jl. Jend. Basuki Rachmad No. 15 Telp.
                                (0354) 682475 </font><br>
                            <font style="font-family: Tahoma; font-size:10;"><b>KEDIRI</b>
                            </font><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr style="border: 2px solid black;">
                            <hr style="border: 0.3px solid rgb(104, 104, 104); margin-top: -4px;">
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <h3>Cetak Hasil Konsultasi</h3>
                            <div class="card-body">
                                <div class="example">
                                    <dl class="row">
                                        <dt class="col-sm-3">Nama</dt>
                                        <dd class="col-sm-9">: {{ $rule->name }}</dd>
                                        <dt class="col-sm-3">Kode Konsultasi </dt>
                                        <dd class="col-sm-9"> : {{ $rule->kode_konsultasi }}</dd>

                                        <br><br>
                                        <hr>
                                        <dt class="col-sm-3">1. Penyakit</dt>
                                        <dd class="col-sm-9">: {{ $rule->penyakit_nama }}</dd>
                                        <dt class="col-sm-3">2. Penyebab</dt>
                                        <dd class="col-sm-9">: {{ $rule->penyakit_sebab }}</dd>
                                        <dt class="col-sm-3">3. Solusi</dt>
                                        <dd class="col-sm-9">: {{ $rule->penyakit_solusi }}</dd>


                                        <dt class="col-sm-3">4. Gejala</dt>
                                        <dd class="col-sm-9">
                                            {!! $gejala !!}
                                        </dd>

                                    </dl>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center">---- Terimakasih Telah Menggunakan Layanan Kami -----</h5>
                    </div>
                    <!-- COL-END -->
                </div>

            </div>
        </div>

    </div>
    <!-- PAGE -->

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Custom-switcher -->
    <script src="{{ asset('assets/js/custom-swicher.js') }}"></script>

    <!-- Switcher js -->
    <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
</body>

</html>
