<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    public function index(){
        $data = DB::table('tb_transaksi')
            ->join('tb_pembelian','tb_transaksi.id_pembelian','=','tb_pembelian.id_pembelian')
            ->join('tb_user','tb_pembelian.id_user','=','tb_user.id_user')
            ->join('tb_jual','tb_pembelian.id_jual','=','tb_jual.id_jual')
            ->get();

        return view('pages.transaksi.view_transaksi',compact('data'));
    }
}
