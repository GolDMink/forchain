<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenyakitController extends Controller
{
    public function index()
    {
        return view('penyakit');
    }

    public function getDatatable(Request $request)
    {
        $data = DB::table('penyakit')->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="editPenyakit" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deletePenyakit" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->rawColumns([
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }

    public function simpan(Request $request)
    {
        $rules = array(
            'kode'    =>  'required',
            'nama'     =>  'required',
            'sebab'     =>  'required',
            'solusi'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'penyakit_kode'        =>  $request->kode,
            'penyakit_nama'        =>  $request->nama,
            'penyakit_sebab'        =>  $request->sebab,
            'penyakit_solusi'        =>  $request->solusi,
        );

        $inovasi = DB::table('penyakit')->insert($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $data = DB::table('penyakit')->where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'penyakit_kode' => $request->kode,
            'penyakit_nama' => $request->nama,
            'penyakit_sebab' =>  $request->sebab,
            'penyakit_solusi' =>  $request->solusi,
        );
        $data = DB::table('penyakit')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('penyakit')->where('id', $id)->delete();
    }
}
