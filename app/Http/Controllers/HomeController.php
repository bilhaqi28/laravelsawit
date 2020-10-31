<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $admin = DB::table('tb_admin')->count();
        $beli = DB::table('tb_beli')->count();
        $bibit = DB::table('tb_bibit')->count();
        $jenis_user = DB::table('tb_jenis_user')->count();
        $jual = DB::table('tb_jual')->count();
        $lahan = DB::table('tb_lahan')->count();
        $pembelian = DB::table('tb_pembelian')->count();
        $penawaran = DB::table('tb_penawaran')->count();
        $rek = DB::table('tb_rek')->count();
        $sewa = DB::table('tb_sewa')->count();
        $tipe = DB::table('tb_tipe')->count();
        $transaksi = DB::table('tb_transaksi')->count();
        $user = DB::table('tb_user')->count();
        
        return view('home',compact('admin','beli','bibit','jenis_user','jual','lahan','pembelian','rek','sewa','tipe','transaksi','user','penawaran'));



    }
}
