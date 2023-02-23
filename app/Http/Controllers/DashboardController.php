<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $userapp = Session::get('user_app');
        return view('dashboard',compact('userapp'));
    }
}
