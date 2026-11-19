<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use App\Models\Service;
use App\Models\Kos;
use App\Models\Booking;
use App\Models\Notifikasi;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }

    public function dashboard()
    {
        // 1. Data untuk Kartu Statistik Atas
        $totalPengguna = User::count();
        $totalLayanan = Service::count();
        $totalKos = Kos::count();
        $totalPendapatan = Booking::whereIn('status', ['Berhasil', 'Selesai'])->sum('total_harga');

        $transaksiTerbaru = Booking::latest()->take(5)->get();

        // 2. Data Grafik Pendapatan & Booking (7 Hari Terakhir)
        $revenueLabels = [];
        $revenueData = [];
        
        $bookingLabels = [];
        $bookingBerhasil = [];
        $bookingPending = [];
        $bookingBatal = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            $revenueLabels[] = $date->translatedFormat('d M');
            $bookingLabels[] = $date->translatedFormat('D'); 

            $dailyBookings = Booking::whereDate('created_at', $date->toDateString())->get();

            $revenueData[] = $dailyBookings->whereIn('status', ['Berhasil', 'Selesai'])->sum('total_harga');

            $bookingBerhasil[] = $dailyBookings->whereIn('status', ['Berhasil', 'Selesai'])->count();
            $bookingPending[] = $dailyBookings->whereIn('status', ['Menunggu', 'Menunggu Pembayaran', 'Menunggu Verifikasi', 'Pending'])->count();
            $bookingBatal[] = $dailyBookings->whereIn('status', ['Dibatalkan', 'Gagal'])->count();
        }

        // 3. Data Grafik Pengguna Baru (9 Bulan Terakhir)
        $userLabels = [];
        $userData = [];
        
        for ($i = 8; $i >= 0; $i--) {
            $date = Carbon::now()->startOfMonth()->subMonths($i);
            $userLabels[] = $date->translatedFormat('M'); 
            $userData[] = User::whereYear('created_at', $date->year)
                              ->whereMonth('created_at', $date->month)
                              ->count();
        }

        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalLayanan',
            'totalKos',
            'totalPendapatan',
            'transaksiTerbaru',
            'revenueLabels', 'revenueData',
            'bookingLabels', 'bookingBerhasil', 'bookingPending', 'bookingBatal',
            'userLabels', 'userData'
        ));
    }

public function notifikasi()
    {
        // Mengambil notifikasi khusus untuk admin yang sedang login
        $notifikasis = Notifikasi::where('user_id', auth()->id())
                                 ->latest()
                                 ->get();
         
        return view('admin.notifikasi', compact('notifikasis'));
    }

    // ==============================================================
    // FUNGSI UNTUK NOTIFIKASI ADMIN (REAL-TIME AJAX)
    // ==============================================================
    
public function destroyNotifikasi(Request $request, $id)
    {
        // 1. Eksekusi Hapus Langsung ke Database (Paling Ampuh)
        $deleted = \Illuminate\Support\Facades\DB::table('notifikasi')
                    ->where('id', $id)
                    ->where('user_id', Auth::id())
                    ->delete();

        // 2. Jika berhasil terhapus dari tabel MySQL
        if ($deleted) {
            $unreadCount = \Illuminate\Support\Facades\DB::table('notifikasi')
                            ->where('user_id', Auth::id())
                            ->where('is_read', 0)
                            ->count();

            return response()->json([
                'success' => true,
                'unread_count' => $unreadCount
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.'], 404);
    }

    public function readNotifikasi($id)
    {
        $notifikasi = Notifikasi::where('id', $id)->where('user_id', Auth::id())->first();
        
        if ($notifikasi && !$notifikasi->is_read) {
            $notifikasi->update(['is_read' => 1]);
        }

        return response()->json(['success' => true]);
    }
}