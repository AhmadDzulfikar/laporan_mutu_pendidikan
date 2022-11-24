<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluasiGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\KesiapanGuruController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\PrasaranaController;
use App\Http\Controllers\PrestasiGuruController;
use App\Models\EvaluasiGuru;
use App\Models\Masuk;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

//Main
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::put('dashboard/edit/user/{id}', [DashboardController::class, 'editUser']);

//Data
//------------------------------Peserta Didik----------------------------------------
Route::get('/pesertadidik', [PesertaDidikController::class, 'index']);
Route::post('/store-siswa', [PesertaDidikController::class, 'store']);
Route::put('/siswa/edit/{id}', [PesertaDidikController::class, 'update']);
Route::delete('siswa/delete/{id}', [PesertaDidikController::class, 'destroy']);

Route::get('/pesertadidik/cetak_pdf', [PesertaDidikController::class, 'cetak_pdf']);
Route::post('/report/periode/pesertadidik', [PesertaDidikController::class, 'cetak_periode_pdf']);
//------------------------------Peserta Didik----------------------------------------

//------------------------------Pendidik---------------------------------------
//Prestasi
Route::get('/prestasiguru', [PrestasiGuruController::class, 'index']);
Route::post('/store-prestasi', [PrestasiGuruController::class, 'store']);
Route::put('/prestasi/edit/{id}', [PrestasiGuruController::class, 'update']);
Route::delete('prestasi/delete/{id}', [PrestasiGuruController::class, 'destroy']);

Route::get('/prestasi/cetak_pdf', [PrestasiGuruController::class, 'cetak_pdf']);
Route::post('/report/periode/prestasi', [PrestasiGuruController::class, 'cetak_periode_pdf']);
//Informasi Guru
Route::get('/evaluasiguru', [EvaluasiGuruController::class, 'index']);
Route::post('/store-evaluasi', [EvaluasiGuruController::class, 'store']);
Route::put('/evaluasi/edit/{id}', [EvaluasiGuruController::class, 'update']);
Route::delete('/evaluasi/delete/{id}', [EvaluasiGuruController::class, 'destroy']);

Route::get('/evaluasi/cetak_pdf', [EvaluasiGuruController::class, 'cetak_pdf']);
Route::post('/report/periode/informasi', [EvaluasiGuruController::class, 'cetak_periode_pdf']);
//------------------------------Pendidik---------------------------------------

//------------------------------Keuangan----------------------------------------
//Keluar
Route::get('/keluar', [KeluarController::class, 'index']);
Route::post('/store-keluar', [KeluarController::class, 'store']);
Route::put('/keluar/edit/{id}', [KeluarController::class, 'update']);
Route::delete('/keluar/delete/{id}', [KeluarController::class, 'destroy']);

Route::get('/keluar/cetak_pdf', [KeluarController::class, 'cetak_pdf']);
Route::post('/report/periode/keluar', [KeluarController::class, 'cetak_periode_pdf']);

//Masuk
Route::get('/masuk', [MasukController::class, 'index']);
Route::post('/store-masuk', [MasukController::class, 'store']);
Route::put('/masuk/edit/{id}', [MasukController::class, 'update']);
Route::delete('/masuk/delete/{id}', [MasukController::class, 'destroy']);

Route::get('/masuk/cetak_pdf', [MasukController::class, 'cetak_pdf']);
Route::post('/report/periode/masuk', [MasukController::class, 'cetak_periode_pdf']);
//------------------------------Keuangan----------------------------------------

//------------------------------prasarana----------------------------------------
Route::get('/prasarana', [PrasaranaController::class, 'index']);
// Route::get('/create-prasarana', [PrasaranaController::class, 'create']);
Route::post('/store-prasarana', [PrasaranaController::class, 'store']);
Route::post('show-prasarana/{id}', [PrasaranaController::class, 'show']);
Route::put('/prasarana/edit/{id}', [PrasaranaController::class, 'update']);
Route::delete('/prasarana/delete/{id}', [PrasaranaController::class, 'destroy']);

Route::get('/prasarana/cetak_pdf', [PrasaranaController::class, 'cetak_pdf']);
Route::post('/report/periode/prasarana', [PrasaranaController::class, 'cetak_periode_pdf']);
//------------------------------prasarana----------------------------------------

//------------------------------USER----------------------------------------
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/store-admin', [AdminController::class, 'store']);
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);

Route::get('/guru', [GuruController::class, 'index']);
Route::post('/store-guru', [GuruController::class, 'store']);
Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy']);
//------------------------------USER----------------------------------------

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
