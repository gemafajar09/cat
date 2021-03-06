<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->rules = array(
            'user_nik' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'user_password' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        );
    }

    public function index(Request $r)
    {
        if ($r->session()->has('user_id')) 
        {
            return redirect("home");
        }
        else
        {
            return view('frontend/page/login/index');
        }
    }

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $user_nik = $r->user_nik;
            $user_password = hash("sha512", md5($r->user_password));
    
            $cek = DB::table('tb_user')->where('user_nik',$user_nik)->where('user_password',$user_password)->first();
            if($cek == TRUE)
            {
                $r->session()->put("user_id", $cek->user_id);
                $r->session()->put("user_nik", $cek->user_nik);
                $r->session()->put("user_nama", $cek->user_nama);
                return redirect('home')->with('pesan','Selamat Datang');
            }else{
                return back()->with('error','Silahkan Login Kembali');
            }
        }
    }

    public function daftar()
    {
        return view('frontend/page/login/register');
    }

    public function register(Request $r)
    {
        $user_nik = $r->user_nik;
        $user_nama = $r->user_nama;
        $user_no_hp = $r->user_no_hp;
        $user_email = $r->user_email;
        $user_password = $r->user_password;
        $user_password1 = $r->user_password1;
        if($user_password == $user_password1)
        {
            $pass = hash("sha512", md5($r->user_password));
            DB::table('tb_user')->insert([
                'user_nik' => $user_nik,
                'user_nama' => $user_nama,
                'user_no_hp' => $user_no_hp,
                'user_email' => $user_email,
                'user_password' => $pass,
                'user_password1' => $user_password1,
            ]);

            return back()->with('pesan','Data Berhasil Di Inputkan.');
        }else{
            return back()->with('pesan','Data Gagal Di Inputkan.');
        }
    }

    public function logout(Request $r)
    {
    	$r->session()->forget('user_id');
    	$r->session()->forget('user_nik');
        $r->session()->forget('user_nama');
        $r->session()->flush();
    	return redirect("/")->with('pesan', 'Success Logout.');
    }

    // login android
    public function loginApp(Request $r)
    {
        $validator = Validator::make($r->all(),$this->rules);
        if($validator->fails()){
            return response()->json(['pesan' => 'Silahkan Login Kembali']);
        }else{
            $user_nik = $r->user_nik;
            $user_password = hash("sha512", md5($r->user_password));
    
            $cek = DB::table('tb_user')->where('user_nik',$user_nik)->where('user_password',$user_password)->first();
            if($cek == TRUE)
            {
                $data = array(
                    'user_nik' => $cek->user_nik,
                    'user_nama' => $cek->user_nama,
                    'user_id' => $cek->user_id
                );
                return response()->json(
                        array(
                            'status' => true,
                            'pesan' => 'Login Berhasil',
                            'data' => $data
                        )
                    );
            }else{
                $data = array(
                    'user_nik' => '',
                    'user_nama' => '',
                    'user_id' => ''
                );
                return response()->json(
                    array(
                        'status' => false,
                        'pesan' => 'Login Gagal',
                    )
                );
            }
        }
    }
}
