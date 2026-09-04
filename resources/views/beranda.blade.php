<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Beranda</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <main class="bg-white">
   <!-- ================= HERO SECTION ================= -->
    <section class="relative overflow-hidden">
      <div class="mx-auto grid max-w-[1280px] items-center gap-10 px-4 pb-10 pt-10 sm:px-6 lg:grid-cols-2 lg:pb-20 lg:pt-16">
        
        <div class="animate-in-up">
          
          <!-- Badge -->
          <span class="inline-flex items-center gap-2 rounded-full bg-[#f8fafc] px-3.5 py-1.5 text-xs font-semibold text-[#0b2046]">
            <span class="h-1.5 w-1.5 rounded-full bg-[#E5B044]"></span>
            #1 Student Living Platform di Indonesia
          </span>
          
          <!-- JUDUL & LOGO -->
<div class="mt-4 flex flex-col font-display font-extrabold tracking-tight text-[#0b2046]">
  
  <!-- Baris Pertama -->
  <h1 class="text-[48px] lg:text-[54px] leading-none relative z-20">
      Selamat Datang
  </h1>
  
  <!-- Baris Kedua -->
  <div class="relative mt-4 lg:mt-5 flex items-center h-[54px] lg:h-[60px] z-10">
      <span class="text-[48px] lg:text-[54px] leading-none">di</span>
      
      <!-- 
        GAMBAR MELAYANG
        - Angka left diturunkan menjadi left-[50px] (layar kecil) dan lg:left-[60px] (layar besar)
      -->
      <img src="/kosankampus.png" alt="Kosan Kampus" 
           class="absolute left-[50px] lg:left-[60px] top-1/2 -translate-y-1/2 h-[200px] lg:h-[250px] w-auto mix-blend-multiply object-contain pointer-events-none" />
  </div>
</div>
          
          <!-- Teks Paragraf (Dibuat mt-4 agar lebih merapat ke logo) -->
          <p class="mt-4 max-w-md text-base leading-relaxed text-[#64748b] sm:text-lg">
            Solusi lengkap untuk temukan kosan nyaman dan hidup lebih mudah.
          </p>
          
          <!-- Tombol Aksi (Dibuat mt-5 agar lebih merapat) -->
          <div class="mt-5 flex flex-wrap gap-3">
            <a href="/cari-kos" class="inline-flex items-center justify-center rounded-full bg-[#0b2046] px-6 py-3.5 text-sm font-bold text-white transition hover:opacity-90 shadow-sm">
              Cari Kos Sekarang
            </a>
            <a href="/layanan" class="inline-flex items-center justify-center rounded-full border border-[#e2e8f0] bg-white px-6 py-3.5 text-sm font-bold text-[#0b2046] transition hover:bg-[#f8fafc] hover:border-[#0b2046]">
              Lihat Layanan
            </a>
          </div> 

          <!-- Search widget (Dibuat mt-6 agar lebih merapat, warna diperbaiki) -->
          <div class="mt-6 rounded-2xl border border-[#e2e8f0] bg-white p-2.5 shadow-[0_20px_50px_-24px_rgba(11,42,85,0.4)]">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
              
              <div class="flex flex-1 items-center gap-2.5 rounded-xl px-3 py-2.5">
                <svg class="h-5 w-5 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                <input class="w-full bg-transparent text-sm text-[#1e293b] outline-none placeholder:text-[#64748b]" placeholder="Cari kos, layanan, atau kebutuhanmu..." />
              </div>
              
              <div class="flex items-center gap-2.5 border-t border-[#e2e8f0] px-3 py-2.5 sm:border-l sm:border-t-0">
                <button class="flex items-center gap-1.5 text-sm font-medium text-[#0b2046]">
                  Bandung
                  <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                </button>
              </div>
              
              <button class="inline-flex items-center justify-center rounded-xl bg-[#E5B044] px-6 py-2.5 text-sm font-bold text-[#0b2046] transition hover:opacity-90">Cari</button>
              
            </div>
          </div>

        </div>

        <!-- Hero image with organic curve -->
        <div class="relative animate-in-up">
          <div class="absolute -right-6 -top-6 hidden h-32 w-32 rounded-full bg-[#E5B044]/15 blur-2xl lg:block"></div>
          <div class="relative overflow-hidden rounded-[36px] rounded-tr-[120px] rounded-bl-[120px] bg-[#f8fafc] shadow-[0_30px_70px_-30px_rgba(11,42,85,0.5)]">
            <img src="https://images.unsplash.com/photo-1781249144129-4ba0869707f5?w=900&h=1000&fit=crop&auto=format" alt="Interior kamar kos premium" class="aspect-[4/5] w-full object-cover" />
          </div>
          <div class="absolute -bottom-5 left-4 flex items-center gap-3 rounded-2xl border border-[#e2e8f0] bg-white/95 px-4 py-3 shadow-xl backdrop-blur sm:left-6">
            <div class="grid h-11 w-11 place-items-center rounded-full bg-[#E5B044]/15">
              <span class="text-[#E5B044] font-bold">★</span>
            </div>
            <div>
              <div class="font-display text-base font-bold text-[#0b2046]">4.9/5.0</div>
              <div class="text-[11px] text-[#64748b]">dari 12.400+ penghuni</div>
            </div>
          </div>
          <div class="absolute -right-3 top-8 hidden h-14 w-14 rounded-2xl bg-[#E5B044]/80 sm:block"></div>
        </div>
        
      </div>
    </section>

    <!-- ================= QUICK ACTIONS ================= -->
    <section class="mx-auto max-w-[1280px] px-4 sm:px-6">
      <div class="rounded-[28px] bg-navy p-5 sm:p-8">
        <div class="grid grid-cols-2 gap-3 sm:gap-5 lg:grid-cols-4">
          <button class="group flex items-center gap-3.5 rounded-2xl p-3 text-left transition hover:bg-white/5 sm:p-4">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-white transition group-hover:bg-gold sm:h-14 sm:w-14">
              <svg class="h-5 w-5 text-navy sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
            </div>
            <div>
              <div class="font-display text-sm font-semibold text-white sm:text-base">Cari Kos</div>
              <div class="text-[11px] leading-snug text-white/60 sm:text-xs">Temukan kos terbaik untukmu</div>
            </div>
          </button>
          <button class="group flex items-center gap-3.5 rounded-2xl p-3 text-left transition hover:bg-white/5 sm:p-4">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-white transition group-hover:bg-gold sm:h-14 sm:w-14">
              <svg class="h-5 w-5 text-navy sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
            </div>
            <div>
              <div class="font-display text-sm font-semibold text-white sm:text-base">Bayar Kos</div>
              <div class="text-[11px] leading-snug text-white/60 sm:text-xs">Bayar tagihan lebih mudah</div>
            </div>
          </button>
          <button class="group flex items-center gap-3.5 rounded-2xl p-3 text-left transition hover:bg-white/5 sm:p-4">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-white transition group-hover:bg-gold sm:h-14 sm:w-14">
              <svg class="h-5 w-5 text-navy sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <div>
              <div class="font-display text-sm font-semibold text-white sm:text-base">Kontrak Saya</div>
              <div class="text-[11px] leading-snug text-white/60 sm:text-xs">Lihat kontrak dan dokumenmu</div>
            </div>
          </button>
          <button class="group flex items-center gap-3.5 rounded-2xl p-3 text-left transition hover:bg-white/5 sm:p-4">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-white transition group-hover:bg-gold sm:h-14 sm:w-14">
              <svg class="h-5 w-5 text-navy sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
            </div>
            <div>
              <div class="font-display text-sm font-semibold text-white sm:text-base">Promo</div>
              <div class="text-[11px] leading-snug text-white/60 sm:text-xs">Dapatkan promo menarik</div>
            </div>
          </button>
        </div>
      </div>
    </section>

    <!-- ================= LAYANAN KOKA LENGKAP ================= -->
    <section id="layanan" class="mx-auto max-w-[1280px] scroll-mt-20 px-4 py-16 sm:px-6 lg:py-20">
      <div class="mb-6 flex items-end justify-between">
        <div>
          <h2 class="font-display text-2xl font-bold text-navy sm:text-3xl">Layanan KOKA untukmu</h2>
          <p class="mt-2 text-sm text-slate">Berbagai layanan untuk membuat kehidupanmu lebih nyaman.</p>
        </div>
        <button class="hidden sm:flex text-sm font-semibold text-navy hover:text-gold transition">Lihat Semua →</button>
      </div>
      
      <!-- Grid 10 Item -->
      <div class="grid grid-cols-2 gap-3.5 sm:grid-cols-3 sm:gap-4 lg:grid-cols-5">
        
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
        <button onclick="openModal('LaporMasalah')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 22v-7"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">Lapor Masalah</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Laporkan Masalah</div>
          </div>
        </button>

        <!-- 9. KOKA Rewards -->
        <button onclick="openModal('KOKARewards')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><rect x="3" y="8" width="18" height="4" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KOKA Rewards</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Point & Keuntungan</div>
          </div>
        </button>

        <!-- 10. KOKA Care -->
        <button onclick="openModal('KOKACare')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KOKA Care</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Bantuan 24/7 untukmu</div>
          </div>
        </button>

      </div>
    </section>

    <!-- ================= PROMO BANNER ================= -->
    
      <section id="promo" class="mx-auto max-w-[1280px] scroll-mt-20 px-4 sm:px-6 my-16">
        <div class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-[#0b2046] to-[#071630]">
          <div class="grid gap-8 p-7 sm:p-10 lg:grid-cols-2 lg:items-center lg:p-12">
            
            <!-- Konten Teks Kiri -->
            <div>
              <span id="slideTag" class="inline-flex rounded-full bg-[#E5B044]/20 px-3 py-1 text-xs font-semibold text-[#E5B044] transition-opacity duration-300">
                Promo Spesial
              </span>
              <h2 id="slideTitle" class="mt-4 font-display text-3xl font-extrabold leading-tight text-white sm:text-4xl transition-opacity duration-300">
                Hunian Nyaman,<br>Hidup Lebih Berkualitas
              </h2>
              <p id="slideDesc" class="mt-4 max-w-md text-sm leading-relaxed text-white/70 transition-opacity duration-300">
                Temukan kos terbaik dan layanan pendukung dari KOKA untuk pengalaman ngekos terbaik.
              </p>
              
              <!-- Tombol -->
              <a href="/cari-kos" id="slideLink" class="mt-6 inline-flex items-center justify-center gap-2 rounded-full bg-[#E5B044] px-6 py-3.5 text-sm font-bold text-[#0b2046] transition hover:opacity-90">
                <span id="slideBtnText">Cari Kos Sekarang</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
              </a>
              
              <!-- Indikator Dots -->
              <div class="mt-7 flex gap-2" id="sliderIndicators">
                <button onclick="changeSlide(0)" class="h-1.5 w-8 rounded-full bg-[#E5B044] transition-all duration-300"></button>
                <button onclick="changeSlide(1)" class="h-1.5 w-2.5 rounded-full bg-white/30 transition-all duration-300 hover:bg-white/50"></button>
                <button onclick="changeSlide(2)" class="h-1.5 w-2.5 rounded-full bg-white/30 transition-all duration-300 hover:bg-white/50"></button>
              </div>
            </div>

            <!-- Konten Gambar Kanan -->
            <div class="relative">
              <img id="slideImg" src="https://images.unsplash.com/photo-1774428559037-545b37f3cf9e?w=800&h=600&fit=crop&auto=format" alt="Promo KOKA" class="aspect-[4/3] w-full rounded-3xl object-cover transition-opacity duration-300" />
              
              <!-- Lencana (Badge) Bulat -->
              <div class="absolute -bottom-4 -left-2 grid h-28 w-28 place-items-center rounded-full bg-[#E5B044] text-center text-[#0b2046] shadow-xl sm:-left-5 sm:h-32 sm:w-32 transition-opacity duration-300">
                <div>
                  <div id="slideBadgeVal" class="font-display text-2xl font-extrabold leading-none">1000+</div>
                  <div id="slideBadgeText" class="mt-1 text-[10px] font-semibold leading-tight">
                    Pilihan Kos<br>Tersebar di Banyak Kota
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

    <!-- ================= REKOMENDASI KOS ================= -->
    <!-- ================= REKOMENDASI KOS ================= -->
    <section class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:py-20 font-sans">
      
      <!-- Header Section -->
      <div class="mb-8 flex items-end justify-between">
        <div>
          <h2 class="font-display text-[24px] lg:text-[28px] font-extrabold text-[#0b2046]">Rekomendasi Kos untukmu</h2>
          <p class="mt-2 text-[14px] text-[#64748b]">Pilihan kos terbaik yang paling banyak diminati bulan ini.</p>
        </div>
        <button class="hidden sm:flex items-center gap-1 text-[14px] font-bold text-[#0b2046] hover:text-[#E5B044] transition">
          Lihat Semua →
        </button>
      </div>

      <!-- Grid Carousel -->
      <div class="no-scrollbar -mx-4 flex snap-x gap-5 overflow-x-auto px-4 pb-4 sm:mx-0 sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:px-0">
        
        <!-- CARD 1: Wisma Kampus Hasanah -->
        <div class="w-[85%] shrink-0 snap-start sm:w-auto">
          <!-- Mengubah div luar menjadi a href -->
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            
            <!-- Gambar & Overlay -->
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format" alt="Wisma Kampus Hasanah" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                
                <!-- Badge Kiri Atas -->
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">
                  Kosan Kampus
                </span>
                
                <!-- Tombol Heart Kanan Atas (Ditambahkan preventDefault) -->
                <button onclick="event.preventDefault(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            
            <!-- Konten Text -->
            <div class="p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[15px] font-bold text-[#0b2046] line-clamp-1">Wisma Kampus Hasanah</h3>
                <div class="flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[14px]">★</span> 4.8
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                Buah Batu, Bandung
              </div>
              
              <!-- Fasilitas -->
              <div class="mt-4 flex flex-wrap gap-4 text-[11px] font-medium text-gray-500">
                <span>Kamar Mandi Dalam</span>
                <span>AC</span>
                <span>WiFi</span>
              </div>
              
              <!-- Harga -->
              <div class="mt-6 flex flex-col">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 12.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 2: Pondok Ilmu -->
        <div class="w-[85%] shrink-0 snap-start sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop&auto=format" alt="Pondok Ilmu" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">
                  Kosan Kampus
                </span>
                <button onclick="event.preventDefault(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[15px] font-bold text-[#0b2046] line-clamp-1">Pondok Ilmu</h3>
                <div class="flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[14px]">★</span> 4.7
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                Sukapura, Bandung
              </div>
              <div class="mt-4 flex flex-wrap gap-4 text-[11px] font-medium text-gray-500">
                <span>WiFi</span>
                <span>Furnished</span>
              </div>
              <div class="mt-6 flex flex-col">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 11.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 3: Puri Ananda -->
        <div class="w-[85%] shrink-0 snap-start sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=400&h=300&fit=crop&auto=format" alt="Puri Ananda" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">
                  Eksklusif
                </span>
                <button onclick="event.preventDefault(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[15px] font-bold text-[#0b2046] line-clamp-1">Puri Ananda</h3>
                <div class="flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[14px]">★</span> 4.9
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                Dago, Bandung
              </div>
              <div class="mt-4 flex flex-wrap gap-4 text-[11px] font-medium text-gray-500">
                <span>AC</span>
                <span>Parkir</span>
              </div>
              <div class="mt-6 flex flex-col">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 4: Hesma Residence -->
        <div class="w-[85%] shrink-0 snap-start sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?w=400&h=300&fit=crop&auto=format" alt="Hesma Residence" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">
                  Kosan Kampus
                </span>
                <button onclick="event.preventDefault(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[15px] font-bold text-[#0b2046] line-clamp-1">Hesma Residence</h3>
                <div class="flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[14px]">★</span> 4.6
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                Buah Batu, Bandung
              </div>
              <div class="mt-4 flex flex-wrap gap-4 text-[11px] font-medium text-gray-500">
                <span>Kamar Mandi Dalam</span>
                <span>WiFi</span>
              </div>
              <div class="mt-6 flex flex-col">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>
    </section>

    <!-- ================= TRUST / BENEFITS ================= -->
    <section id="tentang" class="scroll-mt-20 bg-cloud">
      <div class="mx-auto max-w-[1280px] px-4 py-14 sm:px-6">
        <div class="grid grid-cols-2 gap-y-8 lg:grid-cols-4 lg:divide-x lg:divide-line">
          <div class="flex flex-col items-start gap-3 lg:px-8 lg:first:pl-0">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-white text-navy shadow-sm">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
              <div class="font-display text-base font-bold text-navy">Terpercaya</div>
              <p class="mt-1 text-sm text-slate">Ribuan transaksi aman setiap bulan.</p>
            </div>
          </div>
          <div class="flex flex-col items-start gap-3 lg:px-8">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-white text-navy shadow-sm">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
            </div>
            <div>
              <div class="font-display text-base font-bold text-navy">Foto Asli</div>
              <p class="mt-1 text-sm text-slate">100% foto sesuai dengan kondisi nyata kamar.</p>
            </div>
          </div>
          <div class="flex flex-col items-start gap-3 lg:px-8">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-white text-navy shadow-sm">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
              <div class="font-display text-base font-bold text-navy">Proses Cepat</div>
              <p class="mt-1 text-sm text-slate">Booking kos tak sampai 5 menit.</p>
            </div>
          </div>
          <div class="flex flex-col items-start gap-3 lg:px-8">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-white text-navy shadow-sm">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
              <div class="font-display text-base font-bold text-navy">Layanan Bantuan</div>
              <p class="mt-1 text-sm text-slate">Tim support sedia membantu kendala Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= KOTA POPULER ================= -->
    <section class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:py-20">
      <div class="mb-6">
        <h2 class="font-display text-2xl font-bold text-navy sm:text-3xl">Kota Populer</h2>
        <p class="mt-2 text-sm text-slate">Temukan kos idamanmu di kota-kota pelajar terbaik Indonesia.</p>
      </div>
      <div class="no-scrollbar -mx-4 flex snap-x gap-4 overflow-x-auto px-4 pb-2 sm:mx-0 sm:grid sm:grid-cols-3 sm:px-0 lg:grid-cols-5">
        <button class="group relative h-52 w-[60%] shrink-0 snap-start overflow-hidden rounded-2xl sm:w-auto">
          <img src="https://images.unsplash.com/photo-1549473889-14f410d83298?q=80&w=400&auto=format&fit=crop" alt="Kos di Bandung" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4 text-left">
            <div class="font-display text-lg font-bold text-white">Bandung</div>
            <div class="text-xs text-white/70">450+ Kos</div>
          </div>
        </button>
        <button class="group relative h-52 w-[60%] shrink-0 snap-start overflow-hidden rounded-2xl sm:w-auto">
          <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?q=80&w=400&auto=format&fit=crop" alt="Kos di Jakarta" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4 text-left">
            <div class="font-display text-lg font-bold text-white">Jakarta</div>
            <div class="text-xs text-white/70">820+ Kos</div>
          </div>
        </button>
        <button class="group relative h-52 w-[60%] shrink-0 snap-start overflow-hidden rounded-2xl sm:w-auto">
          <img src="https://images.unsplash.com/photo-1584824388155-24d45d6540d9?q=80&w=400&auto=format&fit=crop" alt="Kos di Yogyakarta" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4 text-left">
            <div class="font-display text-lg font-bold text-white">Yogyakarta</div>
            <div class="text-xs text-white/70">310+ Kos</div>
          </div>
        </button>
        <button class="group relative h-52 w-[60%] shrink-0 snap-start overflow-hidden rounded-2xl sm:w-auto">
          <img src="https://images.unsplash.com/photo-1577977464228-b0a514d24a90?q=80&w=400&auto=format&fit=crop" alt="Kos di Surabaya" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4 text-left">
            <div class="font-display text-lg font-bold text-white">Surabaya</div>
            <div class="text-xs text-white/70">280+ Kos</div>
          </div>
        </button>
        <button class="group relative h-52 w-[60%] shrink-0 snap-start overflow-hidden rounded-2xl sm:w-auto">
          <img src="https://images.unsplash.com/photo-1616857643329-a111a681c1c9?q=80&w=400&auto=format&fit=crop" alt="Kos di Malang" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/85 via-navy/20 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4 text-left">
            <div class="font-display text-lg font-bold text-white">Malang</div>
            <div class="text-xs text-white/70">150+ Kos</div>
          </div>
        </button>
      </div>
    </section>

    <!-- ================= HOW IT WORKS ================= -->
    <section class="bg-navy">
      <div class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:py-20">
        <div class="mb-10 text-center">
          <h2 class="font-display text-2xl font-bold text-white sm:text-3xl">
            Cara Kerja KOKA
          </h2>
          <p class="mx-auto mt-2 max-w-md text-sm text-white/60">
            Empat langkah mudah menuju hunian impianmu.
          </p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
          <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-gold">01</div>
            <div class="mt-3 font-display text-base font-semibold text-white">Cari Kos</div>
            <p class="mt-1.5 text-sm leading-relaxed text-white/60">Jelajahi ribuan pilihan kos sesuai budget dan lokasimu.</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-gold">02</div>
            <div class="mt-3 font-display text-base font-semibold text-white">Pilih Hunian</div>
            <p class="mt-1.5 text-sm leading-relaxed text-white/60">Bandingkan fasilitas, harga, dan foto asli setiap kamar.</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-gold">03</div>
            <div class="mt-3 font-display text-base font-semibold text-white">Booking</div>
            <p class="mt-1.5 text-sm leading-relaxed text-white/60">Booking & bayar aman langsung dari aplikasi.</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-gold">04</div>
            <div class="mt-3 font-display text-base font-semibold text-white">Tinggal Nyaman</div>
            <p class="mt-1.5 text-sm leading-relaxed text-white/60">Nikmati layanan pendukung KOKA kapan pun kamu butuh.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= REWARDS + TESTIMONIALS ================= -->
    <section class="mx-auto max-w-[1280px] px-4 py-16 sm:px-6 lg:py-20 font-sans">
      <div class="mb-14 grid gap-10 lg:grid-cols-[1fr_1.2fr] lg:items-center lg:gap-14">
        
        <!-- Kotak Kiri: KOKA Rewards -->
        <div class="overflow-hidden rounded-[28px] bg-[#E5B044] p-8 sm:p-10">
          <span class="inline-flex rounded-full bg-[#0b2046]/10 px-3 py-1.5 text-[11px] font-bold text-[#0b2046] uppercase tracking-wide">
            KOKA Rewards
          </span>
          <h3 class="mt-5 font-display text-[32px] font-extrabold leading-tight text-[#0b2046]">
            Setiap transaksi jadi lebih untung
          </h3>
          <p class="mt-4 max-w-md text-[14px] leading-relaxed text-[#0b2046]/80">
            Kumpulkan poin dari setiap pembayaran & layanan, tukarkan dengan laundry gratis, diskon sewa, dan voucher marketplace.
          </p>
          <button class="inline-flex items-center justify-center rounded-full bg-[#0b2046] px-7 py-3.5 text-[14px] font-bold text-white transition hover:bg-[#0b2046]/90 mt-8 shadow-md">
            Gabung Sekarang
          </button>
        </div>

        <!-- Kolom Kanan: Testimonial -->
        <div class="lg:pl-6">
          <div class="mb-6">
             <h2 class="font-display text-[28px] font-extrabold text-[#0b2046]">Apa kata mereka</h2>
             <p class="mt-1.5 text-[14px] text-gray-500">Ribuan penghuni sudah merasakan mudahnya ngekos bareng KOKA.</p>
          </div>
          
          <div class="grid gap-4 sm:grid-cols-1">
            <!-- Testimoni 1 -->
            <figure class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
              <div class="mb-3 flex gap-1 text-[#E5B044]">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              </div>
              <blockquote class="text-[13px] leading-relaxed text-gray-700">"Sangat ngebantu banget. Bayar bulanan kosan gampang banget. Pas ada masalah tinggal lapor lewat KosanFix. Ngekos di Bandung terasa jauh lebih tenang."</blockquote>
              <figcaption class="mt-4 flex items-center gap-3">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-[#0b2046] font-display text-[13px] font-bold text-[#E5B044]">H</div>
                <div>
                  <div class="text-[13px] font-bold text-[#0b2046]">Hani Puspita</div>
                  <div class="text-[11px] text-gray-500 mt-0.5">Mahasiswa, Telkom University</div>
                </div>
              </figcaption>
            </figure>
            
            <!-- Testimoni 2 -->
            <figure class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
              <div class="mb-3 flex gap-1 text-[#E5B044]">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              </div>
              <blockquote class="text-[13px] leading-relaxed text-gray-700">"Pindahan dari Jakarta ke Bandung dibantu KosanMove, barang aman semua. Poin KOKA Rewards nya juga lumayan buat tuker diskon laundry gratis."</blockquote>
              <figcaption class="mt-4 flex items-center gap-3">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-[#0b2046] font-display text-[13px] font-bold text-[#E5B044]">D</div>
                <div>
                  <div class="text-[13px] font-bold text-[#0b2046]">Dimas Anggara</div>
                  <div class="text-[11px] text-gray-500 mt-0.5">Fresh Graduate</div>
                </div>
              </figcaption>
            </figure>

            <!-- Testimoni 3 -->
            <figure class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
              <div class="mb-3 flex gap-1 text-[#E5B044]">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              </div>
              <blockquote class="text-[13px] leading-relaxed text-gray-700">"Transparan soal harga dan fasilitas, jadi nggak dikadalin ibu kos. Ngebantu cara cari kosan cepat buat anak rantau!"</blockquote>
              <figcaption class="mt-4 flex items-center gap-3">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-[#0b2046] font-display text-[13px] font-bold text-[#E5B044]">S</div>
                <div>
                  <div class="text-[13px] font-bold text-[#0b2046]">Salsabila Nur</div>
                  <div class="text-[11px] text-gray-500 mt-0.5">Mahasiswa, UPI</div>
                </div>
              </figcaption>
            </figure>
          </div>
        </div>
        
      </div>
    </section>
    <!-- ================= FAQ (PERTANYAAN UMUM) ================= -->
    <section class="mx-auto max-w-3xl px-6 pb-20 lg:pb-24 font-sans">
      <!-- FAQ (Pertanyaan Umum) -->
        <div class="mx-auto max-w-3xl my-16">
          <div class="mb-7 text-center">
            <h2 class="font-display text-2xl font-bold text-[#0b2046] sm:text-3xl">
              Pertanyaan Umum
            </h2>
            <p class="mt-2 text-sm text-[#64748b]">
              Hal-hal yang paling sering ditanyakan calon penghuni.
            </p>
          </div>
          
          <div class="space-y-3" id="faqContainer">
            
            <!-- Item FAQ 1 -->
            <div class="faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#0b2046]">Apa itu KOKA Property Indonesia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                  <!-- Plus Icon -->
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <!-- Minus Icon (Awalnya Sembunyi) -->
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <!-- Konten (Awalnya Tertutup: grid-rows-[0fr]) -->
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    KOKA Property Indonesia adalah platform #1 Student Living yang membantu mahasiswa dan pekerja mencari, menyewa, dan menikmati layanan tambahan untuk hunian kos dengan lebih mudah dan aman.
                  </p>
                </div>
              </div>
            </div>

            <!-- Item FAQ 2 -->
            <div class="faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#0b2046]">Bagaimana cara booking kos di KOKA?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    Cukup cari kos yang sesuai, pilih tipe kamar, lalu klik Booking Sekarang. Kamu akan dipandu untuk verifikasi, pembayaran, dan penandatanganan kontrak digital.
                  </p>
                </div>
              </div>
            </div>

            <!-- Item FAQ 3 -->
            <div class="faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#0b2046]">Apakah pembayaran di KOKA aman?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    Sangat aman. Semua transaksi dilakukan melalui payment gateway resmi yang bekerja sama dengan bank-bank besar di Indonesia dan e-wallet pilihanmu.
                  </p>
                </div>
              </div>
            </div>

            <!-- Item FAQ 4 -->
            <div class="faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#0b2046]">Layanan apa saja yang tersedia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    Selain sewa kamar, KOKA menyediakan layanan pendukung seperti KosanClean (bersih-bersih), KosanJek (transportasi), KosanLaundry, KosanFix (perbaikan), hingga KosanMove (bantuan pindahan).
                  </p>
                </div>
              </div>
            </div>

            <!-- Item FAQ 5 -->
            <div class="faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#0b2046]">Di kota mana saja KOKA tersedia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    Saat ini KOKA tersedia di kota-kota pelajar utama seperti Bandung, Jakarta, Yogyakarta, dan Surabaya, serta akan terus berekspansi ke kota-kota lainnya.
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
    </section>
    <!-- ================= NEWSLETTER CTA ================= -->
    <section class="mx-auto max-w-[1280px] px-4 pb-20 sm:px-6">
      <div class="relative overflow-hidden rounded-[28px] bg-navy px-6 py-12 text-center sm:px-10 sm:py-16">
        <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-gold/20 blur-3xl"></div>
        <div class="relative mx-auto max-w-xl">
          <svg class="mx-auto h-8 w-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <h2 class="mt-4 font-display text-2xl font-extrabold text-white sm:text-3xl">
            Siap menemukan hunian impianmu?
          </h2>
          <p class="mt-3 text-sm text-white/70">
            Berlangganan untuk mendapatkan info kos terbaru, promo, dan tips ngekos
            langsung ke email kamu.
          </p>
          <form class="mx-auto mt-6 flex max-w-md flex-col gap-3 sm:flex-row">
            <input required type="email" placeholder="Alamat email kamu" class="min-h-[48px] flex-1 rounded-full border border-white/15 bg-white/10 px-5 text-sm text-white outline-none placeholder:text-white/40 focus:border-gold" />
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gold px-6 py-2.5 text-sm font-bold text-navy hover:opacity-90 transition">
              Berlangganan
            </button>
          </form>
        </div>
      </div>
    </section>

  </main>
  <x-modal-layanan />
  <x-footer />


  <script>
        // Data 3 Banner yang Berbeda
        const banners = [
            {
                tag: "Promo Spesial",
                title: "Hunian Nyaman,<br>Hidup Lebih Berkualitas",
                desc: "Temukan kos terbaik dan layanan pendukung dari KOKA untuk pengalaman ngekos terbaik.",
                img: "https://images.unsplash.com/photo-1774428559037-545b37f3cf9e?w=800&h=600&fit=crop&auto=format",
                badgeVal: "1000+",
                badgeText: "Pilihan Kos<br>Tersebar di Banyak Kota",
                btnText: "Cari Kos Sekarang",
                link: "/cari-kos"
            },
            {
                tag: "KOKA Rewards",
                title: "Kumpulkan Poin,<br>Nikmati Keuntungannya!",
                desc: "Dapatkan poin dari setiap transaksi dan tukarkan dengan diskon sewa, cuci sepatu gratis, hingga voucher belanja.",
                img: "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&h=600&fit=crop&auto=format", // Gambar kamar berbeda
                badgeVal: "Diskon",
                badgeText: "Hingga 50%<br>Untuk Layanan KOKA",
                btnText: "Cek Poin Kamu",
                link: "/layanan" // Arahkan ke halaman layanan/rewards
            },
            {
                tag: "Layanan Andalan",
                title: "Pindahan Kos<br>Kini Tanpa Ribet",
                desc: "Gunakan layanan KosanMove. Biar tim KOKA yang angkut barangmu, kamu tinggal duduk manis di kos baru.",
                img: "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&h=600&fit=crop&auto=format", // Gambar beda lagi
                badgeVal: "Aman",
                badgeText: "100% Garansi<br>Kerusakan Barang",
                btnText: "Pesan KosanMove",
                link: "/layanan"
            }
        ];

        let currentSlide = 0;

        function changeSlide(index) {
            currentSlide = index;
            const data = banners[index];

            // 1. Beri efek menghilang (fade out) sebelum data diganti
            const elements = ['slideTag', 'slideTitle', 'slideDesc', 'slideImg', 'slideBadgeVal', 'slideBadgeText'];
            elements.forEach(id => document.getElementById(id).style.opacity = '0');

            // 2. Ganti datanya setelah 300ms (menunggu transisi selesai)
            setTimeout(() => {
                document.getElementById('slideTag').innerHTML = data.tag;
                document.getElementById('slideTitle').innerHTML = data.title;
                document.getElementById('slideDesc').innerHTML = data.desc;
                document.getElementById('slideImg').src = data.img;
                document.getElementById('slideBadgeVal').innerHTML = data.badgeVal;
                document.getElementById('slideBadgeText').innerHTML = data.badgeText;
                
                document.getElementById('slideBtnText').innerText = data.btnText;
                document.getElementById('slideLink').href = data.link;

                // Munculkan kembali (fade in)
                elements.forEach(id => document.getElementById(id).style.opacity = '1');
            }, 300); 

            // 3. Perbarui Indikator (Titik Kuning)
            const dots = document.getElementById('sliderIndicators').children;
            for (let i = 0; i < dots.length; i++) {
                if (i === index) {
                    // Dot aktif (panjang dan kuning)
                    dots[i].className = "h-1.5 w-8 rounded-full bg-[#E5B044] transition-all duration-300";
                } else {
                    // Dot tidak aktif (pendek dan abu-abu)
                    dots[i].className = "h-1.5 w-2.5 rounded-full bg-white/30 transition-all duration-300 hover:bg-white/50 cursor-pointer";
                }
            }
        }

        // Opsional: Buat banner berganti otomatis setiap 6 detik
        setInterval(() => {
            let nextSlide = currentSlide + 1;
            if (nextSlide >= banners.length) nextSlide = 0;
            changeSlide(nextSlide);
        }, 6000);

        function toggleFaq(button) {
      // Dapatkan elemen parent dan konten dari tombol yang diklik
      const currentItem = button.parentElement;
      const content = currentItem.querySelector('.faq-content');
      const iconPlus = currentItem.querySelector('.icon-plus');
      const iconMinus = currentItem.querySelector('.icon-minus');
      
      // Cek apakah yang diklik ini sedang dalam keadaan terbuka
      const isCurrentlyOpen = content.classList.contains('grid-rows-[1fr]');

      // 1. Tutup SEMUA FAQ terlebih dahulu (agar rapi)
      const allItems = document.querySelectorAll('.faq-item');
      allItems.forEach(item => {
        const itemContent = item.querySelector('.faq-content');
        const iPlus = item.querySelector('.icon-plus');
        const iMinus = item.querySelector('.icon-minus');
        
        // Kembalikan ke state tertutup
        itemContent.classList.remove('grid-rows-[1fr]');
        itemContent.classList.add('grid-rows-[0fr]');
        iPlus.classList.remove('hidden');
        iMinus.classList.add('hidden');
      });

      // 2. Jika FAQ yang diklik sebelumnya TERTUTUP, maka buka!
      if (!isCurrentlyOpen) {
        content.classList.remove('grid-rows-[0fr]');
        content.classList.add('grid-rows-[1fr]');
        iconPlus.classList.add('hidden');
        iconMinus.classList.remove('hidden');
      }
    }
      </script>
      
</body>
</html>