<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BibitController extends Controller
{
    public function index(){
        $data = DB::table('tb_bibit')->get();
        return view('pages.bibit.view_bibit',compact('data'));
    }
}
