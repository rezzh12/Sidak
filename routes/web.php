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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/masuk', [App\Http\Controllers\HomeController::class, 'masuk'])->name('masuk');
Route::post('/masuk', [App\Http\Controllers\HomeController::class, 'pelayanan'])->name('logins');
Route::get('pendatang/{nik}', [App\Http\Controllers\HomeController::class, 'pendatang'])->name('pendatang');
Route::get('pendatang/print/{id}',[App\Http\Controllers\HomeController::class, 'print_pendatang'])->name('pendatang.print');
Route::get('pindah/{nik}', [App\Http\Controllers\HomeController::class, 'pindah'])->name('pindah');
Route::get('pindah/print/{id}',[App\Http\Controllers\HomeController::class, 'print_pindah'])->name('pindah.print');
Route::get('lahir/{nik}', [App\Http\Controllers\HomeController::class, 'lahir'])->name('pendatang');
Route::get('lahir/print/{id}',[App\Http\Controllers\HomeController::class, 'print_lahir'])->name('lahir.print');
Route::get('meninggal/{nik}', [App\Http\Controllers\HomeController::class, 'meninggal'])->name('meninggal');
Route::get('meninggal/print/{id}',[App\Http\Controllers\HomeController::class, 'print_meninggal'])->name('meninggal.print');
Route::get('masuk/{nik}', [App\Http\Controllers\HomeController::class, 'pelayanans'])->name('masuk');
Route::post('masuk/pendatang/submit', [App\Http\Controllers\HomeController::class, 'submit_pendatang'])->name('pendatang.submit');
Route::post('masuk/pindah/submit', [App\Http\Controllers\HomeController::class, 'submit_pindah'])->name('pindah.submit');
Route::post('masuk/lahir/submit', [App\Http\Controllers\HomeController::class, 'submit_lahir'])->name('lahir.submit');
Route::post('masuk/meninggal/submit', [App\Http\Controllers\HomeController::class, 'submit_meninggal'])->name('meninggal.submit');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home',
    [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('admin');

    Route::get('admin/kk',
        [App\Http\Controllers\AdminController::class, 'kk'])->name('admin.kk')->middleware('admin');
    Route::post('admin/kk', 
        [App\Http\Controllers\AdminController::class, 'submit_kk'])->name('admin.kk.submit')->middleware('admin');
    Route::patch('admin/kk/update', 
        [App\Http\Controllers\AdminController::class, 'update_kk'])->name('admin.kk.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataKk/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataKk']);
    Route::post('admin/kk/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_kk'])->name('admin.kk.delete')->middleware('admin');

    Route::get('admin/penduduk',
        [App\Http\Controllers\AdminController::class, 'penduduk'])->name('admin.penduduk')->middleware('admin');
    Route::post('admin/penduduk', 
        [App\Http\Controllers\AdminController::class, 'submit_penduduk'])->name('admin.penduduk.submit')->middleware('admin');
    Route::patch('admin/penduduk/update', 
        [App\Http\Controllers\AdminController::class, 'update_penduduk'])->name('admin.penduduk.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataPenduduk/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataPenduduk']);
    Route::post('admin/penduduk/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_penduduk'])->name('admin.penduduk.delete')->middleware('admin');

    Route::get('admin/pendatang',
        [App\Http\Controllers\AdminController::class, 'pendatang'])->name('admin.pendatang')->middleware('admin');
    Route::post('admin/pendatang', 
        [App\Http\Controllers\AdminController::class, 'submit_pendatang'])->name('admin.pendatang.submit')->middleware('admin');
    Route::patch('admin/pendatang/update', 
        [App\Http\Controllers\AdminController::class, 'update_pendatang'])->name('admin.pendatang.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataPendatang/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataPendatang']);
    Route::post('admin/pendatang/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_pendatang'])->name('admin.pendatang.delete')->middleware('admin');
    Route::get('admin/pendatang/terima/{id}',
        [App\Http\Controllers\AdminController::class, 'terima_pendatang'])->name('admin.pendatang.terima')->middleware('admin');
    Route::get('admin/pendatang/tolak/{id}',
        [App\Http\Controllers\AdminController::class, 'tolak_pendatang'])->name('admin.pendatang.tolak')->middleware('admin');
    Route::get('admin/pendatang/print/{id}',
        [App\Http\Controllers\AdminController::class, 'print_pendatang'])->name('admin.pendatang.print')->middleware('admin');


    Route::get('admin/pindah',
        [App\Http\Controllers\AdminController::class, 'pindah'])->name('admin.pindah')->middleware('admin');
    Route::post('admin/pindah', 
        [App\Http\Controllers\AdminController::class, 'submit_pindah'])->name('admin.pindah.submit')->middleware('admin');
    Route::patch('admin/pindah/update', 
        [App\Http\Controllers\AdminController::class, 'update_pindah'])->name('admin.pindah.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataPindah/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataPindah']);
    Route::post('admin/pindah/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_pindah'])->name('admin.pindah.delete')->middleware('admin');
    Route::get('admin/pindah/terima/{id}',
        [App\Http\Controllers\AdminController::class, 'terima_pindah'])->name('admin.pindah.terima')->middleware('admin');
    Route::get('admin/pindah/tolak/{id}',
        [App\Http\Controllers\AdminController::class, 'tolak_pindah'])->name('admin.pindah.tolak')->middleware('admin');
    Route::get('admin/pindah/print/{id}',
        [App\Http\Controllers\AdminController::class, 'print_pindah'])->name('admin.pindah.print')->middleware('admin');

    Route::get('admin/meninggal',
        [App\Http\Controllers\AdminController::class, 'meninggal'])->name('admin.meninggal')->middleware('admin');
    Route::post('admin/meninggal', 
        [App\Http\Controllers\AdminController::class, 'submit_meninggal'])->name('admin.meninggal.submit')->middleware('admin');
    Route::patch('admin/meninggal/update', 
        [App\Http\Controllers\AdminController::class, 'update_meninggal'])->name('admin.meninggal.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataMeninggal/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataMeninggal']);
    Route::post('admin/meninggal/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_meninggal'])->name('admin.meninggal.delete')->middleware('admin');
    Route::get('admin/meninggal/terima/{id}',
        [App\Http\Controllers\AdminController::class, 'terima_meninggal'])->name('admin.meninggal.terima')->middleware('admin');
    Route::get('admin/meninggal/tolak/{id}',
        [App\Http\Controllers\AdminController::class, 'tolak_meninggal'])->name('admin.meninggal.tolak')->middleware('admin');
    Route::get('admin/meninggal/print/{id}',
        [App\Http\Controllers\AdminController::class, 'print_meninggal'])->name('admin.meninggal.print')->middleware('admin');

    Route::get('admin/lahir',
        [App\Http\Controllers\AdminController::class, 'lahir'])->name('admin.lahir')->middleware('admin');
    Route::post('admin/lahir', 
        [App\Http\Controllers\AdminController::class, 'submit_lahir'])->name('admin.lahir.submit')->middleware('admin');
    Route::patch('admin/lahir/update', 
        [App\Http\Controllers\AdminController::class, 'update_lahir'])->name('admin.lahir.update')->middleware('admin');
    Route::get('admin/ajaxadmin/dataLahir/{id}', 
        [App\Http\Controllers\AdminController::class, 'getDataLahir']);
    Route::post('admin/lahir/delete/{id}',
        [App\Http\Controllers\AdminController::class, 'delete_lahir'])->name('admin.lahir.delete')->middleware('admin');
    Route::get('admin/lahir/terima/{id}',
        [App\Http\Controllers\AdminController::class, 'terima_lahir'])->name('admin.lahir.terima')->middleware('admin');
    Route::get('admin/lahir/tolak/{id}',
        [App\Http\Controllers\AdminController::class, 'tolak_lahir'])->name('admin.lahir.tolak')->middleware('admin');
    Route::get('admin/lahir/print/{id}',
        [App\Http\Controllers\AdminController::class, 'print_lahir'])->name('admin.lahir.print')->middleware('admin');
    Route::get('admin/laporan',
        [App\Http\Controllers\AdminController::class, 'laporan'])->name('admin.laporan')->middleware('admin');
    Route::post('admin/laporan',
        [App\Http\Controllers\AdminController::class, 'print'])->name('admin.laporan.submit');


Route::get('admin/data_user',
    [App\Http\Controllers\AdminController::class, 'data_user'])->name('admin.pengguna')->middleware('admin');
Route::post('admin/data_user', 
    [App\Http\Controllers\AdminController::class, 'submit_user'])->name('admin.pengguna.submit')->middleware('admin');
Route::patch('admin/data_user/update', 
    [App\Http\Controllers\AdminController::class, 'update_user'])->name('admin.pengguna.update')->middleware('admin');
Route::post('admin/data_user/delete/{id}',
    [App\Http\Controllers\AdminController::class, 'delete_user'])->name('admin.pengguna.delete')->middleware('admin');
Route::get('admin/ajaxadmin/dataUser/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataUser']);

Route::get('kades/home',
    [App\Http\Controllers\KepalaController::class, 'index'])->name('kades.home')->middleware('kades');
Route::get('kades/grafik',
    [App\Http\Controllers\KepalaController::class, 'grafik'])->name('kades.grafik')->middleware('kades');
Route::get('kades/riwayat/pendatang', [App\Http\Controllers\KepalaController::class, 'pendatang'])->name('kades.pendatang');
Route::get('kades/riwayat/pindah', [App\Http\Controllers\KepalaController::class, 'pindah'])->name('kades.pindah');
Route::get('kades/riwayat/lahir', [App\Http\Controllers\KepalaController::class, 'lahir'])->name('kades.lahir');
Route::get('kades/riwayat/meninggal', [App\Http\Controllers\KepalaController::class, 'meninggal'])->name('kades.meninggal');
Route::get('kades/laporan',
    [App\Http\Controllers\KepalaController::class, 'laporan'])->name('kades.laporan')->middleware('kades');
Route::post('kades/laporan',
    [App\Http\Controllers\KepalaController::class, 'print'])->name('kades.laporan.submit');
