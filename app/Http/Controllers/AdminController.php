<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function index(){
        $data = DB::table('tb_admin')->get();
        return view('pages.admin.view_admin',compact('data'));
    }

    public function addAdmin(Request $request){
        $nama_admin = $request->input('nama_admin');
        $username_admin = $request->input('username_admin');
        $password_admin = $request->input('password_admin');

        $id = DB::table('tb_admin')->insertGetId(
            ['nama_admin'=>$nama_admin,'username_admin'=>$username_admin,'password_admin'=>$password_admin]
        );
        $admin = DB::table('tb_admin')->where('id_admin',$id)->first();
        return response()->json($admin);
    }

    public function getAdminById($id_admin){
        $data_admin = DB::table('tb_admin')->where('id_admin',$id_admin)->first();
        return response()->json($data_admin);
    }

    public function editAdmin(Request $request){
        $id_admin = $request->input('id_admin');
        $nama_admin = $request->input('nama_admin');
        $username_admin = $request->input('username_admin');
        $password_admin = $request->input('password_admin');

        $update_admin = DB::table('tb_admin')
                ->where('id_admin',$id_admin)
                ->update(['nama_admin'=>$nama_admin,'username_admin'=>$username_admin,'password_admin'=>$password_admin]);
        if($update_admin){
            $data = DB::table('tb_admin')->where('id_admin',$id_admin)->first();
        }
        return response()->json($data);
    }

    public function deleteAdmin($id_admin){
        $delete_admin =DB::table('tb_admin')->where('id_admin',$id_admin)->delete();
        return response()->json(['success'=>'Data Admin Berhasil Di Delete']);
    }
}
