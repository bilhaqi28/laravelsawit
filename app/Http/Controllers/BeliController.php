<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BeliController extends Controller
{
    public function index(){
        $data = DB::table('tb_beli')
                ->join('tb_user','tb_beli.id_user','=','tb_user.id_user')
                ->join('tb_bibit','tb_beli.id_bibit','=','tb_bibit.id_bibit')
                ->get();
        return view('pages.beli.view_beli',compact('data'));
    }
    
}
