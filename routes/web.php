<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// barang
// Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');
// spasi
// Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');

Route::get('/DataBarang', [BarangController::class, 'index'])->name('dataBarang');
Route::get('/ManageBarang', [BarangController::class, 'create'])->name('ManageBarang');
Route::post('/ManageBarang', [BarangController::class, 'store']);
Route::delete('/hapus-barang/{id}', [BarangController::class, 'destroy'])->name('hapusBarang');
Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/update-barang/{id}', [BarangController::class, 'update'])->name('barang.update');


// Pesanan

Route::get('/DetailPesanan', [PesananController::class, 'index'])->name('detailPesanan');






// Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
// Route::put('/update-barang/{id}', [BarangController::class, 'update'])->name('barang.update');