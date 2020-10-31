<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AdminApiController extends Controller
{
    public function get_all_data()
    {
        $data = DB::table('tb_admin')->get();
        return  $data;
    }

    public function store_data(Request $request){

        $rules = array(
            'nama_admin'=>'required',
            'username_admin'=>'required|min:7|max:12',
            'password_admin'=>'required|min:7|max:12'
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{

        $nama_admin = $request->input('nama_admin');
        $username_admin = $request->input('username_admin');
        $password_admin = $request->input('password_admin');
        $query = DB::table('tb_admin')->insert(
            ['nama_admin'=>$nama_admin,
            'username_admin'=>$username_admin,
            'password_admin'=>$password_admin
            ]
        );
        
        if(empty($query)){
            return ["result"=>"Data Failed To Save Database"];
        }else{
            return ["result"=>"Data Success To Save Database"];
        }
    }
    }

    public function get_spesifik_data($id_admin){
        $data = DB::table('tb_admin')->where('id_admin',$id_admin)->get();
        return $data;
    }

    public function update_data(Request $request){
        $id_admin = $request->input('id_admin');
        $nama_admin = $request->input('nama_admin');
        $username_admin =$request->input('username_admin');
        $password_admin = $request->input('password_admin');

        $update = DB::table('tb_admin')->where('id_admin',$id_admin)->update([
            'nama_admin'=>$nama_admin,
            'username_admin'=>$username_admin,
            'password_admin'=>$password_admin
        ]);
        if(empty($update)){
            return ["result"=>"Data Failed To Edit"];
        }else{
            return ["result"=>"Data Success To Edit"];
        }
    }

    public function delete_data($id_admin){
        $delete = DB::table('tb_admin')->where('id_admin',$id_admin)->delete();
        if(empty($delete)){
            return ["result"=>"Data Failed To Delete"];
        }else{
            return ["result"=>"Data Success To Delete"];
        }
    }

    public function search_data($nama_admin){
        $nama = strval($nama_admin);
        $search = DB::table('tb_admin')->where('username_admin','like','%'.$nama.'%')->get();
        return $search;
    }
}
