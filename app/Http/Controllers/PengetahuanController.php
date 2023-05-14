<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengetahuanController extends Controller
{
    public function index()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('pengetahuan2', compact('penyakit', 'gejala'));
    }

    public function getDatatable(Request $request)
    {
        $data = DB::table('pengetahuan as pe')
            ->join('gejala as g', 'g.id', 'pe.gejala_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->groupBy('p.penyakit_nama')
            ->select('pe.id', 'p.id as idpenyakit', 'gejala_id', 'pe.kode_rule', DB::raw("CONCAT('[',p.penyakit_kode,']','-','[',p.penyakit_nama,']') as nama"), DB::raw('COUNT(pe.gejala_id) as totalgejala'))
            ->get();
        return datatables()->of($data)
            ->addColumn('totalgejala', function ($data) {
                $gejalas = explode(',', $data->gejala_id);
                $total = count($gejalas) . ' Gejala';
                return $total;
            })
            ->addColumn(
                'details_url',
                function ($data) {
                    return route('pengetahuan.details', $data->id);
                }
            )
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="editpengetahuan" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-pencil mr-1"></i> edit</button>';
                $button .= '&nbsp;';
                $button .= '<button type="button" name="delete" id="deletepengetahuan" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->addColumn('datagejala', function ($data) {

                $gejalaId = explode(',', $data->gejala_id);
                $datagejala = DB::table('gejala')->whereIn('id', $gejalaId)->get();
                $html = '';
                // here we prepare the options
                foreach ($datagejala as $i) {
                    $html .= '<li>'.'['.$i->kode_gejala.']' .' - '.$i->nama_gejala.'</li>';
                }

                $return =
                    '<ol>' . $html. '</ol>';

                return $return;
            })
            ->rawColumns([
                'details_url',
                'datagejala',
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    // public function getgejala($id)
    // {
    //     $data = DB::table('pengetahuan as pe')
    //         ->join('gejala as g', 'g.id', 'pe.gejala_id')
    //         ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
    //         ->where('pe.id', $id)
    //         ->select(DB::raw("CONCAT('[',g.kode_gejala,']','-','[',g.nama_gejala,']') as nama"), 'g.*')
    //         ->get();
    //     return datatables()->of($data)
    //         ->addColumn('action', function ($data) {
    //             $button = '<button type="button" name="delete" id="deletegejala" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
    //             return $button;
    //         })
    //         ->rawColumns([
    //             'action',
    //         ])
    //         ->addIndexColumn()
    //         ->make(true);
    // }

    // public function details($id)
    // {

    //     $data = DB::table('pengetahuan as pe')
    //         ->where('pe.id', $id)
    //         ->select('pe.gejala_id', 'pe.id as ids')
    //         ->get();
    //     foreach ($data as $i) {
    //         $gejalaId = explode(',', $i->gejala_id);
    //         $datagejala = DB::table('gejala')->whereIn('id', $gejalaId)->get();
    //     }

    //     return datatables()->of($datagejala)
    //         ->addColumn('gejala', function ($datagejala) {
    //             return $datagejala->kode_gejala . " - " . $datagejala->nama_gejala;
    //         })
    //         ->addColumn('aksi', function ($datagejala) use ($data) {
    //             $button = '<button type="button" name="delete" id="deletegejala" data-pengetahuan="' . $data->ids . '" data-gejala="' . $datagejala->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Hapus Gejala</button>';
    //             return $button;
    //         })
    //         ->rawColumns([
    //             'aksi',
    //             'gejala'
    //         ])

    //         ->make(true);
    // }

    public function simpan(Request $request)
    {
        // return $request->all();
        $rules = array(
            'rule'    =>  'required',
            'penyakit'    =>  'required',
            'gejala'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'kode_rule'        =>  $request->rule,
            'penyakit_id'        =>  $request->penyakit,
            'gejala_id'        =>  implode(',', $request->gejala)
        );

        $inovasi = DB::table('pengetahuan')->insert($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $data = DB::table('pengetahuan')->where('id', $id)->first();
        foreach($data as $i){
            $opt = explode(',',$data->gejala_id);
        }
        return response()->json(['data' => $data,'opt'=>$opt]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'kode_rule' => $request->rule,
            'penyakit_id' => $request->penyakit,
            'gejala_id' => implode(',', $request->gejala)
        );
        $data = DB::table('pengetahuan')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('pengetahuan')->where('id', $id)->delete();
    }

}
