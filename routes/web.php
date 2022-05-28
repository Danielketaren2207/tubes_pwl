<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataSiswaController;

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


Route::get('/admindatasiswa', [App\Http\Controllers\DataSiswaController::class, 'index'])->name('admin_datasiswa');

