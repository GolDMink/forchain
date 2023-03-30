<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('konsultasi');
    }
    public function datatable(Request $request)
    {

        //return response()->json($gejala);
        $user = Session::get('user_app');
        if ($user['level'] == 'admin') {
            $data = DB::table('konsultasi')
                ->join('penyakit', 'penyakit.id', 'konsultasi.penyakit_id')
                ->join('users', 'users.id', 'konsultasi.user_id')
                ->get();
        } else {
            $data = DB::table('konsultasi')
                ->join('penyakit', 'penyakit.id', 'konsultasi.penyakit_id')
                ->join('users', 'users.id', 'konsultasi.user_id')
                ->where('user_id', $user['user_id'])->get();
        }
        return datatables()->of($data)

            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="cetak" id="cetak" data-id="' . $data->id . '" class="btn btn-success btn-sm"><i class="fa fa-print mr-1"></i> Cetak</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteGejala" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->addColumn('gejala', function ($data) {
                $options = '';
                $gejala = DB::table('pengetahuan as p')
                    ->join('gejala as g', 'p.gejala_id', 'g.id')
                    ->where('p.penyakit_id', $data->penyakit_id)
                    ->select('nama_gejala')
                    ->get();
                // here we prepare the options
                foreach ($gejala as $i) {
                    $options .= '<ul class="list-style-1"><li>' . $i->nama_gejala . '</li></ul>';
                }

                $return = $options;

                return $return;
            })
            ->rawColumns([
                'action',
                'gejala'
            ])
            ->addIndexColumn()
            ->make(true);
    }
    public function riwayat()
    {
        return view('riwayatkonsultasi');
    }
    public function form()
    {
        $first = 'G001';
        return view('form', compact('first'));
    }
    public function getform($id)
    {
        $rules = DB::table('rules as r')->join('gejala as g', 'g.id', 'r.gejala_id')->where('kode_gejala', $id)->first();
        return response()->json($rules);
    }

    public function postform(Request $request)
    {
        $rules = DB::table('rules as r')->join('gejala as g', 'g.id', 'r.gejala_id')->where('kode_gejala', $request->box)->first();
        $subst = substr($request->box, 0, 1);
        if ($subst == "P") {
            $hasil = DB::table('penyakit as p')->where('p.penyakit_kode', $request->box)->first();
            $uid = uniqid();
            $user = Session::get('user_app');
            // dd($user);
            $konsultasi = Konsultasi::insert([
                'user_id' => $user['user_id'],
                'kode_konsultasi' => $uid,
                'penyakit_id' => $hasil->id
            ]);
            return response()->json(['hasil' => $uid]);
        } else {
            return response()->json(['rules' => $rules]);
        }
    }

    function hasil($id)
    {
        $hasil = DB::table('penyakit as p')->where('p.penyakit_kode', $id)->first();
        $rule = DB::table('konsultasi')
            ->join('penyakit', 'penyakit.id', 'konsultasi.penyakit_id')
            ->join('users', 'users.id', 'konsultasi.user_id')
            ->where('kode_konsultasi', $id)->first();
        $gejala = DB::table('pengetahuan as p')
            ->join('gejala as g', 'p.gejala_id', 'g.id')
            ->where('p.penyakit_id', $rule->penyakit_id)
            ->get();
        return view('hasil', compact('rule', 'gejala'));
    }
}
