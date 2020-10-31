<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TbUserController extends Controller
{
    public function index(){
        $data = DB::table('tb_user')
            ->join('tb_jenis_user','tb_user.jenis_user','=','tb_jenis_user.id_jenis')
            ->get();
        
        return view('pages.user.view_user',compact('data')); 

    }
}
