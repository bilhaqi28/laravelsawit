<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JenisUserController extends Controller
{
    public function index(){
        $data = DB::table('tb_jenis_user')->get();
        return view('pages.jenisuser.view_jenisuser',compact('data'));
    }
}
