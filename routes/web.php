<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ArtikelController;
use App\Models\Kos;
use App\Models\Artikel;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PromoBannerController;

// ================= AUTENTIKASI =================
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login'); 
Route::post('/auth/login', [AuthController::class, 'authenticate'])->name('auth.login'); 
Route::post('/register', [AuthController::class, 'register']); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Login Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Login Google
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


// ================= HALAMAN UTAMA / PUBLIC =================
Route::get('/', function () {
    $kosans = Kos::latest()->take(4)->get(); 
    return view('beranda', compact('kosans')); 
});

Route::get('/layanan', [ServiceController::class, 'indexUser']); 
Route::post('/layanan/pesan', [ServiceController::class, 'storeOrder'])->name('layanan.pesan'); 
Route::get('/pembayaran/berhasil', [ServiceController::class, 'paymentSuccess']);
Route::get('/layanan/selesaikan-pesanan', [ServiceController::class, 'markAsCompleted'])->name('layanan.selesai');

Route::get('/cari-kos', [KosController::class, 'indexUser']);
Route::get('/tentang-kami', function () { return view('tentang-kami'); });
Route::get('/detail-kos/{id}', [KosController::class, 'showUser']);
Route::get('/pembayaran/{id}', [ServiceController::class, 'showPembayaranLayanan'])->name('pembayaran.layanan');
Route::get('/order-detail', function () { return view('order-detail'); });
Route::get('/rewards', function () { return view('rewards'); });
Route::get('/kokacare', function () { return view('kokacare'); });

// --- Rute Artikel (Public) ---
Route::get('/artikel', [ArtikelController::class, 'indexUser'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArtikelController::class, 'showUser'])->name('artikel.detail');

// Public Booking Kos Flow
Route::post('/booking-kos/simpan', [KosController::class, 'storeBookingKos'])->name('kos.booking.simpan');
Route::get('/booking-kos/{id}', [KosController::class, 'formBooking'])->name('kos.booking');
Route::post('/booking-kos/proses', [KosController::class, 'postFormBooking'])->name('kos.booking.proses');
Route::get('/booking-kos/{id}/ringkasan', [KosController::class, 'showRingkasan'])->name('kos.ringkasan');
Route::get('/booking-kos/pembayaran/{id}', [KosController::class, 'showPembayaranKos'])->name('kos.pembayaran');

// --- Rute Kemitraan Pemilik Kos (Public) ---
Route::get('/mitra-kos', [PemilikController::class, 'formPengajuan'])->name('mitra.kos');
Route::post('/mitra-kos', [PemilikController::class, 'storePengajuan'])->middleware('auth')->name('mitra.kos.store');   


// ================= RUTE UMUM YANG BUTUH LOGIN (USER & ADMIN) =================
Route::middleware(['auth'])->group(function () {
    
    // PERBAIKAN: Gunakan POST agresif untuk Hapus Notifikasi (Bypass blokir server)
    Route::get('/notifikasi/{id}/read', [NotifikasiController::class, 'read'])->name('notifikasi.read');
    Route::post('/notifikasi/{id}/hapus', [NotifikasiController::class, 'destroy'])->name('notifikasi.destroy');

    Route::post('/push-subscribe', function (\Illuminate\Http\Request $request) {
        try {
            $endpoint = $request->endpoint;
            $token = $request->keys['p256dh'] ?? null;
            $auth = $request->keys['auth'] ?? null;

            if (!$endpoint || !$token || !$auth) {
                return response()->json(['error' => 'Data subscription tidak lengkap.'], 400);
            }

            auth()->user()->updatePushSubscription($endpoint, $token, $auth);
            return response()->json(['success' => true, 'message' => 'Token berhasil disimpan!']);
        } catch (\Exception $e) {
            Log::error('Gagal simpan push subscription: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    });
});


// ================= HALAMAN MEMBER (HANYA UNTUK USER) =================
Route::middleware(['auth', 'is.user'])->group(function () {
    Route::get('/akun', function () { return view('akun'); });
    Route::get('/profil', function () { return view('profil'); });
    Route::get('/pengaturan', function () { return view('pengaturan'); });
    
    // Rute Pusat Notifikasi Lengkap untuk User
    Route::get('/pusat-notifikasi', function () {
        $notifikasis = Notifikasi::where('user_id', auth()->id())->latest()->get();
        return view('notifikasi', compact('notifikasis'));
    })->name('user.notifikasi');    
    
    Route::put('/profil/update', [AuthController::class, 'updateProfilLengkap'])->name('profil.update');
    Route::put('/akun/update', [AuthController::class, 'updateProfile'])->name('akun.update');
    Route::put('/pengaturan/password', [AuthController::class, 'updatePassword'])->name('password.update');
    
    Route::get('/pesanan', [ServiceController::class, 'riwayatPesanan']);
    Route::post('/layanan/upload-bukti', [ServiceController::class, 'uploadBuktiPembayaran'])->name('layanan.upload-bukti');
    Route::post('/booking/{id}/upload-bukti', [ServiceController::class, 'uploadBuktiPembayaran']);
    
    Route::post('/kos/{id}/favorite', [KosController::class, 'toggleFavorite']);
    Route::get('/favorit', [KosController::class, 'daftarFavorit']);
});


// ================= PANEL ADMIN (HANYA UNTUK ADMIN) =================
// Mengirim data notifikasi secara otomatis ke layout admin
View::composer('admin.layout', function ($view) {
    if (auth()->check()) {
        $adminListNotifs = Notifikasi::where('user_id', auth()->id())->latest()->take(5)->get();
        $adminUnread = Notifikasi::where('user_id', auth()->id())->where('is_read', 0)->count();
        $view->with(compact('adminListNotifs', 'adminUnread'));
    }
});

Route::prefix('admin')->middleware(['auth', 'is.admin'])->group(function () {
    
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/api/orders-realtime', [ServiceController::class, 'getOrdersRealtime'])->name('admin.orders.realtime');
    // Notifikasi Admin
    Route::get('/notifikasi', function () {
        $notifikasis = Notifikasi::where('user_id', auth()->id())->latest()->get();
        return view('admin.notifikasi', compact('notifikasis'));
    })->name('admin.notifikasi');
    
    // PERBAIKAN: Rute Notifikasi Admin juga menggunakan POST murni
    Route::post('/notifikasi/{id}/hapus', [AdminController::class, 'destroyNotifikasi']);
    Route::post('/notifikasi/{id}/read', [AdminController::class, 'readNotifikasi']);

    // Manajemen Booking Kos Admin
    Route::get('/booking', [KosController::class, 'adminBookingIndex'])->name('admin.booking');
    Route::patch('/booking/{id}/acc', [ServiceController::class, 'accBooking'])->name('admin.booking.acc');
    Route::post('/booking/{id}/upload-bukti', [ServiceController::class, 'uploadBuktiPembayaran']);
    
    Route::get('/pembayaran', function () { return view('admin.pembayaran'); });
    Route::get('/driver', function () { return view('admin.driver'); });
    Route::get('/promo', function () { return view('admin.promo'); });
    Route::get('/laporan', function () { return view('admin.laporan'); });
    Route::get('/pengaturan', function () { return view('admin.pengaturan'); });

    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/pemilik', [PemilikController::class, 'index']);
    Route::get('/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik');
    Route::patch('/pemilik/{id}/status', [PemilikController::class, 'updateStatus'])->name('admin.pemilik.status');

    // Manajemen Kos
    Route::get('/kos', [KosController::class, 'index'])->name('admin.kos.index');
    Route::post('/kos/store', [KosController::class, 'store'])->name('admin.kos.store');
    Route::patch('/kos/{id}/approve', [KosController::class, 'approveKos']);
    Route::delete('/kos/{id}/hapus', [KosController::class, 'hapusKos']);
    Route::put('/kos/{id}', [KosController::class, 'update'])->name('admin.kos.update');

    // Manajemen Layanan
    Route::get('/layanan', [ServiceController::class, 'indexAdmin'])->name('admin.layanan.index');
    Route::post('/layanan', [ServiceController::class, 'store'])->name('admin.layanan.store');
    Route::put('/layanan/{id}', [ServiceController::class, 'update'])->name('admin.layanan.update');
    Route::delete('/layanan/{id}/hapus', [ServiceController::class, 'destroy'])->name('admin.layanan.destroy');
    Route::post('/layanan/{id}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('admin.layanan.toggleStatus');
    Route::put('/layanan/{id}/update-harga', [ServiceController::class, 'updateHarga'])->name('admin.layanan.update-harga');

    // Manajemen Artikel
    Route::get('/artikel', [ArtikelController::class, 'indexAdmin'])->name('admin.artikel');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}/hapus', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

    // --- Manajemen Banner Iklan Beranda ---
    Route::get('/banner', [PromoBannerController::class, 'index'])->name('admin.banner');
    Route::post('/banner', [PromoBannerController::class, 'store'])->name('admin.banner.store');
    Route::patch('/banner/{id}/toggle', [PromoBannerController::class, 'toggle'])->name('admin.banner.toggle');
    Route::delete('/banner/{id}', [PromoBannerController::class, 'destroy'])->name('admin.banner.destroy');
});

Route::post('/pesanan/{id}/selesaikan', [App\Http\Controllers\ServiceController::class, 'selesaikanPesanan'])->name('pesanan.selesaikan');

