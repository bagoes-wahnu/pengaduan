<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PengaduanApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pengaduan/json', [PengaduanApiController::class,'json'])->name('pengaduan.json');
Route::get('/pengaduan/show_json/{gid}', [PengaduanApiController::class,'show_json'])->name('pengaduan.show.json');
Route::post('/pengaduan/store_json', [PengaduanApiController::class,'store_json'])->name('pengaduan.store.json');
Route::delete('/pengaduan/delete_json/{gid}', [PengaduanApiController::class,'delete_json'])->name('pengaduan.delete.json');