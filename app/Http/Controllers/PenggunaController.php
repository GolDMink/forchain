<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function getDatatablePenguna()
    {
        $data = DB::table('users')->get();
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
    public function indexadmin(){
        if (request()->ajax())
        {
            return datatables()->of(User::where('level','admin')->get())
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="edit" id="editUser" data-id="' . $data->id . '" class="btn btn-warning btn-sm"><i class="fa fa-edit mr-1"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="deleteUser" data-id="' . $data->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash mr-1"></i> Delete</button>';
                return $button;
            })
            ->rawColumns([
                'action',
            ])
            ->addIndexColum()
            ->make(true);
        }
        return view('user.useradmin');
    }
}
