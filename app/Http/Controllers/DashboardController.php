<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $userapp = Session::get('user_app');
        if($userapp['level'] == 'admin'){
            return view('dashboard',compact('userapp'));
        }else{
            return view('dashboardpeserta',compact('userapp'));
        }
    }
}
