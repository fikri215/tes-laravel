<?php

use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/provinsi', ProvinsiController::class);
Route::put('/provinsi/{provinsi}/status', [ProvinsiController::class, 'updateStatus'])->name('provinsi.status');
Route::resource('/kecamatan', KecamatanController::class);
Route::put('/kecamatan/{kecamatan}/status', [KecamatanController::class, 'updateStatus'])->name('kecamatan.status');
Route::resource('/kelurahan', KelurahanController::class);
Route::put('/kelurahan/{kelurahan}/status', [KelurahanController::class, 'updateStatus'])->name('kelurahan.status');
Route::resource('/pegawai', PegawaiController::class);