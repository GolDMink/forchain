<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengetahuanController extends Controller
{
    public function index()
    {
        return view('pengetahuan2');
    }

    public function getDatatable(Request $request)
    {
        $data = DB::table('pengetahuan as pe')
            ->join('gejala as g', 'g.id', 'pe.gejala_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->groupBy('p.penyakit_nama')
            ->select('pe.id', 'p.id as idpenyakit', DB::raw("CONCAT('[',p.penyakit_kode,']','-','[',p.penyakit_nama,']') as nama"), DB::raw('COUNT(pe.gejala_id) as totalgejala'))
            ->get();
        return datatables()->of($data)
            ->addColumn('totalgejala', function ($data) {
                $total = $data->totalgejala . ' Gejala';
                return $total;
            })
            ->addColumn(
                'details_url',
                function ($data) {
                    return route('pengetahuan.details', $data->idpenyakit);
                }
            )
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="delete" id="deletepengetahuan" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->rawColumns([
                'details_url',
                'totalgejala',
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function getgejala($id)
    {
        $data = DB::table('pengetahuan as pe')
            ->join('gejala as g', 'g.id', 'pe.gejala_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->where('pe.penyakit_id', $id)
            ->select(DB::raw("CONCAT('[',g.kode_gejala,']','-','[',g.nama_gejala,']') as nama"), 'g.*')
            ->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="delete" id="deletegejala" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->rawColumns([
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function details($id)
    {
        $data = DB::table('pengetahuan as pe')
            ->join('gejala as g', 'g.id', 'pe.gejala_id')
            ->join('penyakit as p', 'p.id', 'pe.penyakit_id')
            ->where('pe.penyakit_id', $id)
            ->select('p.id as idp','g.id as idg',DB::raw("CONCAT('[',g.kode_gejala,']','-','[',g.nama_gejala,']') as namagejala"))
            ->get();

        return datatables()->of($data)
            ->addColumn('aksi', function ($data) {
                $button = '<button type="button" name="delete" id="deletegejala" data-penyakit="'.$data->idp.'" data-gejala="' . $data->idg . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Hapus Gejala</button>';
                return $button;
            })
            ->rawColumns([
                'aksi',
            ])
            ->make(true);
    }

    public function simpan(Request $request)
    {
        $rules = array(
            'kode'    =>  'required',
            'nama'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'kode_pengetahuan'        =>  $request->kode,
            'nama_pengetahuan'        =>  $request->nama,
        );

        $inovasi = DB::table('pengetahuan')->insert($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $data = DB::table('pengetahuan')->where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'kode_pengetahuan' => $request->kode,
            'nama_pengetahuan' => $request->nama,
        );
        $data = DB::table('pengetahuan')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('pengetahuan')->where('id', $id)->delete();
    }
    public function hapusgejala($idp,$idg)
    {
        $data = DB::table('pengetahuan')
                ->where('penyakit_id', $idp)
                ->where('gejala_id', $idg)
                ->delete();
    }
}
