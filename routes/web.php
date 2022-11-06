<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvaluasiGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\KesiapanGuruController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\PesertaDidikController;
use App\Http\Controllers\PrasaranaController;
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

//Data
//------------------------------Peserta Didik----------------------------------------
Route::get('/pesertadidik', [App\Http\Controllers\PesertaDidikController::class, 'index']);
Route::post('/store-siswa', [PesertaDidikController::class, 'store']);
Route::put('/siswa/edit/{id}', [PesertaDidikController::class, 'update']);
Route::delete('siswa/delete/{id}', [PesertaDidikController::class, 'destroy']);
//------------------------------Peserta Didik----------------------------------------

//------------------------------Pendidik---------------------------------------
//Kesiapan
Route::get('/kesiapanguru', [KesiapanGuruController::class, 'index']);

//Evaluasi
Route::get('/evaluasiguru', [EvaluasiGuruController::class, 'index']);
//------------------------------Pendidik---------------------------------------

//------------------------------Keuangan----------------------------------------
//Keluar
Route::get('/keluar', [KeluarController::class, 'index']);
Route::post('/store-keluar', [KeluarController::class, 'store']);
Route::put('/keluar/edit/{id}', [KeluarController::class, 'update']);
Route::delete('/keluar/delete/{id}', [KeluarController::class, 'destroy']);

//Masuk
Route::get('/masuk', [MasukController::class, 'index']);
Route::post('/store-masuk', [MasukController::class, 'store']);
Route::put('/masuk/edit/{id}', [MasukController::class, 'update']);
Route::delete('/masuk/delete/{id}', [MasukController::class, 'destroy']);
//------------------------------Keuangan----------------------------------------

//------------------------------prasarana----------------------------------------
Route::get('/prasarana', [PrasaranaController::class, 'index']);
// Route::get('/create-prasarana', [PrasaranaController::class, 'create']);
Route::post('/store-prasarana', [PrasaranaController::class, 'store']);
Route::post('show-prasarana/{id}', [PrasaranaController::class, 'show']);
Route::put('/prasarana/edit/{id}', [PrasaranaController::class, 'update']);
Route::delete('/prasarana/delete/{id}', [PrasaranaController::class, 'destroy']);
//------------------------------prasarana----------------------------------------

//------------------------------USER----------------------------------------
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/guru', [GuruController::class, 'index']);
//------------------------------USER----------------------------------------

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
