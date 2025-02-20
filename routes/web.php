<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Exports\LaporanPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;



Route::get('/detail-penjualan/{id}/pdf', [DetailPenjualanController::class, 'downloadPDF'])->name('detail-penjualan.pdf');

Route::resource('detail-penjualan', DetailPenjualanController::class);
Route::get('/detail-penjualan/{id}', [DetailPenjualanController::class, 'show'])->name('detail-penjualan.show');
Route::get('/detail-penjualan/{id}/print', [DetailPenjualanController::class, 'printPDF'])->name('detail-penjualan.print');

Route::get('/detail-penjualan/{id}', [DetailPenjualanController::class, 'show'])->name('detail-penjualan.show');

Route::resource('detail-penjualan', DetailPenjualanController::class);

Route::delete('/penjualan/{penjualan}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::get('/detail-penjualan/print', [DetailPenjualanController::class, 'print'])->name('detail-penjualan.print');

Route::get('/penjualan/{penjualan}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/{penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');

Route::get('/detail-penjualan', [DetailPenjualanController::class, 'index'])->name('detail_penjualan.index');


Route::get('/detail-penjualan/{id}', [DetailPenjualanController::class, 'show'])->name('detail_penjualan.show');
Route::get('/detail-penjualan/{id}/print', [DetailPenjualanController::class, 'print'])->name('detail_penjualan.print');
// Hapus Pelanggan
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// Hapus Penjualan
Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

// Hapus Detail Penjualan
Route::delete('/detail-penjualan/{id}', [DetailPenjualanController::class, 'destroy'])->name('detailPenjualan.destroy');

// Edit dan Update Produk
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');

// Edit dan Update Pelanggan
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

// Edit dan Update Penjualan
Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');

// Edit dan Update Detail Penjualan
Route::get('/detail-penjualan/{id}/edit', [DetailPenjualanController::class, 'edit'])->name('detailPenjualan.edit');
Route::post('/detail-penjualan/{id}', [DetailPenjualanController::class, 'update'])->name('detailPenjualan.update');

Route::get('/laporan-penjualan/export', function() {
    return Excel::download(new LaporanPenjualanExport, 'laporan-penjualan.xlsx');
})->name('laporan.penjualan.export');

Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');

Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan.penjualan');
Route::post('/laporan-penjualan/filter', [LaporanPenjualanController::class, 'filter'])->name('laporan.penjualan.filter');
Route::resource('detail-penjualan', DetailPenjualanController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('produk', ProdukController::class);
Route::resource('produks', ProdukController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});

// Route untuk autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');

Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::resource('pelanggan', PelangganController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
