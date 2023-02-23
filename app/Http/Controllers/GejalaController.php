<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GejalaController extends Controller
{
    public function index()
    {
        return view('gejala');
    }

    public function getDatatable(Request $request)
    {
        $data = DB::table('gejala')->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="editGejala" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteGejala" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
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
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'kode_gejala'        =>  $request->kode,
            'nama_gejala'        =>  $request->nama,
        );

        $inovasi = DB::table('gejala')->insert($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        $data = DB::table('gejala')->where('id',$id)->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'kode_gejala' => $request->kode,
            'nama_gejala' => $request->nama,
        );
        $data = DB::table('gejala')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('gejala')->where('id', $id)->delete();
    }
}
