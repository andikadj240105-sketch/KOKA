<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - KOKA Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <main class="mx-auto max-w-3xl px-4 py-8 sm:px-6 pb-32">
    
    <!-- Header -->
    <div class="mb-8">
        <a href="/" class="mb-4 inline-flex items-center gap-2 text-sm font-semibold text-[#64748b] transition hover:text-[#522b89]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Beranda
        </a>
        <h1 class="font-display text-3xl font-extrabold text-[#522b89]">Pesanan Saya</h1>
        <p class="mt-1 text-sm text-[#64748b]">Lacak status pesanan layanan KOKA kamu di sini.</p>
    </div>

    <!-- Daftar Pesanan -->
    <div class="space-y-6">
        @forelse ($pesanans as $order)
        <div class="rounded-2xl border border-[#e2e8f0] bg-white p-5 shadow-sm">
            
            <!-- Header Kartu: Layanan, Tanggal, dan Status -->
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="font-display text-xl font-bold text-[#522b89]">{{ $order->layanan }}</h2>
                    <p class="mt-1 text-xs text-[#64748b]">{{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d M Y') }}</p>
                </div>
                
                @php
                    // Pewarnaan Badge Status
                    $statusColor = 'bg-gray-100 text-gray-600';
                    if(in_array($order->status, ['Menunggu Pembayaran', 'Menunggu Verifikasi']))$statusColor = 'bg-orange-50 text-orange-600';
                    elseif(in_array($order->status, ['Diproses', 'Dalam Perjalanan']))$statusColor = 'bg-blue-50 text-blue-600';
                    elseif($order->status == 'Berhasil')$statusColor = 'bg-green-50 text-green-600';
                    elseif($order->status == 'Selesai')$statusColor = 'bg-purple-50 text-[#522b89]';
                @endphp
                <span class="rounded-full px-3 py-1.5 text-xs font-bold {{ $statusColor }}">
                    {{ $order->status }}
                </span>
            </div>

            <!-- Body Kartu: Rute & Catatan -->
            <div class="mt-5 rounded-xl border border-[#e2e8f0] bg-gray-50 p-4">
                <div class="relative pl-6 pb-4">
                    <div class="absolute left-1.5 top-1.5 h-2 w-2 rounded-full bg-green-500"></div>
                    <div class="absolute left-2 top-4 h-full w-[1px] border-l border-dashed border-gray-300"></div>
                    <p class="text-[10px] font-bold text-[#64748b]">TITIK JEMPUT / ASAL</p>
                    <p class="text-sm font-medium text-[#1e293b]">{{ $order->pickup ?? $order->asal ?? '-' }}</p>
                </div>
                <div class="relative pl-6">
                    <div class="absolute left-1.5 top-1.5 h-2 w-2 rounded-full bg-blue-500"></div>
                    <p class="text-[10px] font-bold text-[#64748b]">TUJUAN</p>
                    <p class="text-sm font-medium text-[#1e293b]">{{ $order->tujuan ?? '-' }}</p>
                </div>
            </div>
            
            <p class="mt-3 text-sm text-[#1e293b]">
                <span class="font-bold">Catatan:</span> {{ $order->catatan ?? 'Tidak ada catatan tambahan.' }}
            </p>

            <!-- Footer Kartu: Harga -->
            <div class="mt-4 flex items-center justify-between border-t border-[#e2e8f0] pt-4">
                <span class="text-sm font-semibold text-[#64748b]">Total Bayar</span>
                <span class="font-display text-lg font-bold text-[#F39C12]">Rp {{ number_format($order->total_harga ?? 0, 0, ',', '.') }}</span>
            </div>

            <!-- Tombol Aksi Pesanan -->
            <div class="mt-4 flex flex-wrap items-center justify-end gap-3 border-t border-[#e2e8f0] pt-4">
                
                <!-- Muncul jika pembayaran tertunda (termasuk yang menggunakan metode Bayar di Tempat tapi belum upload) -->
                @if($order->status === 'Menunggu Pembayaran' || $order->status === 'Bayar di Tempat' || ($order->status === 'Menunggu Verifikasi' && $order->metode_pembayaran === 'cash_pending'))
                    <a href="{{ route('pembayaran.layanan', $order->id) }}" class="rounded-xl bg-[#F39C12] px-4 py-2.5 text-sm font-bold text-[#522b89] transition hover:opacity-90 shadow-sm">
                        Lanjutkan Pembayaran / Upload Bukti
                    </a>
                @endif

                <!-- Tombol Detail & Lacak Modal -->
                <button onclick="openDetailModal(this)" data-order="{{ json_encode($order) }}" class="rounded-xl border border-[#522b89] bg-white px-4 py-2.5 text-sm font-semibold text-[#522b89] transition hover:bg-[#f8fafc]">
                    Detail & Lacak
                </button>
                
                <!-- Tombol Selesaikan (Hanya muncul jika sedang proses akhir) -->
                @if(in_array($order->status, ['Diproses', 'Dalam Perjalanan', 'Berhasil']))
                <form action="{{ route('pesanan.selesaikan', $order->id) }}" method="POST" onsubmit="return confirm('Apakah pesanan ini sudah benar-benar selesai?');">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 rounded-xl bg-green-500 px-4 py-2.5 text-sm font-bold text-white transition hover:bg-green-600 shadow-sm">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Selesaikan Pesanan
                    </button>
                </form>
                @endif

            </div>
        </div>
        @empty
        <!-- State Kosong -->
        <div class="flex flex-col items-center justify-center rounded-2xl border border-[#e2e8f0] bg-white py-16 text-center">
            <div class="grid h-20 w-20 place-items-center rounded-full bg-gray-50 mb-4">
                <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <h3 class="font-display text-lg font-bold text-[#522b89]">Belum ada pesanan</h3>
            <p class="mt-1 text-sm text-[#64748b]">Kamu belum melakukan pemesanan layanan apapun.</p>
            <a href="/" class="mt-5 rounded-xl bg-[#522b89] px-6 py-2.5 text-sm font-bold text-white transition hover:opacity-90">Pesan Layanan KOKA</a>
        </div>
        @endforelse
    </div>
  </main>

  <!-- MODAL DETAIL & LACAK -->
  <div id="detailModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 transition-opacity">
    <div class="relative w-full max-w-lg rounded-2xl bg-white shadow-2xl" onclick="event.stopPropagation()">
        <!-- Header Modal -->
        <div class="flex items-center justify-between border-b border-[#e2e8f0] p-5">
            <h3 class="font-display text-lg font-bold text-[#522b89]">Detail <span id="modalOrderId" class="text-[#F39C12]"></span></h3>
            <button onclick="closeDetailModal()" class="rounded-full p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Body Modal -->
        <div class="p-5">
            <!-- Timeline Pelacakan -->
            <div class="mb-6 rounded-xl border border-[#e2e8f0] bg-[#f8fafc] p-4 shadow-sm">
                <h4 class="mb-3 text-xs font-bold text-[#64748b] tracking-wider">STATUS PELACAKAN</h4>
                <div class="flex items-center gap-3">
                    <span id="modalStatusIcon" class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-[#522b89] text-white">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <div>
                        <div id="modalStatusTitle" class="font-display font-bold text-[#522b89]">Diproses</div>
                        <div id="modalStatusDesc" class="text-xs text-[#64748b]">Petugas sedang dalam perjalanan.</div>
                    </div>
                </div>
            </div>

            <!-- Informasi Detail -->
            <div class="space-y-3 text-sm">
                <div class="flex justify-between border-b border-[#e2e8f0] pb-3"><span class="text-[#64748b]">Layanan</span><span id="modalLayanan" class="font-semibold text-[#1e293b]"></span></div>
                <div class="flex justify-between border-b border-[#e2e8f0] pb-3"><span class="text-[#64748b]">Pemesan</span><span id="modalNama" class="font-semibold text-[#1e293b]"></span></div>
                <div class="flex justify-between border-b border-[#e2e8f0] pb-3"><span class="text-[#64748b]">Asal / Jemput</span><span id="modalPickup" class="font-semibold text-[#1e293b] text-right max-w-[60%]"></span></div>
                <div class="flex justify-between border-b border-[#e2e8f0] pb-3"><span class="text-[#64748b]">Tujuan</span><span id="modalTujuan" class="font-semibold text-[#1e293b] text-right max-w-[60%]"></span></div>
                <div class="flex justify-between pt-1"><span class="text-[#64748b]">Catatan</span><span id="modalCatatan" class="font-semibold text-[#1e293b] text-right max-w-[60%]"></span></div>
            </div>
        </div>
    </div>
  </div>

  <script>
    function openDetailModal(btnElement) {
        // Parse data JSON yang dititipkan di atribut tombol
        const order = JSON.parse(btnElement.getAttribute('data-order'));
        
        document.getElementById('detailModal').classList.remove('hidden');
        document.getElementById('detailModal').classList.add('flex');
        
        document.getElementById('modalOrderId').innerText = '#KOKA-' + order.id;
        document.getElementById('modalLayanan').innerText = order.layanan || '-';
        document.getElementById('modalNama').innerText = order.nama || '-';
        document.getElementById('modalPickup').innerText = order.pickup || order.asal || '-';
        document.getElementById('modalTujuan').innerText = order.tujuan || '-';
        document.getElementById('modalCatatan').innerText = order.catatan || 'Tidak ada catatan';

        // Logika Status Pelacakan dinamis berdasarkan status database
        let statusTitle = order.status;
        let statusDesc = "Menunggu pembaruan dari admin.";
        let iconHtml = '<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
        let iconBgClass = 'bg-[#522b89]';
        
        if(statusTitle === 'Menunggu Pembayaran' || statusTitle === 'Menunggu Verifikasi') {
            statusDesc = "Admin sedang memverifikasi pembayaran/pesanan Anda.";
            iconBgClass = 'bg-[#F39C12]';
        } else if(statusTitle === 'Diproses') {
            statusDesc = "Pesanan sudah diterima dan sedang dipersiapkan oleh petugas.";
            iconBgClass = 'bg-blue-500';
            iconHtml = '<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>';
        } else if(statusTitle === 'Dalam Perjalanan' || statusTitle === 'Berhasil') {
            statusDesc = "Petugas KOKA sedang menuju ke lokasi Anda.";
            iconBgClass = 'bg-blue-500';
            iconHtml = '<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>';
        } else if(statusTitle === 'Selesai') {
            statusDesc = "Layanan telah selesai dilakukan. Terima kasih telah menggunakan KOKA!";
            iconBgClass = 'bg-green-500';
            iconHtml = '<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>';
        }

        document.getElementById('modalStatusTitle').innerText = statusTitle;
        document.getElementById('modalStatusDesc').innerText = statusDesc;
        
        const iconWrapper = document.getElementById('modalStatusIcon');
        iconWrapper.innerHTML = iconHtml;
        iconWrapper.className = `grid h-10 w-10 shrink-0 place-items-center rounded-full text-white ${iconBgClass}`;
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.getElementById('detailModal').classList.remove('flex');
    }

    // Menutup modal jika klik area luar modal
    document.getElementById('detailModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDetailModal();
        }
    });
  </script>

  <!-- ========================================================= -->
  <!-- SCRIPT REALTIME (LARAVEL ECHO & PUSHER) UNTUK USER        -->
  <!-- ========================================================= -->
  <script type="module">
    document.addEventListener("DOMContentLoaded", function() {
        // Tunggu sampai Vite selesai memuat app.js
        let cekEcho = setInterval(function() {
            if (typeof window.Echo !== 'undefined') {
                clearInterval(cekEcho);
                console.log('✅ Laravel Echo lokal berhasil dimuat!');

                window.Echo.channel('koka-orders')
                    .listen('.status.updated', (e) => {
                        console.log('🟢 Sinyal status diperbarui masuk!', e);
                        
                        let currentUserId = {{ auth()->id() ?? 'null' }};
                        if (e.order && e.order.user_id == currentUserId) {
                            window.location.reload();
                        }
                    });
            }
        }, 500);
    });
</script>

</body>
</html>