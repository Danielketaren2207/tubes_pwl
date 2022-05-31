<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\SPPController;


use Illuminate\Support\Facades\Auth;
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



// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/siswa', function () {
//     return view('siswa_dashboard');
// });

// Route::get('/siswauangpangkal', function () {
//     return view('siswa_uangpangkal');
// });

// Route::get('/siswauangspp', function () {
//     return view('siswa_uangspp');
// });

// Route::get('/siswakonfirmasiadmin', function () {
//     return view('siswa_konfirmasiadmin');
// });


// Route::get('/admin', function () {
//     return view('admin_dashboard');
// });

// Route::get('/adminberita', function () {
//     return view('admin_berita');
// });

// Route::get('/admineditberita', function () {
//     return view('admin_editberita');
// });

// Route::get('/admindatasiswa', function () {
//     return view('admin_datasiswa');
// });

// Route::get('/adminprofilesiswa', function () {
//     return view('admin_profilesiswa');
// });

Route::get('/admintambahspp', function () {
    return view('admin_tambahspp');
});



Route::get('/admintambahuangpangkal', function () {
    return view('admin_tambahuangpangkal');
});

// Route::get('/adminkonfirmasi', function () {
//     return view('admin_konfirmasi');
// });

// Route::get('/', function () {
//     return view('halamanutama');
// });



Route::get('/', [App\Http\Controllers\BeritaController::class, 'utama'])->name('halamanutama');

Auth::routes();

Route::get('/siswa', [App\Http\Controllers\HomeController::class, 'index'])->name('siswa_dashboard')->middleware('hak_akses');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin_dashboard')->middleware('hak_akses');
// Route::get('/adminberita','HomeController@create')->name('admin_berita');
Route::get('/adminberita', [App\Http\Controllers\BeritaController::class, 'created'])->name('admin_berita');
Route::get('/admineditberita/{id}', [App\Http\Controllers\BeritaController::class, 'edit'])->name('admin_editberita');
Route::get('/admintambahberita', [App\Http\Controllers\BeritaController::class, 'create'])->name('admin_tambahberita');
Route::post('/admin_tambahberita_simpan', [App\Http\Controllers\BeritaController::class, 'store'])->name('admin_tambahberita_simpan');
Route::post('/admin_updateberita_simpan/{id}', [App\Http\Controllers\BeritaController::class, 'update'])->name('admin_updateberita_simpan');
Route::get('/admin_hapusberita/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('admin_hapusberita');


Route::get('/admincarisiswa', [App\Http\Controllers\DataSiswaController::class, 'search'])-> name('search_datasiswa');
Route::get('/admindatasiswa', [App\Http\Controllers\DataSiswaController::class, 'index'])->name('admin_datasiswa');
Route::get('/admintambahdatasiswa', [App\Http\Controllers\DataSiswaController::class, 'create'])->name('admin_tambahdatasiswa');
Route::post('/admin_tambahdatasiswa_simpan', [App\Http\Controllers\DataSiswaController::class, 'store'])->name('admin_tambahdatasiswa_simpan');
Route::get('/admin_hapussiswa/{id}', [App\Http\Controllers\DataSiswaController::class, 'destroy'])->name('admin_hapussiswa');
Route::get('/admineditsiswa/{id}', [App\Http\Controllers\DataSiswaController::class, 'edit'])->name('admin_editsiswa');
Route::post('/admin_editsiswa_simpan/{id}', [App\Http\Controllers\DataSiswaController::class, 'update'])->name('admin_editsiswa_simpan');
Route::get('/adminviewsiswa/{id}', [App\Http\Controllers\DataSiswaController::class, 'show'])->name('admin_viewsiswa');


Route::get('/admindataspp/{id}', [App\Http\Controllers\SPPController::class, 'index'])->name('admin_spp');
Route::get('/admindataspp/delete/{id}', [App\Http\Controllers\SPPController::class, 'destroy'])-> name('spp_delete');
Route::get('/admindataspp/edit/{id}', [App\Http\Controllers\SPPController::class, 'edit'])-> name('spp_edit');
Route::post('/admindataspp/update/{id}', [App\Http\Controllers\SPPController::class, 'update'])-> name('spp_update');
Route::post('/admindataspp/create', [App\Http\Controllers\SPPController::class, 'store'])-> name('spp_create');
