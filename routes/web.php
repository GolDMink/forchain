<?php

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


Route::get('/',function(){
    return view('landing');
});
Route::name('konsultasi.')->prefix('konsultasi')->group(function () {

    Route::get('form/',  [App\Http\Controllers\KonsultasiController::class, 'form'])->name('form');
    Route::get('getform/{id}',  [App\Http\Controllers\KonsultasiController::class, 'getform'])->name('getform');
    Route::post('postform/',  [App\Http\Controllers\KonsultasiController::class, 'postform'])->name('postform');
    Route::get('hasilform/{id}',  [App\Http\Controllers\KonsultasiController::class, 'hasil'])->name('hasil');
});
Route::post('/trueLogin', [App\Http\Controllers\Auth\LoginController::class, 'trueLogin'])->name('trueLogin');

Auth::routes();

Route::group(['middleware' => ['WasLogin']], function () {
    Route::get('/admin', [App\Http\Controllers\Auth\LoginController::class, 'toLogin'])->name('toLogin');
    Route::get('dashboard/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // GEJALA
    Route::name('gejala.')->prefix('gejala')->group(function () {

        Route::get('index/',  [App\Http\Controllers\GejalaController::class, 'index'])->name('index');
        Route::get('datatable',  [App\Http\Controllers\GejalaController::class, 'getdatatable'])->name('getDatatable');
        Route::post('simpangejala/',  [App\Http\Controllers\GejalaController::class, 'simpan'])->name('simpan');
        Route::post('updategejala/',  [App\Http\Controllers\GejalaController::class, 'update'])->name('update');
        Route::get('editgejala/{id}',  [App\Http\Controllers\GejalaController::class, 'edit'])->name('edit');
        Route::delete('hapusgejala/{id}',  [App\Http\Controllers\GejalaController::class, 'hapus'])->name('hapus');
    });

    // RULE
    Route::name('rule.')->prefix('rule')->group(function () {

        Route::get('index/',  [App\Http\Controllers\RuleController::class, 'index'])->name('index');
        Route::get('datatable',  [App\Http\Controllers\RuleController::class, 'getdatatable'])->name('getDatatable');
        Route::post('simpanrule/',  [App\Http\Controllers\RuleController::class, 'simpan'])->name('simpan');
        Route::post('updaterule/',  [App\Http\Controllers\RuleController::class, 'update'])->name('update');
        Route::get('editrule/{id}',  [App\Http\Controllers\RuleController::class, 'edit'])->name('edit');
        Route::delete('hapusrule/{id}',  [App\Http\Controllers\RuleController::class, 'hapus'])->name('hapus');


        Route::get('gejalaselect',  [App\Http\Controllers\RuleController::class, 'gejalaselect'])->name('gejalaselect');
        Route::get('penyakitselect',  [App\Http\Controllers\RuleController::class, 'penyakitselect'])->name('penyakitselect');
    });

    // PENYAKIT
    Route::name('penyakit.')->prefix('penyakit')->group(function () {

        Route::get('index/',  [App\Http\Controllers\PenyakitController::class, 'index'])->name('index');
        Route::get('datatable',  [App\Http\Controllers\PenyakitController::class, 'getdatatable'])->name('getDatatable');
        Route::post('simpanpenyakit/',  [App\Http\Controllers\PenyakitController::class, 'simpan'])->name('simpan');
        Route::post('updatepenyakit/',  [App\Http\Controllers\PenyakitController::class, 'update'])->name('update');
        Route::get('editpenyakit/{id}',  [App\Http\Controllers\PenyakitController::class, 'edit'])->name('edit');
        Route::delete('hapuspenyakit/{id}',  [App\Http\Controllers\PenyakitController::class, 'hapus'])->name('hapus');
    });

    // PENGETAHUAN
    Route::name('pengetahuan.')->prefix('pengetahuan')->group(function () {

        Route::get('index/',  [App\Http\Controllers\PengetahuanController::class, 'index'])->name('index');
        Route::get('datatable',  [App\Http\Controllers\PengetahuanController::class, 'getdatatable'])->name('getDatatable');
        Route::get('getgejala/{id}',  [App\Http\Controllers\PengetahuanController::class, 'getgejala'])->name('getgejala');
        Route::post('simpanpengetahuan/',  [App\Http\Controllers\PengetahuanController::class, 'simpan'])->name('simpan');
        Route::post('updatepengetahuan/',  [App\Http\Controllers\PengetahuanController::class, 'update'])->name('update');
        Route::get('editpengetahuan/{id}',  [App\Http\Controllers\PengetahuanController::class, 'edit'])->name('edit');
        Route::delete('hapuspengetahuan/{id}',  [App\Http\Controllers\PengetahuanController::class, 'hapus'])->name('hapus');
        Route::delete('hapusgejala/{idp}/{idg}',  [App\Http\Controllers\PengetahuanController::class, 'hapusgejala'])->name('hapusgejala');

        Route::get('/master-details/{id}', [App\Http\Controllers\PengetahuanController::class, 'details'])->name('details');
    });


    // user
    Route::name('user.')->prefix('user')->group(function () {
        Route::get('index/',  [App\Http\Controllers\PenggunaController::class, 'index'])->name('index');
        Route::get('getDatatableuser/',  [App\Http\Controllers\PenggunaController::class, 'getDatatable'])->name('getDatatableuser');
        Route::get('edituser/{id}',  [App\Http\Controllers\PenggunaController::class, 'edit'])->name('edit');
        Route::post('simpanuser/',  [App\Http\Controllers\PenggunaController::class, 'simpan'])->name('simpan');
        Route::post('updateuser/',  [App\Http\Controllers\PenggunaController::class, 'update'])->name('update');
        Route::delete('hapususer/{id}',  [App\Http\Controllers\PenggunaController::class, 'hapus'])->name('hapus');

    });


    // PENGGUNA
    Route::name('pengguna.')->prefix('pengguna')->group(function () {
        Route::get('index/',  [App\Http\Controllers\PenggunaController::class, 'pengguna'])->name('index');
        Route::get('getDatatablePengguna/',  [App\Http\Controllers\PenggunaController::class, 'getDatatablePenguna'])->name('getDatatablePengguna');
        Route::get('editpengguna/{id}',  [App\Http\Controllers\PenggunaController::class, 'editpengguna'])->name('edit');
        Route::post('simpanpengguna/',  [App\Http\Controllers\PenggunaController::class, 'simpanpengguna'])->name('simpan');
        Route::post('updatepengguna/',  [App\Http\Controllers\PenggunaController::class, 'updatepengguna'])->name('update');
        Route::delete('hapuspengguna/{id}',  [App\Http\Controllers\PenggunaController::class, 'hapuspengguna'])->name('hapus');

    });

    // RULE
    // Route::name('rule.')->prefix('rule')->group(function () {

    //     Route::get('index/',  [App\Http\Controllers\RuleController::class, 'index'])->name('index');
    //     Route::get('datatable',  [App\Http\Controllers\RuleController::class, 'getdatatable'])->name('getDatatable');
    //     Route::post('simpanrule/',  [App\Http\Controllers\RuleController::class, 'simpan'])->name('simpan');
    //     Route::post('updaterule/',  [App\Http\Controllers\RuleController::class, 'update'])->name('update');
    //     Route::get('editrule/{id}',  [App\Http\Controllers\RuleController::class, 'edit'])->name('edit');
    //     Route::delete('hapusrule/{id}',  [App\Http\Controllers\RuleController::class, 'hapus'])->name('hapus');
    // });
});
