<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Rute untuk Beranda
Route::get('/', function () {
    return view('beranda');
});

// Rute untuk Halaman Cari Kos
Route::get('/cari-kos', function () {
    return view('cari-kos'); // Memanggil file resources/views/cari-kos.blade.php
});

Route::get('/layanan', function () {
    return view('layanan');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/detail-kos', function () {
    return view('detail-kos');
});

// Route baru untuk halaman pembayaran
Route::get('/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/order-detail', function () {
    return view('order-detail');
});

Route::get('/auth', function () {
    return view('auth');
});

// Rute untuk pura-pura Login
Route::get('/dummy-login', function () {
    session(['is_logged_in' => true]);
    return redirect('/');
});

// Rute untuk pura-pura Logout
Route::get('/dummy-logout', function () {
    session()->forget('is_logged_in');
    return redirect('/');
});

Route::get('/akun', function () {
    return view('akun');
});
Route::get('/promo', function () {
    return view('promo');
});
Route::get('/rewards', function () { return view('rewards'); });
Route::get('/kokacare', function () { return view('kokacare'); });

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);

// Rute untuk Dashboard Admin
Route::get('/admin', [AdminController::class, 'dashboard']);

Route::get('/admin/pengguna', function () {
    return view('admin.pengguna');
});

Route::get('/admin/pemilik', function () {
    return view('admin.pemilik');
});

Route::get('/admin/kos', function () {
    return view('admin.kos');
});

Route::get('/admin/layanan', function () {
    return view('admin.layanan');
});

Route::get('/admin/notifikasi', function () {
    return view('admin.notifikasi');
});

Route::get('/admin/booking', function () {
    return view('admin.booking');
});

Route::get('/admin/pembayaran', function () {
    return view('admin.pembayaran');
});

Route::get('/admin/driver', function () {
    return view('admin.driver');
});

Route::get('/admin/promo', function () {
    return view('admin.promo');
});

Route::get('/admin/laporan', function () {
    return view('admin.laporan');
});

Route::get('/admin/pengaturan', function () {
    return view('admin.pengaturan');
});