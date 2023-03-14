@extends('layout.master')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">{{ Session::get('user_app')['name'] }}</h1>
                    <div>
                        <ol class="breadcrumb">

                        </ol>
                    </div>
                </div>
                <!-- ROW OPEN -->
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-primary img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">5</h2>
                                        <p class="text-white mb-0">Total Inovasi </p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-tachometer text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-primary img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">5</h2>
                                        <p class="text-white mb-0">Skor Indeks </p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-tachometer text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- COL END -->
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-danger img-card box-secondary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">10</h2>
                                        <p class="text-white mb-0">Inovasi Inisiatif</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-area-chart text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card  bg-warning img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">10</h2>
                                        <p class="text-white mb-0">Inovasi Uji Coba</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-area-chart text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card  bg-success img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">10</h2>
                                        <p class="text-white mb-0">Inovasi Penerapan</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-area-chart text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="card bg-info img-card box-info-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">83,02</h2>
                                        <p class="text-white mb-0">Total Skor Indeks</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-pie-chart text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <!-- ROW CLOSED -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ranking Inovasi Perangkat Daerag</h3>
                            </div>
                            <div class="card-body">
                                <p>Ranking diurutkan berdasarkan nilai Indeks Inovasi</p>
                                <div class="table-responsive">
                                    <table class="table border text-nowrap text-md-nowrap mb-0">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Perangkat Daerah</th>
                                                <th>Jumlah</th>
                                                <th>Predikat</th>
                                                <th>Total Skor</th>
                                                <th>Indeks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dinas Pendidikan</td>
                                                <td>2</td>
                                                <td><span class="badge bg-primary badge-sm  me-1 mb-1 mt-1">Primary</span>
                                                </td>
                                                <td>97</td>
                                                <td>87,30</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dinas Pendidikan</td>
                                                <td>2</td>
                                                <td><span class="badge bg-primary badge-sm  me-1 mb-1 mt-1">Primary</span>
                                                </td>
                                                <td>97</td>
                                                <td>87,30</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Dinas Pendidikan</td>
                                                <td>2</td>
                                                <td><span class="badge bg-primary badge-sm  me-1 mb-1 mt-1">Primary</span>
                                                </td>
                                                <td>97</td>
                                                <td>87,30</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>
            <!-- ROW-2 CLOSED -->

        </div>
        <!-- CONTAINER CLOSED -->
    </div>
    </div>
@endsection
