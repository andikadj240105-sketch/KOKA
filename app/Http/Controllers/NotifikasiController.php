<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // WAJIB TAMBAHKAN INI

class NotifikasiController extends Controller
{
    public function read($id)
    {
        $notifikasi = DB::table('notifikasi')->where('id', $id)->first();
        
        if ($notifikasi && $notifikasi->user_id == Auth::id()) {
            DB::table('notifikasi')->where('id', $id)->update(['is_read' => 1]);
        }

        return redirect('/pesanan'); 
    }

    public function destroy(Request $request, $id)
    {
        // 1. Eksekusi Hapus Langsung ke Database (Paling Ampuh)
        $deleted = DB::table('notifikasi')
                    ->where('id', $id)
                    ->where('user_id', Auth::id())
                    ->delete();

        // 2. Jika berhasil terhapus dari tabel MySQL
        if ($deleted) {
            $unreadCount = DB::table('notifikasi')
                            ->where('user_id', Auth::id())
                            ->where('is_read', 0)
                            ->count();

            return response()->json([
                'success' => true,
                'message' => 'Berhasil dihapus permanen!',
                'unread_count' => $unreadCount
            ]);
        }

        // 3. Jika gagal (misal: ID tidak ada / bukan milik user)
        return response()->json([
            'success' => false, 
            'message' => 'Gagal menghapus, data tidak ditemukan.'
        ], 400);
    }
}