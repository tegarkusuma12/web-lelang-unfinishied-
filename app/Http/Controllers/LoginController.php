<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //LOGOUT
    public function logoutPost(){
        Session::flush();
        return redirect('/')->with('alert','Anda telah Logout');
    }

    //MASYARAKAT
    public function viewLoginMasyarakat()
    {
        //kalau belum login
        if(!Session::get('login')){
            //masuk ke
            return view('login.loginMAsyarakat');
        }
        else{
            //kalau sudah
            if (!Session::get('id_level')) {
                return redirect('masyarakat/home');
            }
            else{
                return redirect('/');
            } 
        }
    }
    
    public function loginPostMasyarakat(Request $request)
    {
        //ambil data dari input
        $username = $request->username;
        $pass = $request->pass;

        //cek username di database dgn yg diinputkan
        $data = \App\Masyarakat::where('username',$username)->first();
        if($data){
            //cek password
            if(Hash::chech($pass,$data->pass)){
                //mengambil data user
                //ini untuk mengambil data si user yg udah di cek terus di jadiin publik atau global
    			Session::put('id_user',$data->id_user);
    			Session::put('nama_lengkap',$data->nama_lengkap);
    			Session::put('username',$data->username);
    			Session::put('pass',$data->pass);
				Session::put('telp',$data->telp);
                //PENTING
                Session::put('login',TRUE);
                //ke halaman home
                return redirect('masyarakat/home')->with('alert-success','Berhasil Login');
            }else{
                //kalau salah
                return redirect('masyarakat/login')->with('alert','Password atau Username salah!');
            }

        }else{
            //kalau salah
            return redirect('masyarakat/login')->with('alert','Password atau Username salah!');
        }
    }

}
