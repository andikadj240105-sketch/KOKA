<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Booking;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Wajib untuk OneSignal

class KosController extends Controller
{
    public function indexUser(Request $request)
    {
        $query = Kos::query();

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->q . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->q . '%')
                  ->orWhere('alamat_lengkap', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('kampus') && $request->kampus !== 'Pilih Universitas') {
            $query->where(function($q) use ($request) {
                $q->where('sekitar_kampus', 'like', '%' . $request->kampus . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->kampus . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->kampus . '%');
            });
        }

        if ($request->filled('harga_max')) {
            $hargaMax = $request->harga_max;
            $periode  = $request->input('periode', 'bulan'); 

            if ($periode === 'bulan') {
                $query->whereNotNull('harga_bulan')
                      ->where('harga_bulan', '>', 0)
                      ->where('harga_bulan', '<=', $hargaMax);
            } elseif ($periode === '6_bulan') {
                $query->whereNotNull('harga_6_bulan')
                      ->where('harga_6_bulan', '>', 0)
                      ->where('harga_6_bulan', '<=', $hargaMax);
            } elseif ($periode === 'tahun') {
                $query->where(function($q) use ($hargaMax) {
                    $q->where(function($sub) use ($hargaMax) {
                        $sub->whereNotNull('harga_tahun')
                            ->where('harga_tahun', '>', 0)
                            ->where('harga_tahun', '<=', $hargaMax);
                    })->orWhere(function($sub) use ($hargaMax) {
                        $sub->whereNull('harga_tahun')
                            ->whereNotNull('harga')
                            ->where('harga', '>', 0)
                            ->where('harga', '<=', $hargaMax);
                    });
                });
            }
        }

        if ($request->filled('tipe') && $request->tipe !== 'Semua') {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('kategori')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->kategori . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->kategori . '%');
            });
        }

        if ($request->filled('fasilitas')) {
            foreach ($request->fasilitas as $fasilitas) {
                $query->where('fasilitas', 'like', '%' . $fasilitas . '%');
            }
        }

        $kosans = $query->latest()->paginate(9);

        return view('cari-kos', compact('kosans'));
    }

    public function index()
    {
        $kosData = Kos::with('owner')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $statusDb = trim($item->status);
                $finalStatus = empty($statusDb) ? 'Menunggu' : $statusDb;

                $rawFoto = $item->foto_utama ? asset('storage/' . $item->foto_utama) : 'photo-1522771731570-8682deb54f5c';
                $fotoUrl = str_replace('\\', '/', $rawFoto);

                $ratingVal = ($item->rating && $item->rating > 0) ? $item->rating : '4.5';

                return [
                    'id'             => $item->id,
                    'nama'           => e($item->nama ?? '-'),
                    'nama_pemilik'   => e($item->nama_pemilik ?? ''), 
                    'hp_pemilik'     => e($item->hp_pemilik ?? ''),   
                    'pemilik'        => e($item->owner ? $item->owner->nama : 'Tanpa Pemilik'),
                    'lokasi'         => e($item->lokasi ?? '-'),
                    'sekitar_kampus' => e($item->sekitar_kampus ?? '-'),
                    'tipe'           => $item->tipe ?? 'Campur',
                    'harga'          => 'Rp ' . number_format($item->harga ?? 0, 0, ',', '.'),
                    'kamar'          => ($item->kamar_tersedia ?? 0) . '/' . ($item->kamar_total ?? 0),
                    'status'         => $finalStatus,
                    'rating'         => (string) $ratingVal,
                    'img'            => $fotoUrl
                ];
            });

        return view('admin.kos', compact('kosData'));
    }

    public function showUser($id)
    {
        $kos = Kos::with('owner')->findOrFail($id);
        return view('detail-kos', compact('kos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'nama_pemilik'   => 'required|string|max:255', 
            'hp_pemilik'     => 'required|string|max:50',  
            'lokasi'         => 'required|string|max:255',
            'sekitar_kampus' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'tipe'           => 'required|in:Campur,Putra,Putri',
            'harga'          => 'nullable|numeric',
            'harga_6_bulan'  => 'nullable|numeric',
            'harga_tahun'    => 'nullable|numeric',
            'kamar_total'    => 'required|integer',
            'kamar_tersedia' => 'required|integer',
            'deskripsi'      => 'nullable|string',
            'fasilitas'      => 'nullable|string',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->hasFile('foto') ? $request->file('foto')->store('kos', 'public') : null;
        $foto2Path = $request->hasFile('foto_2') ? $request->file('foto_2')->store('kos', 'public') : null;
        $foto3Path = $request->hasFile('foto_3') ? $request->file('foto_3')->store('kos', 'public') : null;
        $foto4Path = $request->hasFile('foto_4') ? $request->file('foto_4')->store('kos', 'public') : null;

        $owner = \App\Models\User::where('role', 'owner')->first();

        $hargaBulanan = $request->harga ?? 0;

        Kos::create([
            'owner_id'       => $owner ? $owner->id : 1,
            'nama_pemilik'   => $request->nama_pemilik, 
            'hp_pemilik'     => $request->hp_pemilik,   
            'nama'           => $request->nama,
            'lokasi'         => $request->lokasi,
            'sekitar_kampus' => $request->sekitar_kampus,
            'alamat_lengkap' => $request->alamat_lengkap,
            'tipe'           => $request->tipe,
            'harga'          => $hargaBulanan,
            'harga_bulan'    => $hargaBulanan,
            'harga_6_bulan'  => $request->harga_6_bulan,
            'harga_tahun'    => $request->harga_tahun,
            'kamar_total'    => $request->kamar_total,
            'kamar_tersedia' => $request->kamar_tersedia,
            'deskripsi'      => $request->deskripsi,
            'fasilitas'      => $request->fasilitas,
            'foto_utama'     => $fotoPath,
            'foto_2'         => $foto2Path, 
            'foto_3'         => $foto3Path, 
            'foto_4'         => $foto4Path, 
            'status'         => 'Aktif',
        ]);

        return redirect('/admin/kos')->with('success', 'Data kos baru berhasil ditambahkan!');
    }

    public function approveKos($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->update(['status' => 'Aktif']);

        return redirect()->back()->with('success', 'Kos ' . $kos->nama . ' berhasil disetujui!');
    }

    public function hapusKos($id)
    {
        $kos = Kos::findOrFail($id);
        $namaKos = $kos->nama;
        $kos->delete();

        return redirect()->back()->with('success', 'Data kos ' . $namaKos . ' berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $kos = Kos::findOrFail($id);

        $request->validate([
            'nama'           => 'required|string|max:255',
            'nama_pemilik'   => 'required|string|max:255', 
            'hp_pemilik'     => 'required|string|max:50',  
            'lokasi'         => 'required|string|max:255',
            'sekitar_kampus' => 'nullable|string|max:255',
            'alamat_lengkap' => 'required|string',
            'tipe'           => 'required|in:Campur,Putra,Putri',
            'harga'          => 'nullable|numeric',
            'kamar_total'    => 'required|integer',
            'kamar_tersedia' => 'required|integer',
            'deskripsi'      => 'nullable|string',
            'fasilitas'      => 'nullable|string',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_2'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_3'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_4'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $dataUpdate = $request->except(['_token', '_method', 'foto', 'foto_2', 'foto_3', 'foto_4']);
        
        $dataUpdate['harga'] = $request->harga ?? 0;
        $dataUpdate['harga_bulan'] = $request->harga ?? 0;

        if ($request->hasFile('foto')) {
            $dataUpdate['foto_utama'] = $request->file('foto')->store('kos', 'public');
        }
        if ($request->hasFile('foto_2')) {
            $dataUpdate['foto_2'] = $request->file('foto_2')->store('kos', 'public');
        }
        if ($request->hasFile('foto_3')) {
            $dataUpdate['foto_3'] = $request->file('foto_3')->store('kos', 'public');
        }
        if ($request->hasFile('foto_4')) {
            $dataUpdate['foto_4'] = $request->file('foto_4')->store('kos', 'public');
        }

        $kos->update($dataUpdate);

        return redirect('/admin/kos')->with('success', 'Data kos berhasil diperbarui!');
    }

    public function toggleFavorite($kosId)
    {
        $userId = auth()->id();
        $existing = \App\Models\Favorite::where('user_id', $userId)->where('kos_id', $kosId)->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed', 'message' => 'Dihapus dari favorit']);
        } else {
            \App\Models\Favorite::create(['user_id' => $userId, 'kos_id' => $kosId]);
            return response()->json(['status' => 'added', 'message' => 'Ditambahkan ke favorit']);
        }
    }

    public function daftarFavorit()
    {
        $favorites = \App\Models\Favorite::where('user_id', auth()->id())->with('kos')->get();
        return view('favorit', compact('favorites'));
    }

    // ======================================================================
    // ALUR PEMESANAN (BOOKING) KOS
    // ======================================================================

    public function formBooking($id)
    {
        $kos = Kos::findOrFail($id);
        return view('booking-form', compact('kos'));
    }

    public function postFormBooking(Request $request)
    {
        $request->validate([
            'kos_id'         => 'required|exists:kos,id',
            'nama'           => 'required|string|max:255',
            'no_hp'          => 'required|string|max:20',
            'email'          => 'required|email|max:255',
            'tanggal_survei' => 'required|date',
            'durasi'         => 'required|string',
            'tanggal_masuk'  => 'required|date',
            'catatan'        => 'nullable|string',
        ]);

        session(['booking_data' => $request->all()]);

        return redirect()->route('kos.ringkasan', ['id' => $request->kos_id]);
    }

    public function showRingkasan($id)
    {
        $kos = Kos::findOrFail($id);
        $booking = session('booking_data');

        if (!$booking) {
            return redirect()->route('kos.booking', $id)->with('error', 'Silakan isi formulir terlebih dahulu.');
        }

        $durasi = trim($booking['durasi']);
        $totalHarga = 0;

        // Logika pengecekan durasi yang akurat sesuai pilihan user
        if (($durasi === '1 Tahun' || str_contains(strtolower($durasi), 'tahun')) && !empty($kos->harga_tahun) && $kos->harga_tahun > 0) {
            $totalHarga = $kos->harga_tahun;
        } elseif (($durasi === '6 Bulan' || str_contains(strtolower($durasi), '6 bulan')) && !empty($kos->harga_6_bulan) && $kos->harga_6_bulan > 0) {
            $totalHarga = $kos->harga_6_bulan;
        } else {
            // Default ke bulanan (1 Bulan atau 3 Bulan)
            $basePrice = $kos->harga_bulan ?? $kos->harga ?? 0;
            $multiplier = 1;
            if (str_contains(strtolower($durasi), '3')) {
                $multiplier = 3;
            }
            $totalHarga = $basePrice * $multiplier;
        }

        $booking['total_harga'] = $totalHarga;

        return view('booking-ringkasan', compact('kos', 'booking'));
    }

    public function storeBookingKos(Request $request)
    {
        $bookingData = session('booking_data');

        if (!$bookingData) {
            return redirect('/cari-kos')->with('error', 'Sesi booking habis.');
        }

        $kos = Kos::findOrFail($bookingData['kos_id']);
        $durasi = trim($bookingData['durasi']);
        $totalHarga = 0;

        // Logika penentuan total harga yang sama persis dengan ringkasan
        if (($durasi === '1 Tahun' || str_contains(strtolower($durasi), 'tahun')) && !empty($kos->harga_tahun) && $kos->harga_tahun > 0) {
            $totalHarga = $kos->harga_tahun;
        } elseif (($durasi === '6 Bulan' || str_contains(strtolower($durasi), '6 bulan')) && !empty($kos->harga_6_bulan) && $kos->harga_6_bulan > 0) {
            $totalHarga = $kos->harga_6_bulan;
        } else {
            $basePrice = !empty($kos->harga_bulan) ? $kos->harga_bulan : (!empty($kos->harga) ? $kos->harga : 2000000);
            $multiplier = 1;
            if (str_contains(strtolower($durasi), '3')) {
                $multiplier = 3;
            }
            $totalHarga = $basePrice * $multiplier; 
        }

        $booking = Booking::create([
            'user_id' => auth()->id() ?? null,
            'kos_id' => $kos->id,
            'layanan' => 'Booking Kos: ' . $kos->nama,
            'nama' => $bookingData['nama'],
            'no_hp' => $bookingData['no_hp'],
            'email' => $bookingData['email'],
            'tanggal_survei' => $bookingData['tanggal_survei'],
            'tanggal_masuk' => $bookingData['tanggal_masuk'],
            'durasi' => $bookingData['durasi'],
            'catatan' => $bookingData['catatan'] ?? null,
            'pickup' => $bookingData['tanggal_survei'],
            'tujuan' => $kos->nama,
            'tanggal' => now(),
            'jam' => '-',
            'status' => 'Pending',
            'total_harga' => $totalHarga,
        ]);

        session()->forget('booking_data');

        $admins = User::whereIn('role', ['admin', 'owner'])->get();
        $adminIds = [];
        foreach ($admins as $admin) {
            $adminIds[] = (string) $admin->id;
        }

        if (!empty($adminIds)) {
            Http::withHeaders([
                'Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'),
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])->post('https://onesignal.com/api/v1/notifications', [
                'app_id' => env('ONESIGNAL_APP_ID'),
                'include_aliases' => ['external_id' => $adminIds], 
                'target_channel' => 'push',
                'headings' => ['en' => 'Pesanan Kos Baru!'],
                'contents' => ['en' => 'Ada booking kos baru masuk, segera cek panel admin.'],
                'url' => url('/admin/booking'),
            ]);
        }

        $pesanWa = "Halo Admin KOKA, saya ingin melanjutkan booking kos:%0A%0A"
                 . "*Kos:* " . $kos->nama . "%0A"
                 . "*Nama Pemesan:* " . $bookingData['nama'] . "%0A"
                 . "*No HP:* " . $bookingData['no_hp'] . "%0A"
                 . "*Rencana Survei:* " . $bookingData['tanggal_survei'] . "%0A"
                 . "*Tanggal Masuk:* " . $bookingData['tanggal_masuk'] . "%0A"
                 . "*Durasi Sewa:* " . $bookingData['durasi'] . "%0A"
                 . "*Total Biaya:* Rp " . number_format($totalHarga, 0, ',', '.');
                 
        return redirect()->away("https://wa.me/6282116530496?text=" . $pesanWa);
    }

    public function showPembayaranKos($id)
    {
        $order = Booking::findOrFail($id);
        return view('pembayaran', compact('order'));
    }

    public function adminBookingIndex()
    {
        $bookings = Booking::with('kos')->whereNotNull('kos_id')->latest()->get();
        return view('admin.booking', compact('bookings'));
    }
}