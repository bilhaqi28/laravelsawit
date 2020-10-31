<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['middleware' => 'auth:sanctum'], function(){
//     //All secure URL's
//     Route::group(['prefix'=>'admin'],function(){
//         Route::get('alldata',[AdminApiController::class,'get_all_data']);
//         Route::post('storedata',[AdminApiController::class,'store_data']);
//         Route::get('spesifikdata/{id_admin}',[AdminApiController::class,'get_spesifik_data']);
//         Route::put('updatedata',[AdminApiController::class,'update_data']);
//         Route::delete('deletedata/{id_admin}',[AdminApiController::class,'delete_data']);
//         Route::get('searchdata/{nama_admin}',[AdminApiController::class,'search_data']);
    
//     });
// });

// Route::post("login",[UserController::class,'index']);
