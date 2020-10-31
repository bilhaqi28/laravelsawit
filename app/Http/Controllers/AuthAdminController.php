<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AuthAdminController extends Controller
{
    public function loginadmin(){
        return view('pages.login.view_login');    
    }

    public function proseslogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $data = DB::table('tb_admin')->where('username_admin',$username)->where('password_admin',$password)->first();
       
        if(empty($data)){
            return '<script type="text/javascript">alert("Username Atau Password Salah!");window.location="/loginadmin";</script>';
        }else{
            
            $request->session()->put('username',$data->nama_admin);
            
            return redirect('/');
        }
    }

    public function logoutadmin(Request $request){
        $request->session()->forget('username');
        return redirect('/loginadmin');
    }
}
