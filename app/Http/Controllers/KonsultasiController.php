<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KonsultasiController extends Controller
{
    public function form()
    {
        $first = 'G001';
        return view('form',compact('first'));
    }
    public function getform($id)
    {
        $rules = DB::table('rules as r')->join('gejala as g','g.id','r.gejala_id')->where('kode_gejala',$id)->first();
        return response()->json($rules);
    }

    public function postform(Request $request)
    {
        $rules = DB::table('rules as r')->join('gejala as g','g.id','r.gejala_id')->where('kode_gejala',$request->box)->first();
        $subst = substr($request->box,0,1);
        if($subst == "P" ){
            return response()->json(['hasil'=>$request->box]);
        }else{
            return response()->json(['rules'=>$rules]);
        }
    }

    function hasil($id)
    {
        $hasil = DB::table('penyakit as p')->where('p.penyakit_kode',$id)->first();
        $uid = uniqid();
        $user = Session::get('user_app');
        $konsultasi = DB::table('konsultasi')->insert([
            'user_id'=>$user['user_id'],
            'kode_konsultasi' => $uid,
            'penyakit_id' => $hasil->id
        ]);

        return view('hasil',compact('hasil'));
    }

}
