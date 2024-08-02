<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\AdminController as Admin;

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



Route::get('/login', [Auth::class, 'login']);
Route::get('/register', [Auth::class, 'register']);
Route::get('/dashboard', [Home::class, 'dashboard']);
Route::get('/', [Home::class, 'landing_page']);

Route::post('/simpanuser', [Auth::class, 'simpanuser']);
Route::post('/cek_pengguna', [Auth::class, 'cek_pengguna']);

Route::post('/logout', [Auth::class, 'logout']);

Route::get('/buat_laporan', [Home::class, 'buat_laporan']);
Route::post('/simpan_laporan', [Home::class, 'simpan_laporan']);

Route::get('/lihat_laporan', [Home::class, 'lihat_laporan'])->name('lihat_laporan')->middleware('auth');
Route::get('/laporan/{id}', [Home::class, 'detail_laporan'])->name('detail_laporan')->middleware('auth');

Route::get('/login_admin', [Auth::class, 'login_admin']);
Route::get('/tambah_admin', [Auth::class, 'tambah_admin']);

Route::post('/simpan_admin', [Auth::class, 'simpan_admin']);
Route::post('/cek_login_admin', [Auth::class, 'cek_login_admin']);
Route::get('/dashboard_admin', [Admin::class, 'dashboard_admin']);

