<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenerbanganController; // public
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\User\PembayaranController; // user pembayaran
use App\Http\Controllers\User\InvoiceController;    // user invoice
use App\Http\Controllers\Admin\AdminPembayaranController; // admin pembayaran
use App\Http\Controllers\Admin\AdminPenerbanganController; // admin penerbangan
use App\Http\Controllers\Admin\AdminUserController; // admin user CRUD
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

/* ================== PUBLIC / HOME ================== */
Route::get('/', [UserController::class,'daftarPenerbangan'])->name('home');

/* ================== AUTH ================== */
Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

/* ================== USER AREA ================== */
Route::middleware([RoleMiddleware::class . ':user'])->group(function(){
    // Dashboard User
    Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');

    // Pemesanan
    Route::get('/pemesanan',[PemesananController::class,'index'])->name('pemesanan.index');
    Route::get('/pesan/{kelas_id}',[PemesananController::class,'create'])->name('pemesanan.create');
    Route::post('/pesan',[PemesananController::class,'store'])->name('pemesanan.store');

    // Pembayaran User
    Route::get('/pembayaran/{pemesanan_id}/create',[PembayaranController::class,'create'])->name('pembayaran.create');
    Route::post('/pembayaran',[PembayaranController::class,'store'])->name('pembayaran.store');

    // Invoice User
    Route::get('/invoice/{pemesanan_id}', [InvoiceController::class, 'show'])->name('invoice.show');
});

/* ================== ADMIN AREA ================== */
Route::prefix('admin')->middleware([RoleMiddleware::class . ':admin'])->name('admin.')->group(function() {
    // Dashboard Admin
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

    /* ========== CRUD USER (AdminUserController) ========== */
    Route::resource('user', AdminUserController::class)->names('user');

    /* ========== CRUD PENERBANGAN (AdminPenerbanganController) ========== */
    Route::get('/penerbangan', [AdminPenerbanganController::class,'index'])->name('penerbangan.index');
    Route::get('/penerbangan/create', [AdminPenerbanganController::class,'create'])->name('penerbangan.create');
    Route::post('/penerbangan', [AdminPenerbanganController::class,'store'])->name('penerbangan.store');
    Route::get('/penerbangan/{penerbangan}/edit', [AdminPenerbanganController::class,'edit'])->name('penerbangan.edit');
    Route::put('/penerbangan/{penerbangan}', [AdminPenerbanganController::class,'update'])->name('penerbangan.update');
    Route::delete('/penerbangan/{penerbangan}', [AdminPenerbanganController::class,'destroy'])->name('penerbangan.destroy');

    // Tambah Kelas ke Penerbangan
    Route::post('/penerbangan/{id}/kelas', [AdminPenerbanganController::class,'storeKelas'])->name('penerbangan.kelas.store');

    /* ========== ADMIN PEMBAYARAN (AdminPembayaranController) ========== */
    Route::get('/pembayaran',[AdminPembayaranController::class,'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{id}/update',[AdminPembayaranController::class,'updateStatus'])->name('pembayaran.update');
});
