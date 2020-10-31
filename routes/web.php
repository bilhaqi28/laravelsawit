<?php
use Illuminate\Support\Facades\Route;
// controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\BibitController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TbUserController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'hakakses'], function () {
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[HomeController::class,'index']);

Route::group(['prefix'=>'admin'],function(){
    Route::get('/view_admin',[AdminController::class,'index']);
    Route::post('/add_admin',[AdminController::class,'addAdmin'])->name('admin.add');
    Route::get('/edit_admin/{id_admin}',[AdminController::class,'getAdminById']);
    Route::post('/edit_admin',[AdminController::class,'editAdmin']);
    Route::get('/delete_admin/{id_admin}',[AdminController::class,'deleteAdmin']);
});
Route::group(['prefix'=>'beli'],function(){
    Route::get('/view_beli',[BeliController::class,'index']);
});
Route::group(['prefix'=>'bibit'],function(){
    Route::get('/view_bibit',[BibitController::class,'index']);
});
Route::group(['prefix'=>'jenisuser'],function(){
    Route::get('/view_jenisuser',[JenisUserController::class,'index']);
});
Route::group(['prefix'=>'jual'],function(){
    Route::get('/view_jual',[JualController::class,'index']);
});
Route::group(['prefix'=>'lahan'],function(){
    Route::get('/view_lahan',[LahanController::class,'index']);
});
Route::group(['prefix'=>'pembelian'],function(){
    Route::get('/view_pembelian',[PembelianController::class,'index']);
    Route::get('/accept/{id_pembelian}',[PembelianController::class,'accept']);
    Route::get('/discard/{id_pembelian}',[PembelianController::class,'discard']);
});
Route::group(['prefix'=>'penawaran'],function(){
    Route::get('/view_penawaran',[PenawaranController::class,'index']);
});
Route::group(['prefix'=>'rekening'],function(){
    Route::get('/view_rekening',[RekeningController::class,'index']);
    Route::post('/add_rekening',[RekeningController::class,'store']);
    Route::get('/edit_rekening/{id_rekening}',[RekeningController::class,'view_edit']);
    Route::post('/edit_rekening',[RekeningController::class,'edit']);
    Route::get('/delete_rekening/{id_rekening}',[RekeningController::class,'delete']);
});
Route::group(['prefix'=>'sewa'],function(){
    Route::get('/view_sewa',[SewaController::class,'index']);
});
Route::group(['prefix'=>'tipe'],function(){
    Route::get('/view_tipe',[TipeController::class,'index']);
});
Route::group(['prefix'=>'transaksi'],function(){
    Route::get('/view_transaksi',[TransaksiController::class,'index']);
});

Route::group(['prefix'=>'user'],function(){
    Route::get('/view_user',[TbUserController::class,'index']);
});

});
// login
Route::group(['middleware' => 'adminlogin'], function () {
    Route::get('/loginadmin',[AuthAdminController::class,'loginadmin']);
    Route::post('/proseslogin',[AuthAdminController::class,'proseslogin']);
});

Route::get('/logoutadmin',[AuthAdminController::class,'logoutadmin']);