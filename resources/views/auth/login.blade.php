@extends('layout.autentikasi')
@section('content')
    <!-- CONTAINER OPEN -->
    <div class="col col-login mx-auto mt-7">
        {{-- <div class="text-center">
        <a href="index.html"><img src="../assets/images/brand/logo-white.png" class="header-brand-img"
                alt=""></a>
    </div> --}}
    </div>

    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form action="{{ route('trueLogin') }}" method="post" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title pb-5">
                    Halaman Login
                </span>
                <p>masukan username dan password dengan benar</p>
                <div class="panel panel-primary">
                    @if ($errors->any())
                        <div class="alert alert-danger text-center" style="width:100%;">
                            <i class="fa fa-exclamation-triangle"></i>
                            @foreach ($errors->all() as $error)
                                <b>{{ $error }}</b>
                            @endforeach
                        </div>
                    @endif
                    <div class="panel-body tabs-menu-body p-0 pt-5">

                        <div class="wrap-input100 validate-input input-group">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="text"
                                value="{{ Request::old('username') }}" name="username" placeholder="Masukan Username">
                        </div>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 border-start-0 form-control ms-0" type="password" name="password"
                                placeholder="Masukan Password">
                        </div>
                        <div class="my-2">
                            <button type="submit" class="login100-form-btn btn-primary">
                                Masuk
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-3">
                <a href="{{route('register')}}" class="text-primary text-center">Belum Punya Akun, <b>Register</b></a>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

@endsection
