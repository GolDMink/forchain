<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Konsultasi;
use App\Models\Pengetahuan;
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
                ->join('pengetahuan as pe', 'pe.id', 'konsultasi.rule_id')
                ->join('penyakit', 'penyakit.id', 'pe.penyakit_id')
                ->join('users', 'users.id', 'konsultasi.user_id')
                ->select('konsultasi.*', 'pe.*', 'penyakit.*', 'users.*', 'konsultasi.id as idkonsultasi')
                ->where('user_id', $user['user_id'])->get();
        }
        return datatables()->of($data)

            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="cetak" id="cetak" data-id="' . $data->idkonsultasi . '" class="btn btn-success btn-sm"><i class="fa fa-print mr-1"></i> Cetak</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteGejala" data-id="' . $data->idkonsultasi . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
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
        $gejala = Gejala::all();
        return view('form1', compact('gejala'));
    }
    public function getform($id)
    {
        $rules = DB::table('rules as r')->join('gejala as g', 'g.id', 'r.gejala_id')->where('kode_gejala', $id)->first();
        return response()->json($rules);
    }

    public function postforms(Request $request)
    {
        $input = $request->all();
        $y = 1;
        $filterinput = array_keys(array_filter($input, function ($value) use ($y) {
            return $value == $y;
        }));
        $val = implode(',', $filterinput);
        // $rules = DB::table('pengetahuan');
        // foreach($filterinput as $i){

        // }
        $hasil = DB::table('pengetahuan as pe')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->select('p.*', 'pe.id as idpengetahuan', 'pe.gejala_id')
            ->where('gejala_id', $val)
            ->first();

        //dd($hasil);
        if ($hasil !== null) {
            $uid = uniqid();
            $user = Session::get('user_app');
            // dd($user);
            $konsultasi = Konsultasi::insert([
                'user_id' => $user['user_id'],
                'kode_konsultasi' => $uid,
                'rule_id' => $hasil->idpengetahuan
            ]);


            return redirect()->route('konsultasi.hasil', $uid);
        } else {
            return back()->with('error', 'error!');
        }
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
        $rule = DB::table('konsultasi as k')
            ->join('pengetahuan as pe', 'pe.id', 'k.rule_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->join('users as u', 'u.id', 'k.user_id')
            ->select('k.*', 'p.*', 'pe.*', 'u.*', 'k.id as idkonsultasi')
            ->where('k.kode_konsultasi', $id)->first();
        $gejalaId = explode(',', $rule->gejala_id);
        $datagejala = DB::table('gejala')->whereIn('id', $gejalaId)->get();
        $html = '';
        // here we prepare the options
        foreach ($datagejala as $i) {
            $html .= '<li>' . '[' . $i->kode_gejala . ']' . ' - ' . $i->nama_gejala . '</li>';
        }

        $gejala =
            '<ol>' . $html . '</ol>';



        // dd($gejala);

        return view('hasil', compact('rule', 'gejala'));
    }
    public function cetak($id)
    {
        $rule = DB::table('konsultasi as k')
            ->join('pengetahuan as pe', 'pe.id', 'k.rule_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->join('users as u', 'u.id', 'k.user_id')
            ->select('k.*', 'p.*', 'pe.*', 'u.*', 'k.id as idkonsultasi')
            ->where('k.id', $id)->first();
        $gejalaId = explode(',', $rule->gejala_id);
        $datagejala = DB::table('gejala')->whereIn('id', $gejalaId)->get();
        $html = '';
        // here we prepare the options
        foreach ($datagejala as $i) {
            $html .= '<li>' . '[' . $i->kode_gejala . ']' . ' - ' . $i->nama_gejala . '</li>';
        }

        $gejala =
            '<ol>' . $html . '</ol>';

        return view('cetak', compact('rule', 'gejala'));
    }
}
