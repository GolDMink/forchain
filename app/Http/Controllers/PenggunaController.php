<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function getDatatable()
    {
        $data = DB::table('users')->where('level', 'admin')->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="edituser" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteuser" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
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
            'username'    =>  'required',
            'name'     =>  'required',
            'password'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'username'        =>  $request->username,
            'name'        =>  $request->name,
            'level' => 'admin',
            'password'        =>   bcrypt($request->password)
        );

        $user = User::create($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return response()->json(['data'=>$data]);
    }

    public function update(Request $request)
    {
        $formdata = array(
            'username'        =>  $request->username,
            'name'        =>  $request->name,
            'level' => 'admin',
            'password'        =>   bcrypt($request->password)
        );
        $data = DB::table('users')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapus($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
    }


    // PENGGUNA
    public function getDatatablePenguna()
    {
        $data = DB::table('users')->where('level', 'user')->get();
        return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="edituser" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteuser" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->rawColumns([
                'action',
            ])
            ->addIndexColumn()
            ->make(true);
    }
    public function pengguna()
    {
        return view('user.pengguna');
    }

    public function simpanpengguna(Request $request)
    {
        $rules = array(
            'username'    =>  'required',
            'name'     =>  'required',
            'password'     =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // if($userapp == 'opd'){
        //     $loginopd = ;
        // }
        $form_data = array(
            'username'        =>  $request->username,
            'name'        =>  $request->name,
            'level' => 'user',
            'password'        =>   bcrypt($request->password)
        );

        $user = User::create($form_data);


        return response()->json(['success' => 'Data Added successfully.']);
    }
    public function editpengguna($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return response()->json(['data'=>$data]);
    }

    public function updatepengguna(Request $request)
    {
        $formdata = array(
            'username'        =>  $request->username,
            'name'        =>  $request->name,
            'level' => 'user',
            'password'        =>   bcrypt($request->password)
        );
        $data = DB::table('users')->where('id', $request->hidden_id)->update($formdata);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function hapuspengguna($id)
    {
        $data = DB::table('users')->where('level','user')->where('id', $id)->delete();
    }

}
