<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; 
use App\Events\OrderUpdated; // <-- Wajib di-import untuk trigger Pusher

class ServiceController extends Controller
{
    public function indexUser()
    {
        $services = Service::all();
        return view('layanan', compact('services'));
    }

   public function storeOrder(Request $request)
    {
        // 1. VALIDASI INPUT DINAMIS
        $request->validate([
            'service_name'      => 'required|string',
            'nama'              => 'required|string|max:255',
            'no_hp'             => 'nullable|string|max:20',
            'hp'                => 'nullable|string|max:20', 
            'pickup'            => 'nullable|string',
            'tujuan'            => 'nullable|string',
            'alamat'            => 'nullable|string', 
            'asal'              => 'nullable|string',   
            'tanggal'           => 'nullable|date',
            'jam'               => 'nullable',
            'kendaraan'         => 'nullable|string',
            'tipe_mobil'        => 'nullable|string', 
            'ruangan'           => 'nullable|string', 
            'langganan'         => 'nullable|string', 
            'lantai'            => 'nullable|string',
            'luas'              => 'nullable|string',
            'jenis'             => 'nullable|string',
            'kategori'          => 'nullable|string',
            'deskripsi'         => 'nullable|string',
            'berat'             => 'nullable|string',
            'catatan'           => 'nullable|string',
            'harga_total'       => 'nullable|numeric', 
            'foto'              => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bukti_pembayaran'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. MENGAMBIL HARGA DASAR
        $layanan = \Illuminate\Support\Facades\DB::table('services')
                    ->where('nama', $request->service_name)
                    ->first();
                    
        $hargaDasar = $layanan ? $layanan->harga : 0;
        $hargaValid = $request->filled('harga_total') ? $request->harga_total : $hargaDasar;

        // 3. UPLOAD BUKTI PEMBAYARAN (Jika ada dari alur lain, biarkan sebagai fallback)
        $fileName = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_pembayaran', $fileName);
        }

        // 4. UPLOAD FOTO KERUSAKAN (KOSAN FIX)
        $fotoKerusakanName = null;
        if ($request->hasFile('foto')) {
            $fileFoto = $request->file('foto');
            $fotoKerusakanName = 'fix_' . time() . '_' . $fileFoto->hashName();
            $fileFoto->storeAs('bukti_pembayaran', $fotoKerusakanName, 'public');
        }
        $userId = session('user_id') ?? auth()->id();

        // 5. PEMETAAN DATA UMUM
        $no_hp_final   = $request->no_hp ?? $request->hp ?? '-';
        $pickup_final  = $request->pickup ?? $request->asal ?? $request->alamat ?? '-';
        $tujuan_final  = $request->tujuan ?? $request->alamat ?? '-';
        $tanggal_final = $request->tanggal ?? now()->format('Y-m-d');
        $jam_final     = $request->jam ?? '-';

        $kendaraanFinal = $request->kendaraan ?? $request->tipe_mobil;

        // 6. SIMPAN KE TABEL BOOKINGS
        $booking = Booking::create([
            'user_id'             => $userId,
            'layanan'             => $request->service_name,
            'nama'                => $request->nama,
            'no_hp'               => $no_hp_final,
            'pickup'              => $pickup_final,
            'tujuan'              => $tujuan_final,
            'tanggal'             => $tanggal_final,
            'jam'                 => $jam_final,
            'status'              => 'Menunggu Pembayaran', 
            'total_harga'         => $hargaValid, 
            'foto'                => $fotoKerusakanName,
            'bukti_pembayaran'    => $fileName,
            'catatan'             => $request->catatan,
            'berat_laundry'       => $request->langganan, 
            'kendaraan'           => $kendaraanFinal, 
            'lift'                => $request->tipe_mobil, 
            'ruangan'             => $request->ruangan, 
            'lantai'              => $request->lantai,
            'luas_ruangan'        => $request->luas,
            'jenis_layanan'       => $request->jenis,
            'kategori_kerusakan'  => $request->kategori,
            'deskripsi_kerusakan' => $request->deskripsi,
        ]);
        event(new OrderUpdated($booking));
        // === 7. BLOK NOTIFIKASI PESANAN BARU (MENUNGGU PEMBAYARAN) ===
        if ($userId) {
            $pesanNotif = 'Pesanan ' . $booking->layanan . ' berhasil dibuat. Silakan selesaikan pembayaran atau cek menu Pesanan Saya.';
            
            \App\Models\Notifikasi::create([
                'user_id' => $userId, 
                'judul'   => 'Menunggu Pembayaran', 
                'pesan'   => $pesanNotif, 
                'ikon'    => 'Wallet',
                'is_read' => 0
            ]);
            
            try {
                \Illuminate\Support\Facades\Http::withHeaders([
                    'Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'), 
                    'accept'        => 'application/json', 
                    'content-type'  => 'application/json'
                ])->post('https://onesignal.com/api/v1/notifications', [
                    'app_id'          => env('ONESIGNAL_APP_ID'), 
                    'include_aliases' => ['external_id' => [(string) $userId]], 
                    'target_channel'  => 'push', 
                    'headings'        => ['en' => 'Menunggu Pembayaran'], 
                    'contents'        => ['en' => $pesanNotif], 
                    'url'             => url('/pesanan') 
                ]);
            } catch (\Exception $e) {}
        }
        // === AKHIR BLOK NOTIFIKASI ===

        // 8. LOGIKA BYPASS WHATSAPP UNTUK GUEST KOS
        $cekLayanan = strtolower(str_replace(' ', '', $request->service_name));
        if ($cekLayanan === 'guestkost' || $cekLayanan === 'guestkos') {
            $pesanWa = "Halo Admin KOKA, saya ingin Booking *Guest Kos*:%0A%0A"
                     . "*Nama Pemesan:* " . $request->nama . "%0A"
                     . "*No HP:* " . ($request->hp ?? $request->no_hp) . "%0A"
                     . "*Alamat Asal:* " . $request->alamat . "%0A"
                     . "*Pilihan Kos:* " . $request->tujuan . "%0A"
                     . "*Tanggal Masuk:* " . $request->tanggal . "%0A"
                     . "*Catatan Tambahan:* " . $request->catatan;
                     
            return redirect()->away("https://wa.me/6282116530496?text=" . $pesanWa);
        }

        // 9. REDIRECT KE HALAMAN PEMBAYARAN
        return redirect()->route('pembayaran.layanan', ['id' => $booking->id]);
    }

    public function showPembayaranLayanan($id)
    {
        $order = Booking::findOrFail($id);
        return view('pembayaran', compact('order'));
    }

    public function markAsCompleted()
    {
        $order = session('order_detail');
        
        if ($order) {
            $booking = Booking::where('id', $order->id)->first();
            if ($booking) {
                $booking->update([
                    'status' => 'Selesai'
                ]);
                event(new OrderUpdated($booking));
            }
        }

        return redirect('/order-detail');
    }

    public function accBooking($id)
    {
        $booking = Booking::findOrFail($id);
        
        $booking->update([
            'status' => 'Berhasil' 
        ]);

        // === TRIGGER REALTIME PUSHER ===
        event(new OrderUpdated($booking));
        // ================================

        if ($booking->user_id) {
            $pesanNotif = 'Pembayaran untuk layanan ' . $booking->layanan . ' telah berhasil diverifikasi oleh Admin.';

            Notifikasi::create([
                'user_id' => $booking->user_id,
                'judul'   => 'Pembayaran Diverifikasi',
                'pesan'   => $pesanNotif,
                'ikon'    => 'CreditCard',
                'is_read' => 0,
            ]);

            Http::withHeaders([
                'Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'),
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])->post('https://onesignal.com/api/v1/notifications', [
                'app_id' => env('ONESIGNAL_APP_ID'),
                'include_aliases' => ['external_id' => [(string) $booking->user_id]], 
                'target_channel' => 'push',
                'headings' => ['en' => 'Pembayaran Diverifikasi'],
                'contents' => ['en' => $pesanNotif],
                'url' => url('/pesanan'),
            ]);
        }

        return redirect()->back()->with('success', 'Orderan berhasil di-ACC dan pendapatan diperbarui!');
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'metode_pembayaran' => 'required|string',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $booking = Booking::findOrFail($request->order_id);

        if (!$request->hasFile('bukti') && $request->metode_pembayaran == 'cash_pending') {
            $booking->update([
                'metode_pembayaran' => 'cash',
                'status'            => 'Bayar di Tempat'
            ]);
            
            event(new OrderUpdated($booking));

            return response()->json([
                'success' => true, 
                'redirect' => true, 
                'url' => url('/pesanan')
            ]);
        }

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti_pembayaran', $filename, 'public');

            $metodeFinal = str_replace('_pending', '', $request->metode_pembayaran);

            $booking->update([
                'bukti_pembayaran' => $filename,
                'status' => 'Menunggu Verifikasi',
                'metode_pembayaran' => $metodeFinal
            ]);

            // === TRIGGER REALTIME PUSHER ===
            event(new OrderUpdated($booking));
            // ================================

            $userId = auth()->id();
            $namaPemesan = auth()->user()->nama ?? auth()->user()->name ?? 'Seseorang';

            if ($userId) {
                $pesanNotif = 'Bukti pembayaran untuk ' . $booking->layanan . ' berhasil diunggah. Mohon tunggu verifikasi admin.';
                Notifikasi::create(['user_id' => $userId, 'judul' => 'Bukti Terkirim', 'pesan' => $pesanNotif, 'ikon' => 'CalendarCheck', 'is_read' => 0]);
                
                try {
                    Http::withHeaders(['Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'), 'accept' => 'application/json', 'content-type' => 'application/json'])
                        ->post('https://onesignal.com/api/v1/notifications', ['app_id' => env('ONESIGNAL_APP_ID'), 'include_aliases' => ['external_id' => [(string) $userId]], 'target_channel' => 'push', 'headings' => ['en' => 'Bukti Terkirim'], 'contents' => ['en' => $pesanNotif], 'url' => url('/pesanan')]);
                } catch (\Exception $e) {}
            }

            $admins = User::whereIn('role', ['admin', 'owner'])->get();
            $adminIds = [];
            foreach ($admins as $admin) {
                Notifikasi::create(['user_id' => $admin->id, 'judul' => 'Bukti Diunggah', 'pesan' => $namaPemesan . ' mengunggah bukti untuk ' . $booking->layanan . '.', 'ikon' => 'CreditCard', 'is_read' => 0]);
                $adminIds[] = (string) $admin->id;
            }

            if (!empty($adminIds)) {
                try {
                    Http::withHeaders(['Authorization' => 'Basic ' . env('ONESIGNAL_REST_API_KEY'), 'accept' => 'application/json', 'content-type' => 'application/json'])
                        ->post('https://onesignal.com/api/v1/notifications', ['app_id' => env('ONESIGNAL_APP_ID'), 'include_aliases' => ['external_id' => $adminIds], 'target_channel' => 'push', 'headings' => ['en' => 'Bukti Diunggah'], 'contents' => ['en' => $namaPemesan . ' mengunggah bukti untuk ' . $booking->layanan], 'url' => url('/admin/layanan')]);
                } catch (\Exception $e) {}
            }

            return response()->json(['success' => true, 'message' => 'Bukti berhasil diunggah']);
        }

        return response()->json(['success' => false, 'message' => 'File bukti pembayaran wajib diunggah!']);
    }

    public function indexAdmin()
    {
        $services = Service::all();
        $allOrders = Booking::latest()->get(); 

        $layananData = $services->map(function ($service) {
            $keyword = strtolower(str_replace(' ', '', $service->nama));

            $totalOrder = DB::table('bookings')
                ->whereRaw("LOWER(REPLACE(layanan, ' ', '')) LIKE ?", ["%{$keyword}%"])
                ->count();

            $pendapatan = DB::table('bookings')
                ->whereRaw("LOWER(REPLACE(layanan, ' ', '')) LIKE ?", ["%{$keyword}%"])
                ->where('status', 'Berhasil')
                ->sum('total_harga');

            return [
                'id' => $service->id,
                'nama' => $service->nama,
                'deskripsi' => $service->deskripsi,
                'status' => $service->status ?? 'Aktif',
                'total_order' => $totalOrder,
                'pendapatan' => $pendapatan,
            ];
        });

        return view('admin.layanan', compact('layananData', 'allOrders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Service::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => 'Aktif',
            'total_order' => 0,
            'pendapatan' => 0,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }

    public function toggleStatus(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $newState = $request->input('is_active', $service->is_active ? 0 : 1);
        
        $service->update([
            'is_active' => $newState
        ]);

        return response()->json(['success' => true, 'is_active' => $newState]);
    }

    public function paymentSuccess()
    {
        return view('pembayaran-berhasil');
    }

    public function riwayatPesanan()
    {
        $pesanans = Booking::where('user_id', auth()->id())
                    ->latest()
                    ->get();

        return view('pesanan', compact('pesanans'));
    }

    public function updateHarga(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga'     => 'required|numeric|min:0'
        ]);

        $service = Service::findOrFail($id);
        
        $extraPrices = [];
        if ($service->nama === 'Kosan Jek') {
            $extraPrices = [
                'Motor' => $request->harga_motor ?? $request->harga,
                'Mobil' => $request->harga_mobil ?? ($request->harga + 10000)
            ];
        } elseif ($service->nama === 'Kosan Move') {
            $extraPrices = [
                'Avanza'        => $request->harga_avanza ?? 165000,
                'Mobil Pick Up' => $request->harga_pickup ?? 260000,
                'Truk'          => $request->harga_truk ?? 550000
            ];
        } elseif ($service->nama === 'Kosan Clean') {
            $extraPrices = [
                '1 kamar kost'                  => $request->harga_kamarkost ?? 75000,
                '1 kamar mandi'                 => $request->harga_kamarmandi ?? 100000,
                '1 kamar kost dan 1 kamar mandi'=> $request->harga_kombinasi ?? 150000
            ];
        } elseif ($service->nama === 'Kosan Laundry') {
            $extraPrices = [
                '1 Semester' => $request->harga_semester ?? 900000,
                '1 Tahun'    => $request->harga_tahun ?? 1500000
            ];
        }

        $service->update([
            'nama'          => $request->nama,
            'deskripsi'     => $request->deskripsi,
            'harga'         => $request->harga,
            'options_harga' => !empty($extraPrices) ? json_encode($extraPrices) : null
        ]);

        return back()->with('success', 'Tarif dan kategori kendaraan berhasil diperbarui!');
    }

    public function selesaikanPesanan($id)
    {
        $booking = \App\Models\Booking::find($id);

        if ($booking) {
            $booking->update([
                'status' => 'Selesai'
            ]);

            // === TRIGGER REALTIME PUSHER ===
            event(new OrderUpdated($booking));
            // ================================

            return redirect()->back()->with('success', 'Terima kasih! Pesanan telah ditandai selesai.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
    }

    public function getOrdersRealtime()
    {
        $allOrders = \App\Models\Booking::latest()->get(); 
        
        $mappedOrders = $allOrders->map(function($o) {
            return [
                'id' => '#ORD-' . str_pad($o->id, 4, '0', STR_PAD_LEFT),
                'raw_id' => $o->id,
                'layanan' => $o->layanan,
                'user' => $o->nama ?? 'User',
                'no_hp' => $o->no_hp ?? '-',
                'driver' => '-',
                'pickup' => $o->pickup ?? '-',
                'dest' => $o->tujuan ?? '-',
                'tanggal' => $o->tanggal ?? '-',
                'jam' => $o->jam ?? '-',
                'catatan' => $o->catatan ?? '',
                'kendaraan' => $o->kendaraan ?? null,
                'lantai' => $o->lantai ?? null,
                'lift' => $o->lift ?? null,
                'ruangan' => $o->ruangan ?? null,
                'luas_ruangan' => $o->luas_ruangan ?? null,
                'jenis_layanan' => $o->jenis_layanan ?? null,
                'kategori_kerusakan' => $o->kategori_kerusakan ?? null,
                'deskripsi_kerusakan' => $o->deskripsi_kerusakan ?? null,
                'berat_laundry' => $o->berat_laundry ?? null,
                'harga' => $o->total_harga ?? 0,
                'status' => $o->status,
                'bukti' => $o->bukti_pembayaran,
                'foto' => $o->foto ?? null
            ];
        });

        return response()->json($mappedOrders);
    }
}