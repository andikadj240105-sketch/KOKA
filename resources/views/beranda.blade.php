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
   <!-- ================= 1. HERO SECTION (CINEMATIC FULLSCREEN) ================= -->
    <section class="relative flex min-h-[100svh] items-center justify-center overflow-hidden py-20 lg:py-32">
      
      <!-- BACKGROUND IMAGE DENGAN EFEK PARALLAX -->
      <div class="absolute inset-0 z-0 h-full w-full bg-[url('https://images.unsplash.com/photo-1781249144129-4ba0869707f5?w=1920&h=1080&fit=crop&auto=format')] bg-cover bg-center bg-no-repeat bg-fixed"></div>
      
      <!-- OVERLAY GELAP -->
      <div class="absolute inset-0 z-10 bg-gradient-to-b from-[#0b2046]/70 via-[#0b2046]/40 to-[#0b2046]/80 backdrop-blur-[2px]"></div>

      <div class="relative z-20 mx-auto flex w-full max-w-[1000px] flex-col items-center px-4 text-center sm:px-6">
        
        <!-- BADGE -->
        <span class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-3 py-1.5 sm:px-4 sm:py-2 text-[10px] sm:text-[11px] font-semibold text-white shadow-sm backdrop-blur-md">
          <span class="h-2 w-2 rounded-full bg-[#E5B044] animate-pulse"></span>
          1 Student Living Platform di Indonesia
        </span>
        
        <!-- JUDUL (Diperkecil sedikit di mobile agar tidak terpotong) -->
        <h1 class="relative z-10 mt-5 sm:mt-6 font-display text-[32px] sm:text-[48px] lg:text-[72px] font-extrabold leading-tight text-white drop-shadow-lg">
          Selamat Datang di
        </h1>
        
        <!-- LOGO -->
        <img src="/kosankampus.png" alt="Kosan Kampus" 
             class="relative z-0 -mb-4 -mt-4 sm:-mt-6 h-[90px] sm:h-[150px] lg:h-[240px] lg:-mb-12 lg:-mt-16 w-auto object-contain brightness-0 invert drop-shadow-lg" />
        
        <!-- SUBJUDUL -->
        <p class="relative z-10 mt-2 max-w-2xl px-2 text-[13px] sm:text-lg leading-relaxed text-white/90 drop-shadow-md">
          Solusi lengkap untuk temukan kosan nyaman, fasilitas unggulan, dan hidup yang lebih mudah.
        </p>
        
        <!-- SEARCH BAR FLOATING -->
        <div class="mt-8 sm:mt-10 w-full max-w-3xl rounded-[20px] sm:rounded-full bg-white p-2 shadow-2xl sm:p-3">
          <div class="flex flex-col sm:flex-row sm:items-center gap-2">
            
            <div class="flex flex-1 items-center gap-3 rounded-xl px-3 py-2 sm:px-4 sm:py-2">
              <svg class="h-5 w-5 sm:h-6 sm:w-6 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
              <input class="w-full bg-transparent text-[13px] sm:text-[15px] text-[#1e293b] outline-none placeholder:text-[#64748b]" placeholder="Cari kos, layanan, atau kebutuhanmu..." />
            </div>
            
            <div class="flex items-center justify-between gap-2 sm:gap-3 border-t border-[#e2e8f0] px-3 pt-2 pb-1 sm:border-l sm:border-t-0 sm:px-4 sm:py-0">
              <button onclick="toggleLocationModal()" type="button" class="flex items-center gap-1.5 text-[13px] sm:text-[15px] font-medium text-[#0b2046] transition hover:text-[#E5B044]">
                <span id="heroLocText" class="truncate max-w-[120px] sm:max-w-none text-left">Pilih Universitas</span>
                <svg class="h-3 w-3 sm:h-4 sm:w-4 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
              </button>
              <button type="button" class="inline-flex shrink-0 items-center justify-center rounded-full bg-[#E5B044] px-6 py-2.5 sm:px-8 sm:py-3.5 text-[13px] sm:text-[15px] font-bold text-[#0b2046] shadow-md transition hover:scale-105 hover:bg-[#F1C86D]">
                Cari
              </button>
            </div>
            
          </div>
        </div>

       <!-- PENCARIAN POPULER (Disesuaikan untuk Mobile) -->
        <div class="mt-6 sm:mt-8 flex flex-wrap items-center justify-center gap-2.5 sm:gap-4">
          <!-- Href dirapikan (menghapus .blade.php) -->
          <a href="/cari-kos" class="rounded-full border border-white/30 bg-white/10 px-4 py-2 sm:px-6 sm:py-2.5 text-[11px] sm:text-base font-medium text-white/90 backdrop-blur-md transition hover:bg-white/20 hover:text-white">
            Kosan Dekat Kampus
          </a>
          <a href="#" class="rounded-full border border-white/30 bg-white/10 px-4 py-2 sm:px-6 sm:py-2.5 text-[11px] sm:text-base font-medium text-white/90 backdrop-blur-md transition hover:bg-white/20 hover:text-white">
            Kosan Bersih & Nyaman
          </a>
        </div>  

      </div>
    </section>
<!-- ================= 2. TENTANG KAMI (PENGGANTI BANNER) ================= -->
    <section class="relative z-30 mx-auto max-w-[1280px] px-4 py-8 sm:px-6 mt-6 lg:-mt-24">
      
      <div class="relative overflow-hidden rounded-[24px] bg-gradient-to-r from-[#09152b] via-[#122345] to-[#243452] shadow-2xl">
        
        <!-- Efek Cahaya Dekoratif -->
        <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#E5B044]/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-white/5 blur-3xl"></div>

        <!-- Gunakan grid-cols-1 untuk Mobile (Atas & Bawah), grid-cols-12 untuk Desktop (Kiri & Kanan) -->
        <div class="grid grid-cols-1 lg:grid-cols-12">
          
          <!-- BAGIAN ATAS (Mobile) / KIRI (Desktop): Teks Perkenalan -->
          <!-- Diberi border-b untuk memisahkan teks dan statistik di mobile -->
          <div class="flex flex-col justify-center p-6 lg:p-10 lg:col-span-5 relative z-10 border-b border-white/10 lg:border-b-0 lg:border-r">
            <div class="mb-4 w-max inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-[10px] lg:text-[11px] font-semibold text-[#E5B044] backdrop-blur-md">
              Tentang Kami
            </div>
            <h2 class="font-display text-[22px] sm:text-[26px] lg:text-[32px] font-extrabold leading-tight text-white">
              Lebih dari sekadar<br>tempat singgah.
            </h2>
            <p class="mt-3 lg:mt-4 text-[12px] lg:text-[14px] leading-relaxed text-white/70">
              KOKA Property mendedikasikan diri sebagai platform Student Living #1 di Indonesia. Kami menyatukan hunian nyaman, transaksi aman, dan layanan harian dalam satu ekosistem.
            </p>
            <a href="/tentang-kami" class="group mt-5 lg:mt-6 w-max inline-flex items-center gap-2 text-[12px] lg:text-[13px] font-bold text-[#E5B044] transition hover:text-[#F1C86D]">
              Mengenal KOKA Lebih Jauh
              <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
          </div>

          <!-- BAGIAN BAWAH (Mobile) / KANAN (Desktop): Statistik / Angka -->
          <!-- Tetap dikunci 3 Kolom menyamping -->
          <div class="grid grid-cols-3 lg:col-span-7 relative z-10">
            
            <!-- Stat 1 -->
            <div class="flex flex-col items-center justify-center py-6 lg:py-12 px-1 lg:px-4 border-r border-white/10">
              <div class="mb-2 lg:mb-3 grid h-10 w-10 lg:h-12 lg:w-12 place-items-center rounded-full bg-white/5 text-[#E5B044] ring-1 ring-white/10">
                <svg class="h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
              </div>
              <div class="font-display text-[16px] lg:text-[28px] font-bold text-white">1000+</div>
              <div class="mt-1 text-[9px] lg:text-[12px] text-white/60 text-center leading-tight">Kos<br>Terverifikasi</div>
            </div>

            <!-- Stat 2 -->
            <div class="flex flex-col items-center justify-center py-6 lg:py-12 px-1 lg:px-4 border-r border-white/10">
              <div class="mb-2 lg:mb-3 grid h-10 w-10 lg:h-12 lg:w-12 place-items-center rounded-full bg-white/5 text-[#E5B044] ring-1 ring-white/10">
                <svg class="h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
              </div>
              <div class="font-display text-[16px] lg:text-[28px] font-bold text-white">12.4K</div>
              <div class="mt-1 text-[9px] lg:text-[12px] text-white/60 text-center leading-tight">Penghuni<br>Aktif</div>
            </div>

            <!-- Stat 3 (Tanpa border karena ujung) -->
            <div class="flex flex-col items-center justify-center py-6 lg:py-12 px-1 lg:px-4">
              <div class="mb-2 lg:mb-3 grid h-10 w-10 lg:h-12 lg:w-12 place-items-center rounded-full bg-white/5 text-[#E5B044] ring-1 ring-white/10">
                <svg class="h-4 w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
              </div>
              <div class="font-display text-[16px] lg:text-[28px] font-bold text-white">4.9/5</div>
              <div class="mt-1 text-[9px] lg:text-[12px] text-white/60 text-center leading-tight">Rating<br>Kepuasan</div>
            </div>

          </div>

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
        
        <!-- 1. KosanJek (Tetap) -->
        <button onclick="openModal('KosanJek')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
            <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M11 7c2 0 3-.5 3-.5s.5-1.5.5-2.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M8.5 14H14"/><path stroke-linecap="round" stroke-linejoin="round" d="m14 10-2-3-2 3H6.5"/><path stroke-linecap="round" stroke-linejoin="round" d="m8.5 11 2-4-2-4"/><path stroke-linecap="round" stroke-linejoin="round" d="M11.5 7h4"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 10a1 1 0 0 0-1-1h-2.5"/></svg>
            </div>
            <div>
                <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanJek</div>
                <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Antar-jemput & Pengantaran</div>
            </div>
        </button>

        <!-- 2. KosanMove (Tetap) -->
        <button onclick="openModal('KosanMove')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 9h4l4 4v5c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanMove</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Pindahan Mudah</div>
          </div>
        </button>

        <!-- 3. KosanClean (Tetap) -->
        <button onclick="openModal('KosanClean')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanClean</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Kebersihan Terjaga</div>
          </div>
        </button>

        <!-- 4. KosanFix (Tetap) -->
        <button onclick="openModal('KosanFix')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanFix</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Perawatan & Perbaikan</div>
          </div>
        </button>

        <!-- 5. KosanLaundry (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('KosanLaundry')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanLaundry</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Laundry Praktis</div>
          </div>
        </button>

        <!-- 6. KosanMart (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('KosanMart')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m5 11 4-7"/><path stroke-linecap="round" stroke-linejoin="round" d="m19 11-4-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M2 11h20"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanMart</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Kebutuhan Harian</div>
          </div>
        </button>

        <!-- 7. KosanStorage (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('KosanStorage')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m7.5 4.27 9 5.15"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.3 7 8.7 5 8.7-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 22V12"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KosanStorage</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Titip Barang Aman</div>
          </div>
        </button>

        <!-- 8. Lapor Masalah (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('Lapor Masalah')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 22v-7"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">Lapor Masalah</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Laporkan Masalah</div>
          </div>
        </button>

        <!-- 9. KOKA Rewards (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('KOKA Rewards')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
          <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#f8fafc] text-[#0b2046] transition group-hover:bg-[#0b2046] group-hover:text-[#E5B044]">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><rect x="3" y="8" width="18" height="4" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>
          </div>
          <div>
            <div class="font-display text-[14px] font-semibold text-[#0b2046]">KOKA Rewards</div>
            <div class="mt-0.5 text-[11px] leading-snug text-[#64748b]">Point & Keuntungan</div>
          </div>
        </button>

        <!-- 10. KOKA Care (Ubah ke Coming Soon) -->
        <button onclick="openComingSoon('KOKA Care')" class="group flex flex-col items-start gap-3 rounded-2xl border border-[#e2e8f0] bg-white p-4 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md sm:p-5">
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

    

    
    <!-- ================= REKOMENDASI KOS ================= -->
    <!-- py-10 untuk mobile, lg:py-20 untuk desktop agar jarak proporsional -->
    <section class="mx-auto max-w-[1280px] px-4 py-10 sm:px-6 lg:py-20 font-sans overflow-hidden">
      
      <!-- Header Section -->
      <div class="mb-6 flex flex-row items-end justify-between gap-4">
        <div class="flex-1">
          <h2 class="font-display text-[20px] sm:text-[24px] lg:text-[28px] font-extrabold text-[#0b2046] leading-tight">Rekomendasi Kos untukmu</h2>
          <p class="mt-1 sm:mt-2 text-[12px] sm:text-[14px] text-[#64748b]">Pilihan kos terbaik yang paling banyak diminati bulan ini.</p>
        </div>
        <!-- Tombol Lihat Semua (Sekarang tampil di mobile) -->
        <a href="/cari-kos" class="shrink-0 flex items-center gap-1 text-[12px] sm:text-[14px] font-bold text-[#E5B044] hover:text-[#F1C86D] transition pb-0.5">
          Lihat Semua <span class="text-[14px] sm:text-[16px]">→</span>
        </a>
      </div>

      <!-- Grid Carousel (Bisa di-swipe di Mobile, Grid normal di Desktop) -->
      <!-- snap-mandatory membuat geseran berhenti mulus pada kartu -->
      <div class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-6 sm:mx-0 sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:gap-5 sm:px-0 sm:pb-0">
        
        <!-- CARD 1: Wisma Kampus Hasanah -->
        <!-- w-[280px] agar pas di layar HP, snap-center agar berhenti di tengah -->
        <div class="w-[280px] shrink-0 snap-center sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] sm:rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            
            <!-- h-[160px] untuk mobile, h-[200px] untuk sm/desktop -->
            <div class="relative h-[160px] sm:h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format" alt="Wisma Kampus Hasanah" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[10px] sm:text-[11px] font-semibold text-white shadow-sm">
                  Kosan Kampus
                </span>
                
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            
            <div class="p-4 sm:p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#0b2046] line-clamp-1">Wisma Kampus Hasanah</h3>
                <div class="flex shrink-0 items-center gap-1 text-[12px] sm:text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[13px] sm:text-[14px]">★</span> 4.8
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[11px] sm:text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                <span class="truncate">Buah Batu, Bandung</span>
              </div>
              
              <div class="mt-3 sm:mt-4 flex flex-wrap gap-2 sm:gap-4 text-[10px] sm:text-[11px] font-medium text-gray-500">
                <span class="rounded-md bg-gray-50 px-2 py-1">Kamar Mandi Dalam</span>
                <span class="rounded-md bg-gray-50 px-2 py-1">AC</span>
                <span class="rounded-md bg-gray-50 px-2 py-1">WiFi</span>
              </div>
              
              <div class="mt-4 sm:mt-6 flex flex-col">
                <span class="font-display text-[15px] sm:text-[16px] font-extrabold text-[#0b2046]">Rp 12.000.000</span>
                <span class="mt-0.5 text-[10px] sm:text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 2: Pondok Ilmu -->
        <div class="w-[280px] shrink-0 snap-center sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] sm:rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[160px] sm:h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop&auto=format" alt="Pondok Ilmu" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[10px] sm:text-[11px] font-semibold text-white shadow-sm">
                  Kosan Kampus
                </span>
                
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-4 sm:p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#0b2046] line-clamp-1">Pondok Ilmu</h3>
                <div class="flex shrink-0 items-center gap-1 text-[12px] sm:text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[13px] sm:text-[14px]">★</span> 4.7
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[11px] sm:text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                <span class="truncate">Sukapura, Bandung</span>
              </div>
              <div class="mt-3 sm:mt-4 flex flex-wrap gap-2 sm:gap-4 text-[10px] sm:text-[11px] font-medium text-gray-500">
                <span class="rounded-md bg-gray-50 px-2 py-1">WiFi</span>
                <span class="rounded-md bg-gray-50 px-2 py-1">Furnished</span>
              </div>
              <div class="mt-4 sm:mt-6 flex flex-col">
                <span class="font-display text-[15px] sm:text-[16px] font-extrabold text-[#0b2046]">Rp 11.000.000</span>
                <span class="mt-0.5 text-[10px] sm:text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 3: Puri Ananda -->
        <div class="w-[280px] shrink-0 snap-center sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] sm:rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[160px] sm:h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=400&h=300&fit=crop&auto=format" alt="Puri Ananda" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[10px] sm:text-[11px] font-semibold text-white shadow-sm">
                  Eksklusif
                </span>
                
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-4 sm:p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#0b2046] line-clamp-1">Puri Ananda</h3>
                <div class="flex shrink-0 items-center gap-1 text-[12px] sm:text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[13px] sm:text-[14px]">★</span> 4.9
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[11px] sm:text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                <span class="truncate">Dago, Bandung</span>
              </div>
              <div class="mt-3 sm:mt-4 flex flex-wrap gap-2 sm:gap-4 text-[10px] sm:text-[11px] font-medium text-gray-500">
                <span class="rounded-md bg-gray-50 px-2 py-1">AC</span>
                <span class="rounded-md bg-gray-50 px-2 py-1">Parkir</span>
              </div>
              <div class="mt-4 sm:mt-6 flex flex-col">
                <span class="font-display text-[15px] sm:text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[10px] sm:text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

        <!-- CARD 4: Hesma Residence -->
        <div class="w-[280px] shrink-0 snap-center sm:w-auto">
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] sm:rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer">
            <div class="relative h-[160px] sm:h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?w=400&h=300&fit=crop&auto=format" alt="Hesma Residence" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[10px] sm:text-[11px] font-semibold text-white shadow-sm">
                  Kosan Kampus
                </span>
                
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
            <div class="p-4 sm:p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#0b2046] line-clamp-1">Hesma Residence</h3>
                <div class="flex shrink-0 items-center gap-1 text-[12px] sm:text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#E5B044] text-[13px] sm:text-[14px]">★</span> 4.6
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[11px] sm:text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                <span class="truncate">Buah Batu, Bandung</span>
              </div>
              <div class="mt-3 sm:mt-4 flex flex-wrap gap-2 sm:gap-4 text-[10px] sm:text-[11px] font-medium text-gray-500">
                <span class="rounded-md bg-gray-50 px-2 py-1">Kamar Mandi Dalam</span>
                <span class="rounded-md bg-gray-50 px-2 py-1">WiFi</span>
              </div>
              <div class="mt-4 sm:mt-6 flex flex-col">
                <span class="font-display text-[15px] sm:text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[10px] sm:text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>

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

    <!-- ================= KAMPUS POPULER ================= -->
    <section class="mx-auto max-w-[1280px] px-4 py-12 sm:px-6 lg:py-20 overflow-hidden">
      <div class="mb-6">
        <h2 class="font-display text-[20px] sm:text-[24px] lg:text-[28px] font-extrabold text-navy">Kampus Populer</h2>
        <p class="mt-1 sm:mt-2 text-[12px] sm:text-[14px] text-slate">Temukan kos idamanmu di Kampus-kampus pelajar terbaik Indonesia.</p>
      </div>
      
      <!-- Carousel dengan snap-mandatory agar geseran berhenti pas di tengah kartu -->
      <div class="no-scrollbar -mx-4 flex snap-x snap-mandatory gap-4 overflow-x-auto px-4 pb-4 sm:mx-0 sm:grid sm:grid-cols-3 sm:gap-5 sm:px-0 lg:grid-cols-5">
        
        <!-- 1. Telkom University -->
        <button class="group relative h-48 sm:h-52 w-[75%] sm:w-auto shrink-0 snap-center overflow-hidden rounded-[20px] sm:rounded-2xl text-left shadow-sm transition hover:shadow-md">
          <img src="https://images.unsplash.com/photo-1549473889-14f410d83298?q=80&w=400&auto=format&fit=crop" alt="Telkom University" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4">
            <div class="font-display text-[15px] sm:text-lg font-bold text-white leading-snug">Telkom University</div>
            <div class="mt-0.5 text-[11px] sm:text-xs text-white/80 font-medium">450+ Kos</div>
          </div>
        </button>

        <!-- 2. Universitas Indonesia -->
        <button class="group relative h-48 sm:h-52 w-[75%] sm:w-auto shrink-0 snap-center overflow-hidden rounded-[20px] sm:rounded-2xl text-left shadow-sm transition hover:shadow-md">
          <img src="https://images.unsplash.com/photo-1555899434-94d1368aa7af?q=80&w=400&auto=format&fit=crop" alt="Universitas Indonesia" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4">
            <div class="font-display text-[15px] sm:text-lg font-bold text-white leading-snug">Universitas Indonesia</div>
            <div class="mt-0.5 text-[11px] sm:text-xs text-white/80 font-medium">820+ Kos</div>
          </div>
        </button>

        <!-- 3. Universitas Gadjah Mada -->
        <button class="group relative h-48 sm:h-52 w-[75%] sm:w-auto shrink-0 snap-center overflow-hidden rounded-[20px] sm:rounded-2xl text-left shadow-sm transition hover:shadow-md">
          <img src="https://images.unsplash.com/photo-1584824388155-24d45d6540d9?q=80&w=400&auto=format&fit=crop" alt="Universitas Gadjah Mada" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4">
            <div class="font-display text-[15px] sm:text-lg font-bold text-white leading-snug">Universitas Gadjah Mada</div>
            <div class="mt-0.5 text-[11px] sm:text-xs text-white/80 font-medium">310+ Kos</div>
          </div>
        </button>

        <!-- 4. Universitas Surabaya -->
        <button class="group relative h-48 sm:h-52 w-[75%] sm:w-auto shrink-0 snap-center overflow-hidden rounded-[20px] sm:rounded-2xl text-left shadow-sm transition hover:shadow-md">
          <img src="https://images.unsplash.com/photo-1577977464228-b0a514d24a90?q=80&w=400&auto=format&fit=crop" alt="Universitas Surabaya" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4">
            <div class="font-display text-[15px] sm:text-lg font-bold text-white leading-snug">Universitas Surabaya</div>
            <div class="mt-0.5 text-[11px] sm:text-xs text-white/80 font-medium">280+ Kos</div>
          </div>
        </button>

        <!-- 5. Universitas Malang -->
        <button class="group relative h-48 sm:h-52 w-[75%] sm:w-auto shrink-0 snap-center overflow-hidden rounded-[20px] sm:rounded-2xl text-left shadow-sm transition hover:shadow-md">
          <img src="https://images.unsplash.com/photo-1616857643329-a111a681c1c9?q=80&w=400&auto=format&fit=crop" alt="Universitas Malang" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent"></div>
          <div class="absolute inset-x-0 bottom-0 p-4">
            <div class="font-display text-[15px] sm:text-lg font-bold text-white leading-snug">Universitas Malang</div>
            <div class="mt-0.5 text-[11px] sm:text-xs text-white/80 font-medium">150+ Kos</div>
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
<!-- ================= MODAL COMING SOON ================= -->
  <!-- Menggunakan items-center dan p-4 agar selalu di tengah dan tidak mentok ujung layar HP -->
  <div id="comingSoonModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 transition-opacity">
    
    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-[#0b2046]/40 backdrop-blur-sm transition-opacity" onclick="closeComingSoon()"></div>
    
    <!-- Kotak Modal (Selalu di Tengah Layar, Diperkecil untuk Mobile) -->
    <!-- max-w-[340px] untuk mobile agar tidak terlalu lebar, max-w-sm untuk desktop -->
    <div role="dialog" aria-modal="true" class="relative flex w-full max-w-[340px] sm:max-w-sm flex-col overflow-hidden rounded-[24px] sm:rounded-[32px] bg-white shadow-2xl animate-in-up scale-95 transition-all duration-300" id="comingSoonPanel">
      
      <!-- Tombol Tutup X di Kanan Atas -->
      <div class="absolute right-4 top-4 sm:right-5 sm:top-5 z-10">
        <button onclick="closeComingSoon()" aria-label="Tutup" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Konten Modal (Padding dan Ikon disesuaikan) -->
      <div class="flex flex-col items-center px-5 py-8 sm:px-6 sm:py-10 text-center">
        
        <!-- Ikon Waktu/Roket -->
        <div class="relative grid h-16 w-16 sm:h-20 sm:w-20 place-items-center rounded-full bg-[#0b2046] text-[#E5B044] shadow-md">
            <svg class="h-8 w-8 sm:h-10 sm:w-10 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" style="animation-duration: 2s;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="absolute -right-1 -top-1 h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-[#E5B044] animate-ping"></div>
        </div>
        
        <!-- Judul Dinamis -->
        <h4 class="mt-5 sm:mt-6 font-display text-[17px] sm:text-[20px] font-extrabold text-[#0b2046]">Fitur yang akan datang</h4>
        
        <p class="mt-2 text-[12px] sm:text-[14px] leading-relaxed text-[#64748b]">
          Layanan <span id="comingSoonTitle" class="font-bold text-[#0b2046]">Nama Layanan</span> sedang dalam tahap pengembangan. Nantikan *update* terbaru dari kami segera!
        </p>
        
        <!-- Tombol Aksi (Disesuaikan ukurannya) -->
        <button onclick="closeComingSoon()" class="mt-6 sm:mt-8 w-full rounded-full bg-[#E5B044] px-6 py-3 sm:py-3.5 text-[13px] sm:text-[14px] font-bold text-[#0b2046] shadow-sm transition hover:scale-105 hover:bg-[#F1C86D]">
          Oke, Mengerti
        </button>

      </div>
    </div>
  </div>
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

    function selectLocation(city) {
        currentLocation = city; 
        
        // Ubah teks di Navbar Desktop & Mobile
        if(document.getElementById('desktopLocText')) document.getElementById('desktopLocText').innerText = city;
        if(document.getElementById('mobileLocText')) document.getElementById('mobileLocText').innerText = city;
        
        // Baris ini ditambahkan agar teks di Hero Search Bar ikut berubah
        if(document.getElementById('heroLocText')) document.getElementById('heroLocText').innerText = city;
        
        toggleLocationModal();
    }
    function openComingSoon(title) {
          document.getElementById('comingSoonTitle').innerText = title;
          const modal = document.getElementById('comingSoonModal');
          modal.classList.remove('hidden');
          modal.classList.add('flex');
      }

      function closeComingSoon() {
          const modal = document.getElementById('comingSoonModal');
          modal.classList.add('hidden');
          modal.classList.remove('flex');
      }
      </script>
      
</body>
</html>