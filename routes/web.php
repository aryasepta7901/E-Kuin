<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KontrakKerjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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



// login
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Kontrak Kerja
Route::resource('/kontrak', KontrakKerjaController::class)->middleware('auth');
// Generate Kuitansi
Route::post('/kontrak/cetak', [KontrakKerjaController::class, 'cetak'])->middleware('auth');
// Barang
Route::resource('/barang', BarangController::class)->middleware('auth');
// Jadwal
Route::resource('/jadwal', JadwalController::class)->middleware('auth');
// Users
Route::resource('/users', UserController::class)->middleware('auth');


// landingPage
Route::get('/', function () {
    return view('landingPage');
})->name('landingPage')->middleware('guest');
