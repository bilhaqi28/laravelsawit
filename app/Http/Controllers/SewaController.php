<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SewaController extends Controller
{
    public function index(){
        $data = DB::table('tb_sewa')
            ->join('tb_user','tb_sewa.id_user','=','tb_user.id_user')
            ->get();
        
        return view('pages.sewa.view_sewa',compact('data'));
    }
}
