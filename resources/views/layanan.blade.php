<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Layanan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <!-- Konten Utama Layanan -->
  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6 lg:py-12 min-h-[70vh]">
    
    <!-- Page Head (Tombol Kembali & Judul) -->
    <div class="mb-8">
      <a href="/" class="mb-6 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#0b2046]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg> 
        Kembali
      </a>
      <h1 class="font-display text-[24px] lg:text-[32px] font-bold text-[#0b2046]">Layanan KOKA</h1>
      <p class="mt-1.5 text-[14px] text-[#64748b]">Semua kebutuhan anak kos dalam satu aplikasi. Klik layanan untuk memesan.</p>
    </div>

    <!-- Grid Layanan -->
    <div class="grid grid-cols-2 gap-3.5 sm:grid-cols-3 lg:grid-cols-5">
      
        <!-- 1. KosanJek -->
        <button onclick="openModal('KosanJek')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
        <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M11 7c2 0 3-.5 3-.5s.5-1.5.5-2.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 14H14"/><path stroke-linecap="round" stroke-linejoin="round" d="m14 10-2-3-2 3H6.5"/><path stroke-linecap="round" stroke-linejoin="round" d="m8.5 11 2-4-2-4"/><path stroke-linecap="round" stroke-linejoin="round" d="M11.5 7h4"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 10a1 1 0 0 0-1-1h-2.5"/></svg>
        </div>
        <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanJek</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Antar-jemput & Pengantaran</div>
        </div>
    </button>

        <!-- 2. KosanMove -->
        <button onclick="openModal('KosanMove')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 9h4l4 4v5c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanMove</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Pindahan Mudah</div>
          </div>
        </button>

        <!-- 3. KosanClean -->
        <button onclick="openModal('KosanClean')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanClean</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Kebersihan Terjaga</div>
          </div>
        </button>

        <!-- 4. KosanFix -->
        <button onclick="openModal('KosanFix')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          </div>
          <div>
            <div  class="font-display text-[14px] font-semibold text-[#0b2046]">KosanFix</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Perawatan & Perbaikan</div>
          </div>
        </button>

        <!-- 5. KosanLaundry -->
        <button onclick="openModal('KosanLaundry')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanLaundry</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Laundry Praktis</div>
          </div>
        </button>

        <!-- 6. KosanMart -->
        <button onclick="openModal('KosanMart')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m5 11 4-7"/><path stroke-linecap="round" stroke-linejoin="round" d="m19 11-4-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 11h20"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanMart</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Kebutuhan Harian</div>
          </div>
        </button>

        <!-- 7. KosanStorage -->
        <button onclick="openModal('KosanStorage')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m7.5 4.27 9 5.15"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.3 7 8.7 5 8.7-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 22V12"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanStorage</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Titip Barang Aman</div>
          </div>
        </button>

        <!-- 8. Lapor Masalah -->
        <button onclick="openModal('Lapor Masalah')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 22v-7"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">Lapor Masalah</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Laporkan Masalah</div>
          </div>
        </button>

       <!-- 9. KOKA Rewards -->
        <a href="/rewards" class="group w-full flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5 cursor-pointer">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><rect x="3" y="8" width="18" height="4" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KOKA Rewards</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Point & Keuntungan</div>
          </div>
        </a>

        <!-- 10. KOKA Care -->
        <a href="/kokacare" class="group w-full flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5 cursor-pointer">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KOKA Care</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Bantuan 24/7 untukmu</div>
          </div>
        </a>

    </div>
  </main>

  <x-modal-layanan />

  <x-footer />

</body>
</html>