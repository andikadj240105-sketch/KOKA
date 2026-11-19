<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\User;
use App\Models\PengajuanMitra;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    // FUNGSI 1: TAMPILKAN DATA PEMILIK EKSISTING & PENGAJUAN MITRA BARU
    public function index()
    {
        // 1. Ambil data dari tabel 'kos' yang kolom 'nama_pemilik'-nya sudah diisi manual
        $dataPemilik = Kos::whereNotNull('nama_pemilik')
                          ->where('nama_pemilik', '!=', '')
                          ->latest()
                          ->get()
                          ->map(function($kos) {
            
            // Sesuaikan status untuk tampilan frontend
            $statusFrontend = 'Menunggu';
            if ($kos->status === 'Aktif') {$statusFrontend = 'Terverifikasi';
            } elseif (in_array($kos->status, ['Nonaktif', 'Ditolak', 'Ditangguhkan'])) {$statusFrontend = 'Ditolak';
            }

            // Format data agar sesuai dengan variabel di file view pemilik.blade.php
            return (object) [
                'id'             => $kos->id,
                'nama'           => $kos->nama_pemilik,
                'email'          => 'Pemilik Properti',
                'hp'             => $kos->hp_pemilik ?? '-',
                'kos'            => 1, 
                'nama_kos'       => $kos->nama,
                'lokasi'         => $kos->lokasi,
                'sekitar_kampus' => $kos->sekitar_kampus ?? 'Tidak diatur',
                'status'         => $statusFrontend, 
                'avatar'         => strtoupper(substr($kos->nama_pemilik, 0, 2))
            ];
        });

        // 2. Ambil data pengajuan kemitraan baru dari form /mitra-kos
        $pengajuans = PengajuanMitra::latest()->get();

        return view('admin.pemilik', [
            'ownersData' => $dataPemilik,
            'pengajuans' => $pengajuans
        ]);
    }

    // FUNGSI 2: VERIFIKASI (Ubah ke Aktif untuk tabel User - Opsional)
    public function verify($id)
    {
        $user = User::findOrFail($id);$user->update(['status' => 'Aktif']);
        
        return redirect()->back()->with('success', 'Akun pemilik ' . $user->nama . ' berhasil diverifikasi.');
    }

    // FUNGSI 3: TOLAK (Ubah ke Nonaktif untuk tabel User - Opsional)
    public function reject($id)
    {
        $user = User::findOrFail($id);$user->update(['status' => 'Nonaktif']);
        
        return redirect()->back()->with('success', 'Verifikasi akun ' . $user->nama . ' telah ditolak.');
    }

    // FUNGSI 4: SUSPEND (Ubah ke Ditangguhkan untuk tabel User - Opsional)
    public function suspend($id)
    {
        $user = User::findOrFail($id);$user->update(['status' => 'Ditangguhkan']);
        
        return redirect()->back()->with('success', 'Akun pemilik ' . $user->nama . ' berhasil ditangguhkan.');
    }

    // ================= FITUR KEMITRAAN BARU (/mitra-kos) =================

    // Menampilkan halaman formulir pendaftaran mitra kos
    public function formPengajuan()
    {
        return view('mitra-kos');
    }

    // Memproses form: Simpan ke DB, kirim notif admin, dan redirect ke WhatsApp
    public function storePengajuan(Request $request)
    {
        $request->validate([
            'nama'              => 'required|string|max:255',
            'no_telpon'         => 'required|string|max:25',
            'nama_kosan'        => 'required|string|max:255',
            'alamat_kosan'      => 'required|string',
            'jumlah_kamar'      => 'required|integer|min:1',
            'paket_pengelolaan' => 'required|in:Auto Pilot,Full Service',
        ]);

        // 1. Simpan data ke database
        PengajuanMitra::create([
            'nama'              => $request->nama,
            'no_telpon'         => $request->no_telpon,
            'nama_kosan'        => $request->nama_kosan,
            'alamat_kosan'      => $request->alamat_kosan,
            'jumlah_kamar'      => $request->jumlah_kamar,
            'paket_pengelolaan' => $request->paket_pengelolaan,
            'status'            => 'Menunggu Survei',
        ]);

        // 2. Buat notifikasi internal di Panel Admin
        $admins = User::whereIn('role', ['admin', 'owner'])->get();
        foreach ($admins as$admin) {
            Notifikasi::create([
                'user_id' => $admin->id,
                'judul'   => 'Pengajuan Mitra Kos Baru',
                'pesan'   => $request->nama . ' mengajukan pengelolaan untuk ' . $request->nama_kosan . ' (' .$request->paket_pengelolaan . ').',
                'ikon'    => 'Home',
                'is_read' => 0,
            ]);
        }

        // 3. Susun format pesan otomatis ke WhatsApp Admin
        $pesanWa = "Halo Admin *Kosan Kampus*, saya tertarik mendaftarkan kos saya untuk dikelola:%0A%0A"
                 . "*Nama Pemilik:* " . $request->nama . "%0A"
                 . "*No. Telepon / WA:* " . $request->no_telpon . "%0A"
                 . "*Nama Kosan:* " . $request->nama_kosan . "%0A"
                 . "*Alamat Kosan:* " . $request->alamat_kosan . "%0A"
                 . "*Jumlah Kamar:* " . $request->jumlah_kamar . " Kamar%0A"
                 . "*Paket Pengelolaan:* *" . $request->paket_pengelolaan . "*%0A%0A"
                 . "Mohon informasi lebih lanjut dan jadwal surveinya. Terima kasih!";

        return redirect()->away("https://wa.me/6282116530496?text=" . $pesanWa);
    }

    // Update status tindak lanjut pengajuan mitra di Panel Admin
    public function updateStatus(Request $request,$id)
    {
        $request->validate([
            'status' => 'required|string|max:100'
        ]);

        $pengajuan = PengajuanMitra::findOrFail($id);$pengajuan->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status pengajuan mitra ' . $pengajuan->nama_kosan . ' berhasil diperbarui.');
    }
}