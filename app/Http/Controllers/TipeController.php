<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TipeController extends Controller
{
    public function index(){
        $data = DB::table('tb_tipe')->get();

        return view('pages.tipe.view_tipe',compact('data'));
    }
}
