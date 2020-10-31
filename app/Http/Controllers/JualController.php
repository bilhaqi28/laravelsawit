<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JualController extends Controller
{
    public function index(){
        $data = DB::table('tb_jual')
            ->join('tb_user','tb_jual.id_user','=','tb_user.id_user')
            ->join('tb_bibit','tb_jual.id_bibit','=','tb_bibit.id_bibit')
            ->get();
        return view('pages.jual.view_jual',compact('data'));

    }
}
