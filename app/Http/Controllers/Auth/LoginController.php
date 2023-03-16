<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Where to redirect users after login.
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
        // $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
	{
		return $request->only($this->username(), 'password');
    }
    public function toLogin(Request $request)
    {
        return view('auth.login');
    }

    private function validate_input($request, $id = null)
	{
    $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    $customMessages = [
        'required' => ':attribute tidak boleh kosong'
    ];

    $this->validate($request, $rules, $customMessages);

		return Validator::make($request->all(), $rules, $customMessages);
    }

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

	protected function trueLogin(Request $request)
    {
		$user = array();
        if ($request->isMethod('get')) {
			return redirect('login');
		}

		$validation = $this->validate_input($request);
        // dd($validation);
		if ($validation->fails()) {
			return Redirect::back()->withErrors(['msg' => 'Kolom inputan tidak boleh kosong!']);
			return response()->json(['success' => 'Kolom inputan tidak boleh kosong!']);
			// return redirect('login')->withErrors($validation)->withInput();
		}

		$username = trim($request->username);
		$password = trim($request->password);

        $getLogin = DB::table('users')->where('username','=',$username);

        if($getLogin->exists()){
            $user = $getLogin->first();

            if (Hash::check($password, $user->password)) {

                $data_token['token'] = $this->generateRandomString();

                DB::table('users')->where("username",'=',$username)->update($data_token);

                session::put('user_app', (array)$user);
                $session = session::get('user_app');
                if($session['level'] == 'peserta'){
                    return redirect('/')->with('session',$session);
                }else{
                    return redirect('dashboard');
                }

            } else {
                return Redirect::back()->withErrors(['msg' => 'Password salah'])->withInput();;
            }
        }else{
            return Redirect::back()->withErrors(['msg' => 'Username tidak ditemukan']);
        }


    }
    protected function authenticated(Request $request, $user)
	{
		$data= session::get('user_app');
        // dd($data);yes
		Session::put([
			'userData' => [
				'nama'     => $data['nama'],
				'username' => $data['username'],
			],
		]);
	}

	// protected function sendFailedLoginResponse(Request $request)
	// {
	// 	throw ValidationException::withMessages([
	// 		$this->username() => ['Username/Password anda salah!'],
	// 	]);
	// }

}
