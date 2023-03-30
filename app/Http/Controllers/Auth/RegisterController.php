<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    function generateRandomString($length = 80)
    {
        $karakkter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakkter);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $karakkter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }

    protected function register(Request $request)
    {
       if($request->jenis == 'peserta'){
        $user = User::create([
            'level' => 'peserta',
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);
        $userid = $user->id;

        $login = DB::table('login')->insert([
            'user_id' => $userid,
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);
        $request_token['token'] = $this->generateRandomString();

        DB::table('login')->where("username", '=', $request['username'])->update($request_token);
        $getLogin = DB::table('v_login')->where('username', '=', $request['username'])->first();

        session::put('user_app', (array)$getLogin);

        return redirect()->route('dashboard');
       }

    }

    protected function authenticated(Request $request, $user)
    {
        $data = session::get('user_app');
        // dd($data);yes
        Session::put([
            'userData' => [
                'name'     => $data['name'],
                'username' => $data['username'],
            ],
        ]);
    }
}
