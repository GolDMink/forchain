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
                <!-- Row -->
            </div>
            <!-- ROW-2 CLOSED -->

        </div>
        <!-- CONTAINER CLOSED -->
    </div>
    </div>
@endsection
