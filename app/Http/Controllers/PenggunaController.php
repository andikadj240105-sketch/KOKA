<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        // Ambil semua pengguna dari database (sesuaikan role jika perlu)
        $penggunaDariDB = User::orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama' => $item->nama,
                    'email' => $item->email,
                    'hp' => $item->hp ?? '-',
                    'bergabung' => $item->created_at ? $item->created_at->format('d M Y') : '-',
                    'booking' => 0,
                    'status' => $item->status ?? 'Aktif',
                ];
            });

        return view('admin.pengguna', [
            'penggunaData' => $penggunaDariDB
        ]);
    }
}