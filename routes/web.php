<?php

use Illuminate\Support\Facades\Route;

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