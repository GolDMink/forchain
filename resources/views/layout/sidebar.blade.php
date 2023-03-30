<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                <img src="assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logopemkot1.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Menu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-package"></i><span
                        class="side-menu__label">Data Master</span><i
                        class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu mega-slide-menu">
                        <li class="side-menu-label1"><a href="">Data Master</a></li>
                        <div class="mega-menu">
                            <div class="">
                                <ul>
                                    <li><a href="{{route('gejala.index')}}" class="slide-item"> Data Gejala</a></li>
                                    <li><a href="{{route('penyakit.index')}}" class="slide-item"> Data Penyakit</a></li>
                                    <li><a href="{{route('pengetahuan.index')}}" class="slide-item"> Data Pengetahuan</a></li>
                                    <li><a href="{{route('rule.index')}}" class="slide-item"> Data Rule</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                        class="side-menu__icon fe fe-users"></i><span
                        class="side-menu__label">Data Penggguna</span><i
                        class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu mega-slide-menu">
                        <li class="side-menu-label1"><a href="">Data Pengguna</a></li>
                        <div class="mega-menu">
                            <div class="">
                                <ul>
                                    <li><a href="{{route('user.index')}}" class="slide-item"> User Sistem</a></li>
                                    <li><a href="{{route('pengguna.index')}}" class="slide-item"> Pengguna Sistem </a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>

                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('konsultasi.riwayat') }}"><i
                            class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Riwayat Konsultasi</span></a>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
