@extends('layout.masters')
@section('css')

@endsection
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Konsultasi</h1>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail hasil Konsultasi</h3>
                                    <div class="card-options">
                                        <button class="btn btn-primary push-end"> <i class="fa fa-print"></i> Cetak</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="example">
                                        <dl class="row">
                                            <dt class="col-sm-3">Nama</dt>
                                            <dd class="col-sm-9">:  {{$rule->name}}</dd>
                                            <dt class="col-sm-3">Kode Konsultasi </dt>
                                            <dd class="col-sm-9"> : {{ $rule->kode_konsultasi }}</dd>
                                            <br><br>
                                            <hr>
                                            <dt class="col-sm-3">1. Penyakit</dt>
                                            <dd class="col-sm-9">:  {{$rule->penyakit_nama}}</dd>
                                            <dt class="col-sm-3">2. Penyebab</dt>
                                            <dd class="col-sm-9">:  {{$rule->penyakit_sebab}}</dd>
                                            <dt class="col-sm-3">3. Solusi</dt>
                                            <dd class="col-sm-9">:  {{$rule->penyakit_solusi}}</dd>

                                            <dt class="col-sm-3">4. Gejala</dt>
                                            <dd class="col-sm-9">
                                                <ul class="list-group">
                                                    @foreach ($gejala as $item)
                                                        <li class="listunorder">{{$item->nama_gejala}}</li>

                                                    @endforeach
                                                </ul>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @section('js')

    @endsection
