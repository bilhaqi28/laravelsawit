<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RekeningController extends Controller
{
    public function index(){
        $data = DB::table('tb_rek')->get();
        return view('pages.rekening.view_rekening',compact('data'));
    }

    public function store(Request $request){
        $no_rek = $request->input('no_rek');
        $bank_rek = $request->input('bank_rek');
        $atasnama_rek = $request->input('atasnama_rek');

        $add = DB::table('tb_rek')->insert(
            ['no_rek'=>$no_rek,'bank_rek'=>$bank_rek,'atasnama_rek'=>$atasnama_rek]
        );

        if (empty($add)){
            return redirect('/rekening/view_rekening')->with('error','Data Gagal Ditambahkan');
        }else{
            return redirect('/rekening/view_rekening')->with('sukses','Data Berhasil Ditambahkan');
        }
    }

    public function delete($id_rekening){
        $delete = DB::table('tb_rek')->where('id_rek',$id_rekening)->delete();
        if (empty($delete)){
            return redirect('/rekening/view_rekening')->with('error','Data Gagal Dihapus');
        }else{
            return redirect('/rekening/view_rekening')->with('sukses','Data Berhasil Dihapus');
        }
    }

    public function view_edit($id_rekening){
        $data = DB::table('tb_rek')->where('id_rek',$id_rekening)->get();
        return view('pages.rekening.view_edit',compact('data'));
    }

    public function edit(Request $request){
        $id_rek = $request->input('id_rek');
        $no_rek = $request->input('no_rek');
        $bank_rek = $request->input('bank_rek');
        $atasnama_rek = $request->input('atasnama_rek');
        
        $update = DB::table('tb_rek')
                ->where('id_rek',$id_rek)
                ->update(['no_rek'=>$no_rek,'bank_rek'=>$bank_rek,'atasnama_rek'=>$atasnama_rek]);

        if (empty($update)){
            return redirect('/rekening/view_edit/$id_rek')->with('error','Data Gagal Diedit');
        }else{
            return redirect('/rekening/view_rekening')->with('sukses','Data Berhasil Diedit');
        }
        
    }
}
