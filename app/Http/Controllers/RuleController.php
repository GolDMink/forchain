<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RuleController extends Controller
{
    public function index()
    {
        $gejala = DB::table('gejala')->get();
        $penyakit = DB::table('penyakit')->get();
        return view('rule',compact('gejala','penyakit'));
    }

    public function getDatatable(Request $request)
    {
        $data = DB::table('rules as r')->join('gejala as g', 'g.id', 'r.gejala_id')->select('r.*','g.nama_gejala','g.kode_gejala')->orderBy('r.gejala_id')->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="editrule" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleterule" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->addColumn('gejala', function ($data) {
                $gejala = $data->kode_gejala . '-' . $data->nama_gejala;
                return $gejala;
            })
            ->rawColumns([
                'gejala',
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function simpan(Request $request)
    {
        // return $request->all();

        $form_data = array(
            'gejala_id'        =>  $request->kodeg,
            'parent_id'        =>  $request->kodeg1,
            'ya'        =>  $request->ya,
            'tidak'        =>  $request->tidak,
        );

        $inovasi = DB::table('rules')->insert($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $data = DB::table('rules')->where('id', $id)->first();


        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'gejala_id'        =>  $request->kodeg,
            'parent_id'        =>  $request->kodeg1,
            'ya'        =>  $request->ya,
            'tidak'        =>  $request->tidak,
        );
        $data = DB::table('rule')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('rules')->where('id', $id)->delete();
    }

    public function gejalaselect(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("gejala")
                ->select("id", "nama_gejala")
                ->where('nama_gejala', 'LIKE', "%$search%")
                ->get();
        }else{
            $data = DB::table("gejala")
            ->select("kode_gejala", "nama_gejala")
            ->get();
        }
        return response()->json($data);
    }
    public function penyakitselect(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("penyakit")
                ->select("penyakit_kode", "penyakit_nama")
                ->where('nama_gejala', 'LIKE', "%$search%")
                ->get();
        }else{
            $data = DB::table("penyakit")
            ->select("penyakit_kode", "penyakit_nama")
            ->get();
        }
        return response()->json($data);
    }
}
