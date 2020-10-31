<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LahanController extends Controller
{
    public function index(){
        $data = DB::table('tb_lahan')
            ->join('tb_user','tb_lahan.id_user','=','tb_user.id_user')
            ->get();
        return view('pages.lahan.view_lahan',compact('data'));
    }
}
