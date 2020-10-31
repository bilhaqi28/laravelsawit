<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PenawaranController extends Controller
{
    public function index(){
        $data = DB::table('tb_penawaran')
            ->join('tb_user','tb_penawaran.id_user','=','tb_user.id_user')
            ->join('tb_beli','tb_penawaran.id_beli','=','tb_beli.id_beli')
            ->join('tb_jual','tb_penawaran.id_jual','=','tb_jual.id_jual')
            ->get();
        return view('pages.penawaran.view_penawaran',compact('data'));
    }
}
