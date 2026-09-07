<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman login admin
    public function showLogin()
    {
        return view('admin.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        if ($request->email === 'admin@kosan.id' && $request->password === 'admin123') {
            // Jika berhasil, arahkan ke dashboard admin
            return redirect('/admin');
        }
        
        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->with('error', 'Email atau password salah. Coba lagi.');
    }

    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
        $totalListings = 4;
        $listings = [
            [
                'category' => 'Kosan Kampus',
                'name' => 'Wisma Kampus Hasanah',
                'location' => 'Buah Batu, Bandung',
                'price' => 12000000,
                'period' => 'tahun',
                'color_a' => '#0b2046',
                'color_b' => '#132A50'
            ],
            [
                'category' => 'Kosan Kampus',
                'name' => 'Pondok Ilmu',
                'location' => 'Sukapura, Bandung',
                'price' => 11000000,
                'period' => 'tahun',
                'color_a' => '#0b2046',
                'color_b' => '#132A50'
            ]
        ];

        return view('admin.dashboard', compact('totalListings', 'listings'));
    }
}