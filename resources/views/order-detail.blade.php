<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - KOKA Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <!-- Container Utama -->
  <main class="mx-auto max-w-2xl px-4 py-8 sm:px-6">
    
    <!-- Tombol Kembali ke Beranda -->
    <a href="/" class="mb-5 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#0b2046]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
      Beranda
    </a>

    <!-- Kotak Detail Pesanan -->
    <div class="rounded-2xl border border-[#e2e8f0] bg-white p-6 sm:p-8">
      
      <!-- Header -->
      <div class="flex items-center gap-3">
        <div class="grid h-12 w-12 place-items-center rounded-full bg-green-50">
          <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </div>
        <div>
          <h1 class="font-display text-xl font-bold text-[#0b2046]">Detail Pesanan</h1>
          <p class="text-sm text-[#64748b]">Order ID KOKA-123456</p>
        </div>
      </div>

      <!-- Ringkasan Data -->
      <div class="mt-6 space-y-2.5 text-sm">
        
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Jenis</span>
          <span class="font-medium text-[#0b2046]">Layanan</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Judul</span>
          <span class="font-medium text-[#0b2046]">KosanJek</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Pelanggan</span>
          <span class="font-medium text-[#0b2046]">Andika Dwi Januar</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Lokasi Penjemputan</span>
          <span class="font-medium text-[#0b2046]">UPI Cibiru</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Tanggal</span>
          <span class="font-medium text-[#0b2046]" id="orderDate">-</span>
        </div>

        <div class="my-3 border-t border-dashed border-[#e2e8f0]"></div>
        
        <div class="flex justify-between gap-4">
          <span class="text-[#64748b]">Total Pembayaran</span>
          <span class="font-medium text-[#0b2046]">Rp 30.000</span>
        </div>
        <div class="flex justify-between pt-1">
          <span class="text-[#64748b]">Status</span>
          <span class="rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-600">
            Berhasil
          </span>
        </div>

      </div>

      <!-- Tombol Aksi -->
      <div class="mt-7 grid gap-3 sm:grid-cols-2">
        <!-- Tombol Unduh Struk -->
        <button onclick="showToast('Struk berhasil diunduh')" class="flex items-center justify-center gap-2 rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
          Unduh Struk
        </button>
        <!-- Tombol Hubungi KOKA Care -->
        <button onclick="showToast('Menghubungkan ke KOKA Care...')" class="flex items-center justify-center gap-2 rounded-xl bg-[#0b2046] px-4 py-3 text-sm font-bold text-white transition hover:opacity-90">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
          Hubungi KOKA Care
        </button>
      </div>

    </div>
  </main>

  <x-footer />

 <script>
    // 1. Fungsi ditaruh di luar agar bebas dipanggil oleh tombol mana saja (Global Scope)
    function showToast(message) {
        // Buat elemen kotak toast
        const toast = document.createElement('div');
        // Styling menggunakan warna KOKA (Navy & Emas)
        toast.className = 'fixed top-5 left-1/2 -translate-x-1/2 z-[100] flex items-center gap-2 rounded-xl bg-[#0b2046] px-5 py-3.5 text-sm font-semibold text-white shadow-2xl transition-all duration-300 transform -translate-y-10 opacity-0';
        toast.innerHTML = `
            <svg class="h-5 w-5 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            ${message}
        `;
        
        document.body.appendChild(toast);
        
        // Animasi masuk (muncul & turun sedikit)
        setTimeout(() => {
            toast.classList.remove('-translate-y-10', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 10);
        
        // Animasi keluar setelah 3 detik
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('-translate-y-10', 'opacity-0');
            // Hapus dari HTML setelah animasi selesai
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // 2. Kode tanggal tetap dibiarkan di dalam DOMContentLoaded
    document.addEventListener("DOMContentLoaded", () => {
        const today = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        document.getElementById('orderDate').innerText = today;
    });
  </script>
</body>
</html>