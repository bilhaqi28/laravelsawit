<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PembelianController extends Controller
{
    public function index(){
        $cek_bukti = DB::table('tb_pembelian')
                ->join('tb_user','tb_pembelian.id_user','=','tb_user.id_user')
                ->join('tb_jual','tb_pembelian.id_jual','=','tb_jual.id_jual')
                ->join('tb_status_pembelian','tb_pembelian.status_pembelian','=','tb_status_pembelian.id_status')
                ->join('tb_transaksi','tb_pembelian.id_pembelian','=','tb_transaksi.id_pembelian')
                ->where('status_pembelian','=','1')
                ->get();
        $belum_bayar = DB::table('tb_pembelian')
                ->join('tb_user','tb_pembelian.id_user','=','tb_user.id_user')
                ->join('tb_jual','tb_pembelian.id_jual','=','tb_jual.id_jual')
                ->join('tb_status_pembelian','tb_pembelian.status_pembelian','=','tb_status_pembelian.id_status')
                ->where('status_pembelian','=','0')
                ->get();
        $sedang_proses = DB::table('tb_pembelian')
                ->join('tb_user','tb_pembelian.id_user','=','tb_user.id_user')
                ->join('tb_jual','tb_pembelian.id_jual','=','tb_jual.id_jual')
                ->join('tb_status_pembelian','tb_pembelian.status_pembelian','=','tb_status_pembelian.id_status')
                ->where('status_pembelian','=','2')
                ->get();
        $proses_selesai = DB::table('tb_pembelian')
                ->join('tb_user','tb_pembelian.id_user','=','tb_user.id_user')
                ->join('tb_jual','tb_pembelian.id_jual','=','tb_jual.id_jual')
                ->join('tb_status_pembelian','tb_pembelian.status_pembelian','=','tb_status_pembelian.id_status')
                ->where('status_pembelian','=','3')
                ->get();         
        return view('pages.pembelian.view_pembelian',compact('cek_bukti','belum_bayar','sedang_proses','proses_selesai'));
    }


    public function accept($id_pembelian){
        $accept = DB::table('tb_pembelian')
                ->where('id_pembelian','=',$id_pembelian)
                ->update(['status_pembelian'=>'2']);
                if (empty($accept)){
                    return redirect('/pembelian/view_pembelian')->with('error','Data Di tolak');
                }else{
                    return redirect('/pembelian/view_pembelian')->with('sukses','Data Di Terima');
                }
    }

    public function discard($id_pembelian){
        $discard = DB::table('tb_pembelian')
                ->where('id_pembelian','=',$id_pembelian)
                ->update(['status_pembelian'=>'4']);
                if (!empty($discard)){
                    return redirect('/pembelian/view_pembelian')->with('Sukses','Data Telah Di tolak');
                }else{
                    return redirect('/pembelian/view_pembelian')->with('error','Error');
                }
    }
}
