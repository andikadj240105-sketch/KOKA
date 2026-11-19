<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Beranda</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('iconfavicon.png') }}" type="image/x-icon">
    
    <!-- PWA Meta Tags -->
    <link rel="manifest" href="{{ asset('pwa-manifest.json') }}">
    <meta name="theme-color" content="#522b89">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <main class="bg-gray-50">
   <!-- ================= 1. HERO SECTION & SEARCH ================= -->
   <section class="relative">
     <!-- Background Hero -->
     <div class="relative flex h-[260px] sm:h-[450px] lg:h-[100svh] w-full flex-col items-center justify-center overflow-hidden pt-4 sm:pt-0">
         <div class="absolute inset-0 z-0 h-full w-full bg-cover bg-center bg-no-repeat sm:bg-fixed" style="background-image: url('{{ asset('images/bckgrnd.png') }}');"></div>     
         <div class="absolute inset-0 z-10 bg-black/50 backdrop-blur-[2px] sm:backdrop-blur-sm"></div>

         <div class="relative z-20 mx-auto flex w-full max-w-[1000px] flex-col items-center px-4 text-center -mt-12 sm:mt-0 sm:pb-24">
            
            <span class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out inline-flex items-center gap-1.5 sm:gap-2 rounded-full border border-white/30 bg-black/30 sm:bg-white/10 px-2.5 py-1 sm:px-4 sm:py-2 text-[9px] sm:text-[11px] font-semibold text-white shadow-sm backdrop-blur-md">
              <span class="h-1.5 w-1.5 sm:h-2 sm:w-2 rounded-full bg-[#F39C12] animate-pulse"></span>
              Best Living Platform in Indonesia
            </span>

            <h1 class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-100 relative z-10 mt-3 sm:mt-6 font-display text-[20px] sm:text-[36px] lg:text-[48px] font-extrabold leading-tight text-white drop-shadow-lg">
              Selamat Datang di
            </h1>

            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-200 relative z-10 mt-0 sm:my-4 font-display text-[32px] sm:text-[64px] lg:text-[96px] font-black tracking-tight drop-shadow-xl text-white">
              Kosan <span class="text-[#F39C12]">Kampus</span>
            </div>

            <p class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-300 relative z-10 mt-1 sm:mt-2 max-w-2xl px-6 text-[10px] sm:text-[16px] leading-tight sm:leading-relaxed text-white/90 drop-shadow-md">
              Solusi lengkap untuk temukan kosan nyaman, fasilitas unggulan, dan hidup yang lebih mudah.
            </p>

            <!-- FORM PENCARIAN (KHUSUS DESKTOP) -->
            <form action="/cari-kos" method="GET" class="hidden sm:block reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-[400ms] mt-10 w-full max-w-3xl rounded-full bg-white p-3 shadow-2xl relative z-30">
              <div class="flex items-center gap-2">
                <div class="flex flex-1 items-center gap-3 rounded-full px-4 py-2">
                  <svg class="h-6 w-6 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
                  <input type="text" name="q" class="w-full bg-transparent text-[15px] text-[#1e293b] outline-none placeholder:text-[#64748b]" placeholder="Cari kos, layanan, atau kebutuhanmu..." />
                </div>
                <div class="flex items-center justify-between gap-3 border-l border-[#e2e8f0] pl-4 pr-1">
                  <input type="hidden" name="kampus" id="inputKampusDesktop" value="">
                  <button onclick="toggleLocationModal()" type="button" class="flex items-center gap-1.5 text-[15px] font-medium text-[#522b89] transition hover:text-[#F39C12]">
                    <span id="heroLocText" class="truncate">Pilih Universitas</span>
                    <svg class="h-4 w-4 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                  </button>
                  <button type="submit" class="shrink-0 rounded-full bg-[#F39C12] px-8 py-3.5 text-[15px] font-bold text-[#522b89] shadow-md transition hover:scale-105 hover:bg-[#F5B041]">
                    Cari
                  </button>
                </div>
              </div>
            </form>

         </div>
     </div>

     <!-- FORM PENCARIAN MELAYANG (KHUSUS MOBILE) -->
     <div class="block sm:hidden relative z-30 mx-4 -mt-10">
        <form action="/cari-kos" method="GET" class="w-full rounded-[16px] bg-white p-2 shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
          <div class="flex flex-col gap-1.5">
            <div class="flex items-center gap-2 rounded-[10px] bg-gray-50 border border-gray-100 px-3 py-2.5">
              <svg class="h-4 w-4 shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
              <input type="text" name="q" class="w-full bg-transparent text-[12px] text-gray-700 outline-none placeholder:text-gray-400" placeholder="Cari kos, layanan..." />
            </div>
            <div class="flex items-center gap-1.5">
              <input type="hidden" name="kampus" id="inputKampusMobile" value="">
              <button onclick="toggleLocationModal()" type="button" class="flex-1 flex items-center justify-between gap-2 rounded-[10px] bg-gray-50 border border-gray-100 px-3 py-2.5 text-[12px] font-medium text-[#522b89]">
                <span id="heroLocTextMobile" class="truncate text-left">Pilih Universitas</span>
                <svg class="h-3 w-3 shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
              </button>
              <button type="submit" class="shrink-0 rounded-[10px] bg-[#F39C12] px-5 py-2.5 text-[12px] font-bold text-[#522b89] shadow-sm transition hover:bg-[#F5B041]">
                Cari
              </button>
            </div>
          </div>
        </form>
     </div>
   </section>

    <!-- ================= 2. LAYANAN KOKA ================= -->
    <section id="layanan" class="mx-auto max-w-7xl px-4 sm:px-10 lg:px-16 pt-4 sm:py-16 lg:py-20">
        <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mb-2 sm:mb-6 flex items-end justify-between px-1">
            <div>
                <h2 class="font-display text-[16px] font-bold text-[#522b89] sm:text-3xl">Layanan KOKA untukmu</h2>
                <p class="mt-0 text-[10px] sm:text-sm text-gray-500 w-4/5 sm:w-full">Berbagai layanan untuk membuat kehidupanmu lebih nyaman.</p>
            </div>
            <a href="/layanan" class="text-[10px] sm:text-sm font-semibold text-[#522b89] mb-0.5 hover:text-[#F39C12] transition">
                Lihat Semua &rarr;
            </a>
        </div>
      
        @php
            $servicesList = \App\Models\Service::all();
            
            $defaultIcons = [
                'kosanjek' => '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><path d="M208,40H167.2a40,40,0,0,0-78.4,0H48a8,8,0,0,0,0,16H88.8a40,40,0,0,0,12.58,21.82A64.08,64.08,0,0,0,64,136v64a16,16,0,0,0,16,16H96a32,32,0,0,0,64,0h16a16,16,0,0,0,16-16V136a64.08,64.08,0,0,0-37.38-58.18A40,40,0,0,0,167.2,56H208a8,8,0,0,0,0-16ZM144,216a16,16,0,0,1-32,0V168a16,16,0,0,1,32,0Zm32-80v64H160V168a32,32,0,0,0-64,0v32H80V136a48,48,0,0,1,96,0ZM104,48a24,24,0,1,1,24,24A24,24,0,0,1,104,48Z"></path></svg>',
                'kosanmove' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 9h4l4 4v5c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>',
                'kosanclean' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>',
                'kosanfix' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
                'kosanlaundry' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>',
                'guestkost' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M2 8v11m0-5h20m-5-6h4a2 2 0 0 1 2 2v4H15V8zm-8 3a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm15 8v-5"/></svg>',
                'kosanstorage' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m7.5 4.27 9 5.15"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.3 7 8.7 5 8.7-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 22V12"/></svg>',
                'lapormasalah' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 22v-7"/></svg>',
                'kosanguard' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>',
                'kokarewards' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><rect x="3" y="8" width="18" height="4" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 12v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7"/><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8a2.5 2.5 0 0 1 0-5A4.8 8 0 0 1 12 8a4.8 8 0 0 1 4.5-5 2.5 2.5 0 0 1 0 5"/></svg>',
                'kokacare' => '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/></svg>'
            ];
            
            $fallbackIcon = '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>';
            $mainServices = ['kosanjek', 'kosanmove', 'kosanclean', 'kosanfix', 'kosanlaundry', 'guestkost', 'kosanstorage', 'kosanguard'];
        @endphp

        <!-- ================== VERSI MOBILE: GRID 4 KOLOM ================== -->
        <div class="grid grid-cols-4 gap-1.5 sm:hidden px-1">
            @foreach($servicesList as $svc)
                @php
                    $cleanDbName = strtolower(str_replace(' ', '', $svc->nama));
                    
                    if (in_array($cleanDbName, ['lapormasalah', 'kokarewards', 'kokacare'])) {
                        continue;
                    }

                    $isMainService = in_array($cleanDbName, $mainServices);
                    $isActive = (int)$svc->is_active === 1;
                    $clickAction = ($isMainService && $isActive) ? (Auth::check() ? "openModal('{$svc->nama}')" : "window.location.href='/auth'") : "openComingSoon('{$svc->nama}')";
                    $svgIcon = $defaultIcons[$cleanDbName] ?? $fallbackIcon;
                    
                    $namaParts = explode(' ', $svc->nama);
                    $namaFormatted = count($namaParts) > 1 ? $namaParts[0] . '<br>' . implode(' ', array_slice($namaParts, 1)) : $svc->nama;
                @endphp
                <button onclick="{{ $clickAction }}" class="w-full flex flex-col items-center group cursor-pointer reveal-on-scroll opacity-0 translate-y-4 transition-all duration-500" style="transition-delay: {{ $loop->iteration * 30 }}ms;">
                    <div class="bg-[#522b89] w-full aspect-[4/3.9] rounded-[16px] flex flex-col items-center justify-center shadow-md p-1 group-hover:bg-[#3a1f66] transition-colors">
                        
                        <div class="grid h-7 w-7 place-items-center rounded-[8px] bg-white/10 text-[#F39C12] mb-1 transition-all duration-300 group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89] [&>svg]:h-4 [&>svg]:w-4">
                            {!! $svgIcon !!}
                        </div>
                        
                        <span class="text-[8px] sm:text-[8.5px] font-semibold text-center text-white leading-[1.1] w-full break-words">{!! $namaFormatted !!}</span>
                    </div>
                </button>
            @endforeach
        </div>

        <!-- ================== VERSI DESKTOP: GRID 4 KOLOM ================== -->
        <div class="hidden sm:grid sm:grid-cols-4 sm:gap-4 mt-6">
            @foreach($servicesList as $svc)
                @php
                    $cleanDbName = strtolower(str_replace(' ', '', $svc->nama));
                    
                    if (in_array($cleanDbName, ['lapormasalah', 'kokarewards', 'kokacare'])) {
                        continue;
                    }

                    $isMainService = in_array($cleanDbName, $mainServices);
                    $isActive = (int)$svc->is_active === 1;
                    $clickAction = ($isMainService && $isActive) ? (Auth::check() ? "openModal('{$svc->nama}')" : "window.location.href='/auth'") : "openComingSoon('{$svc->nama}')";
                    $svgIcon = $defaultIcons[$cleanDbName] ?? $fallbackIcon;
                @endphp
                <button onclick="{{ $clickAction }}" class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm hover:-translate-y-1 hover:shadow-md" style="transition-delay: {{ $loop->iteration * 50 }}ms;">
                    <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[600ms] ease-in-out group-hover:translate-y-0 z-0">
                        <svg class="absolute bottom-[99%] left-0 w-[200%] h-[35px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                            <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                        <div class="h-full w-full bg-[#F39C12]"></div>
                    </div>
                    <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                        <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[600ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89] [&>svg]:h-6 [&>svg]:w-6">
                            {!! $svgIcon !!}
                        </div>
                        <div>
                            <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[600ms] group-hover:text-[#522b89]">{{ $svc->nama }}</div>
                            <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[600ms] group-hover:text-[#522b89]/80">{{ $svc->deskripsi ?? 'Layanan KOKA' }}</div>
                        </div>
                    </div>
                </button>
            @endforeach
        </div>
    </section>
    
    <!-- ================= 3. REKOMENDASI KOS ================= -->
    <section class="mx-auto max-w-7xl px-4 sm:px-10 lg:px-16 py-6 sm:py-10 lg:py-16 font-sans overflow-hidden">
      <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mb-5 flex flex-row items-end justify-between gap-2 sm:gap-4 px-2 sm:px-0">
        <div class="flex-1">
          <h2 class="font-display text-[20px] sm:text-[24px] lg:text-[28px] font-extrabold text-[#522b89] leading-tight">Rekomendasi Kos</h2>
          <p class="mt-1 sm:mt-2 text-[11px] sm:text-[14px] text-[#64748b]">Pilihan kos terbaik bulan ini.</p>
        </div>
        <a href="/cari-kos" class="shrink-0 flex items-center gap-1 text-[11px] sm:text-[14px] font-bold text-[#F39C12] hover:text-[#F5B041] transition pb-0.5">
          Lihat Semua <span class="text-[12px] sm:text-[16px]">→</span>
        </a>
      </div>

      <!-- Grid 2 Kolom (Mobile), 4 Kolom (Desktop) -->
      <div class="grid grid-cols-2 gap-3 sm:gap-4 lg:grid-cols-4 px-1 sm:px-0">
        @forelse($kosans as $kos)
        <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out w-full" style="transition-delay: {{ $loop->iteration * 75 }}ms;">
          <a href="/detail-kos/{{ $kos->id }}" class="block group relative overflow-hidden rounded-[16px] sm:rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md cursor-pointer h-full flex flex-col">
            
            <div class="relative h-[125px] sm:h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="{{ $kos->foto_utama ? (Str::startsWith($kos->foto_utama, ['http', '/storage']) ? $kos->foto_utama : asset('storage/' . $kos->foto_utama)) : 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format' }}" alt="{{ $kos->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                
                <span class="absolute left-2 top-2 sm:left-3 sm:top-3 z-10 rounded-full bg-[#522b89] px-2 py-1 sm:px-3 sm:py-1.5 text-[9px] sm:text-[11px] font-semibold text-white shadow-sm">
                  {{ $kos->tipe }}
                </span>
                
                @php
                  $isFavorited = Auth::check() ? \App\Models\Favorite::where('user_id', Auth::id())->where('kos_id', $kos->id)->exists() : false;
                @endphp
                <button onclick="event.preventDefault(); event.stopPropagation(); toggleFavorite({{ $kos->id }}, this);" class="absolute right-2 top-2 sm:right-3 sm:top-3 z-10 flex h-7 w-7 sm:h-8 sm:w-8 items-center justify-center rounded-full bg-white shadow-sm transition hover:scale-110 cursor-pointer">
                  <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4 transition {{ $isFavorited ? 'text-red-500 fill-red-500' : 'text-gray-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </button>
            </div>
            
            <div class="p-3 sm:p-5 flex flex-col flex-grow">
              <div class="flex items-start justify-between gap-1 sm:gap-2">
                <h3 class="font-display text-[13px] sm:text-[15px] font-bold text-[#522b89] line-clamp-1">{{ $kos->nama }}</h3>
                <div class="flex shrink-0 items-center gap-0.5 sm:gap-1 text-[11px] sm:text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#F39C12] text-[12px] sm:text-[14px]">★</span> {{ $kos->rating ?? '4.5' }}
                </div>
              </div>
              <div class="mt-1 sm:mt-1.5 flex items-center gap-1 sm:gap-1.5 text-[10px] sm:text-[12px] text-[#64748b]">
                <svg class="h-3 w-3 sm:h-3.5 sm:w-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                <span class="truncate">{{ $kos->lokasi }}</span>
              </div>
              
              <div class="mt-2.5 sm:mt-4 flex flex-wrap gap-1.5 sm:gap-2 text-[9px] sm:text-[11px] font-medium text-gray-500">
                @if($kos->fasilitas)
                  @foreach(array_slice(explode(',', $kos->fasilitas), 0, 2) as $fasilitas)
                    <span class="rounded-md bg-gray-50 border border-gray-100 px-1.5 py-1">{{ trim($fasilitas) }}</span>
                  @endforeach
                @else
                  <span class="rounded-md bg-gray-50 border border-gray-100 px-1.5 py-1">Fasilitas Standar</span>
                @endif
              </div>
              
              <div class="mt-auto pt-3 sm:mt-6 flex flex-col">
                @if(isset($kos->harga_bulan) && $kos->harga_bulan > 0)
                  <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#522b89]">Rp {{ number_format($kos->harga_bulan, 0, ',', '.') }}</span>
                  <span class="mt-0.5 text-[9px] sm:text-[11px] text-[#64748b]">per bulan</span>
                @elseif(isset($kos->harga_tahun) && $kos->harga_tahun > 0)
                  <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#522b89]">Rp {{ number_format($kos->harga_tahun, 0, ',', '.') }}</span>
                  <span class="mt-0.5 text-[9px] sm:text-[11px] text-[#64748b]">per tahun</span>
                @else
                  <span class="font-display text-[13px] sm:text-[14px] font-bold text-[#522b89]">Hubungi Pemilik</span>
                  <span class="mt-0.5 text-[9px] sm:text-[10px] text-transparent select-none">-</span>
                @endif
              </div>
            </div>
          </a>
        </div>
        @empty
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out col-span-full rounded-2xl border border-dashed border-[#e2e8f0] bg-slate-50 p-8 text-center text-sm font-medium text-[#64748b] w-full">
            Belum ada rekomendasi kos bulan ini.
          </div>
        @endforelse
      </div>
    </section>

    <!-- ================= 4. TENTANG KAMI ================= -->
    <section class="relative z-30 mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 py-12 lg:my-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 lg:items-center gap-10 lg:gap-16">
        
        <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out flex flex-col justify-center lg:col-span-5">
          <div class="mb-4 w-max inline-flex items-center gap-2 rounded-full bg-[#522b89]/10 px-3.5 py-1.5 text-[11px] font-bold text-[#522b89]">
            Tentang Kami
          </div>
          <h2 class="font-display text-[26px] sm:text-[32px] lg:text-[40px] font-extrabold leading-tight text-[#522b89]">
            Lebih dari sekadar<br>tempat singgah.
          </h2>
          <p class="mt-4 text-[14px] sm:text-[15px] leading-relaxed text-[#64748b]">
            KOKA PropertyIndo mendedikasikan diri sebagai platform Student Living #1 di Indonesia. Kami menyatukan hunian nyaman, transaksi aman, dan layanan harian dalam satu ekosistem terpadu.
          </p>
          <a href="/tentang-kami" class="group mt-6 w-max inline-flex items-center gap-2 text-[14px] font-bold text-[#F39C12] transition hover:text-[#F5B041]">
            Mengenal KOKA Lebih Jauh
            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
          </a>
        </div>

        <div class="grid grid-cols-3 lg:col-span-7 gap-4 sm:gap-6">
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-100 flex flex-col items-center sm:items-start p-4 sm:p-6 rounded-2xl bg-[#f8fafc] border border-[#e2e8f0]/60 transition hover:shadow-sm">
            <div class="mb-3 grid h-10 w-10 sm:h-12 sm:w-12 place-items-center rounded-xl bg-[#522b89] text-[#F39C12] shadow-sm">
              <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <div class="font-display text-[22px] sm:text-[32px] font-extrabold text-[#522b89]">1000+</div>
            <div class="mt-1 text-[11px] sm:text-[13px] text-[#64748b] text-center sm:text-left leading-tight">Kos Terverifikasi</div>
          </div>
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-200 flex flex-col items-center sm:items-start p-4 sm:p-6 rounded-2xl bg-[#f8fafc] border border-[#e2e8f0]/60 transition hover:shadow-sm">
            <div class="mb-3 grid h-10 w-10 sm:h-12 sm:w-12 place-items-center rounded-xl bg-[#522b89] text-[#F39C12] shadow-sm">
              <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <div class="font-display text-[22px] sm:text-[32px] font-extrabold text-[#522b89]">12.4K</div>
            <div class="mt-1 text-[11px] sm:text-[13px] text-[#64748b] text-center sm:text-left leading-tight">Penghuni Aktif</div>
          </div>
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-300 flex flex-col items-center sm:items-start p-4 sm:p-6 rounded-2xl bg-[#f8fafc] border border-[#e2e8f0]/60 transition hover:shadow-sm">
            <div class="mb-3 grid h-10 w-10 sm:h-12 sm:w-12 place-items-center rounded-xl bg-[#522b89] text-[#F39C12] shadow-sm">
              <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <div class="font-display text-[22px] sm:text-[32px] font-extrabold text-[#522b89]">4.9/5</div>
            <div class="mt-1 text-[11px] sm:text-[13px] text-[#64748b] text-center sm:text-left leading-tight">Rating Kepuasan</div>
          </div>
        </div>

      </div>
    </section>

    <!-- ================= PROMO BANNER (DINAMIS DARI ADMIN) ================= -->
    @php
        $promoBanners = \App\Models\PromoBanner::where('is_active', 1)
                            ->orderBy('urutan', 'asc')
                            ->latest()
                            ->get();
    @endphp

    <section id="promo" class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mx-auto max-w-7xl px-4 sm:px-10 lg:px-16 my-6 sm:my-14">
      @if($promoBanners->count() > 0)
        <div class="relative overflow-hidden rounded-[20px] sm:rounded-[28px] bg-[#522b89] shadow-md group">
          
          <!-- Track Slider -->
          <div id="dynamicBannerTrack" class="flex transition-transform duration-500 ease-out">
            @foreach($promoBanners as $banner)
              <div class="w-full shrink-0">
                @if($banner->link_tujuan)
                  <a href="{{ $banner->link_tujuan }}" class="block w-full">
                    <div class="aspect-[16/6] sm:aspect-[21/8] w-full overflow-hidden">
                      <img src="{{ asset('storage/' . $banner->gambar) }}" 
                           alt="{{ $banner->judul ?? 'Promo Kosan Kampus' }}" 
                           class="h-full w-full object-cover" />
                    </div>
                  </a>
                @else
                  <div class="aspect-[16/6] sm:aspect-[21/8] w-full overflow-hidden">
                    <img src="{{ asset('storage/' . $banner->gambar) }}" 
                         alt="{{ $banner->judul ?? 'Promo Kosan Kampus' }}" 
                         class="h-full w-full object-cover" />
                  </div>
                @endif
              </div>
            @endforeach
          </div>

          <!-- Tombol Navigasi Kiri & Kanan (Muncul jika banner > 1) -->
          @if($promoBanners->count() > 1)
            <button type="button" onclick="moveDynamicBanner(-1)" aria-label="Sebelumnya"
                    class="absolute left-3 top-1/2 -translate-y-1/2 z-20 hidden sm:grid h-10 w-10 place-items-center rounded-full bg-white/80 text-[#522b89] shadow-md backdrop-blur-xs opacity-0 group-hover:opacity-100 transition hover:bg-white cursor-pointer">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </button>

            <button type="button" onclick="moveDynamicBanner(1)" aria-label="Berikutnya"
                    class="absolute right-3 top-1/2 -translate-y-1/2 z-20 hidden sm:grid h-10 w-10 place-items-center rounded-full bg-white/80 text-[#522b89] shadow-md backdrop-blur-xs opacity-0 group-hover:opacity-100 transition hover:bg-white cursor-pointer">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </button>

            <!-- Indikator Titik Bawah -->
            <div id="dynamicBannerDots" class="absolute bottom-3 sm:bottom-4 left-1/2 -translate-x-1/2 z-20 flex items-center gap-1.5 rounded-full bg-black/30 px-3 py-1.5 backdrop-blur-xs">
              @foreach($promoBanners as $idx => $banner)
                <button type="button" onclick="goToDynamicBanner({{ $idx }})" 
                        class="h-1.5 {{ $idx === 0 ? 'w-6 bg-[#F39C12]' : 'w-1.5 bg-white/60 hover:bg-white' }} rounded-full transition-all duration-300 cursor-pointer"></button>
              @endforeach
            </div>
          @endif

        </div>
      @else
        <!-- Fallback jika admin belum mengunggah banner sama sekali -->
        <div class="relative overflow-hidden rounded-[24px] sm:rounded-[28px] bg-gradient-to-br from-[#522b89] to-[#240f40] p-7 sm:p-10 lg:p-12">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <div>
              <span class="inline-flex rounded-full bg-[#F39C12]/20 px-3 py-1 text-xs font-semibold text-[#F39C12]">Promo Spesial</span>
              <h2 class="mt-3 font-display text-2xl sm:text-4xl font-extrabold text-white">Hunian Nyaman, Hidup Lebih Berkualitas</h2>
              <p class="mt-2 max-w-lg text-xs sm:text-sm text-white/75">Temukan kos terbaik dan layanan pendukung dari KOKA untuk pengalaman ngekos terbaik.</p>
            </div>
            <a href="/cari-kos" class="shrink-0 inline-flex items-center justify-center gap-2 rounded-full bg-[#F39C12] px-6 py-3.5 text-sm font-bold text-[#522b89] transition hover:opacity-90">
              <span>Cari Kos Sekarang</span>
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
          </div>
        </div>
      @endif
    </section>

    <!-- ================= HOW IT WORKS ================= -->
    <section class="bg-[#522b89]">
      <div class="mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 py-10 lg:py-20">
        <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mb-10 text-center">
          <h2 class="font-display text-2xl font-bold text-white sm:text-3xl">
            Cara Kerja KOKA
          </h2>
          <p class="mx-auto mt-2 max-w-md text-[13px] sm:text-sm text-white/60">
            Empat langkah mudah menuju hunian impianmu.
          </p>
        </div>
        <div class="grid gap-5 grid-cols-2 lg:grid-cols-4">
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out rounded-2xl border border-white/10 bg-white/[0.04] p-5 sm:p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-[#F39C12]">01</div>
            <div class="mt-3 font-display text-[14px] sm:text-base font-semibold text-white">Cari Kos</div>
            <p class="mt-1.5 text-[12px] sm:text-sm leading-relaxed text-white/60">Jelajahi ribuan pilihan kos sesuai budget dan lokasimu.</p>
          </div>
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-100 rounded-2xl border border-white/10 bg-white/[0.04] p-5 sm:p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-[#F39C12]">02</div>
            <div class="mt-3 font-display text-[14px] sm:text-base font-semibold text-white">Pilih Hunian</div>
            <p class="mt-1.5 text-[12px] sm:text-sm leading-relaxed text-white/60">Bandingkan fasilitas, harga, dan foto asli setiap kamar.</p>
          </div>
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-200 rounded-2xl border border-white/10 bg-white/[0.04] p-5 sm:p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-[#F39C12]">03</div>
            <div class="mt-3 font-display text-[14px] sm:text-base font-semibold text-white">Booking</div>
            <p class="mt-1.5 text-[12px] sm:text-sm leading-relaxed text-white/60">Booking & bayar aman langsung dari aplikasi.</p>
          </div>
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-300 rounded-2xl border border-white/10 bg-white/[0.04] p-5 sm:p-6 transition hover:bg-white/[0.07]">
            <div class="font-display text-3xl font-extrabold text-[#F39C12]">04</div>
            <div class="mt-3 font-display text-[14px] sm:text-base font-semibold text-white">Tinggal Nyaman</div>
            <p class="mt-1.5 text-[12px] sm:text-sm leading-relaxed text-white/60">Nikmati layanan pendukung KOKA kapan pun kamu butuh.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= REWARDS + TESTIMONIALS ================= -->
    <section class="mx-auto max-w-7xl px-6 sm:px-10 lg:px-16 py-16 lg:py-20 font-sans">
      <div class="mb-14 grid gap-10 lg:grid-cols-[1fr_1.2fr] lg:items-center lg:gap-14">
        
        <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out overflow-hidden rounded-[28px] bg-[#F39C12] p-8 sm:p-10">
          <span class="inline-flex rounded-full bg-[#522b89]/10 px-3 py-1.5 text-[11px] font-bold text-[#522b89] uppercase tracking-wide">
            KOKA Rewards
          </span>
          <h3 class="mt-5 font-display text-[32px] font-extrabold leading-tight text-[#522b89]">
            Setiap transaksi jadi lebih untung
          </h3>
          <p class="mt-4 max-w-md text-[14px] leading-relaxed text-[#522b89]/80">
            Kumpulkan poin dari setiap pembayaran & layanan, tukarkan dengan laundry gratis, diskon sewa, dan voucher marketplace.
          </p>
          <button class="inline-flex items-center justify-center rounded-full bg-[#522b89] px-7 py-3.5 text-[14px] font-bold text-white transition hover:bg-[#522b89]/90 mt-8 shadow-md">
            Gabung Sekarang
          </button>
        </div>

        <div class="lg:pl-6">
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mb-6">
             <h2 class="font-display text-[28px] font-extrabold text-[#522b89]">Apa kata mereka</h2>
             <p class="mt-1.5 text-[14px] text-gray-500">Ribuan penghuni sudah merasakan mudahnya ngekos bareng KOKA.</p>
          </div>
          
          <div class="grid gap-4 sm:grid-cols-1">
            
            <figure class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
              <div class="mb-3 flex gap-1 text-[#F39C12]">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              </div>
              <blockquote class="text-[13px] leading-relaxed text-gray-700">"Sangat ngebantu banget. Bayar bulanan kosan gampang banget. Pas ada masalah tinggal lapor lewat KosanFix. Ngekos di Bandung terasa jauh lebih tenang."</blockquote>
              <figcaption class="mt-4 flex items-center gap-3">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-[#522b89] font-display text-[13px] font-bold text-[#F39C12]">H</div>
                <div>
                  <div class="text-[13px] font-bold text-[#522b89]">Hani Puspita</div>
                  <div class="text-[11px] text-gray-500 mt-0.5">Mahasiswa, Telkom University</div>
                </div>
              </figcaption>
            </figure>
            
            <figure class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-100 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:shadow-md">
              <div class="mb-3 flex gap-1 text-[#F39C12]">
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              </div>
              <blockquote class="text-[13px] leading-relaxed text-gray-700">"Transparan soal harga dan fasilitas, jadi nggak dikadalin ibu kos. Ngebantu cara cari kosan cepat buat anak rantau!"</blockquote>
              <figcaption class="mt-4 flex items-center gap-3">
                <div class="grid h-9 w-9 place-items-center rounded-full bg-[#522b89] font-display text-[13px] font-bold text-[#F39C12]">S</div>
                <div>
                  <div class="text-[13px] font-bold text-[#522b89]">Salsabila Nur</div>
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
        <div class="mx-auto max-w-3xl my-16">
          <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out mb-7 text-center">
            <h2 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">
              Pertanyaan Umum
            </h2>
            <p class="mt-2 text-sm text-[#64748b]">
              Hal-hal yang paling sering ditanyakan calon penghuni.
            </p>
          </div>
          
          <div class="space-y-3" id="faqContainer">
            
            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#522b89]">Apa itu KOKA Property Indonesia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89]">
                  <svg class="h-4 w-4 icon-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                  <svg class="h-4 w-4 icon-minus hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/></svg>
                </span>
              </button>
              <div class="faq-content grid transition-all duration-300 grid-rows-[0fr]">
                <div class="overflow-hidden">
                  <p class="px-5 pb-5 text-sm leading-relaxed text-[#64748b]">
                    KOKA Property Indonesia adalah platform #1 Student Living yang membantu mahasiswa dan pekerja mencari, menyewa, dan menikmati layanan tambahan untuk hunian kos dengan lebih mudah dan aman.
                  </p>
                </div>
              </div>
            </div>

            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-100 faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#522b89]">Bagaimana cara booking kos di KOKA?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89]">
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

            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-200 faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#522b89]">Apakah pembayaran di KOKA aman?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89]">
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

            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-300 faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#522b89]">Layanan apa saja yang tersedia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89]">
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

            <div class="reveal-on-scroll opacity-0 translate-y-10 transition-all duration-[800ms] ease-out delay-300 faq-item overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white">
              <button onclick="toggleFaq(this)" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left outline-none">
                <span class="font-display text-sm font-semibold text-[#522b89]">Di kota mana saja KOKA tersedia?</span>
                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89]">
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

  <!-- ================= MODAL COMING SOON ================= -->
  <div id="comingSoonModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 transition-opacity">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeComingSoon()"></div>
    <div role="dialog" aria-modal="true" class="relative flex w-full max-w-[340px] sm:max-w-sm flex-col overflow-hidden rounded-[24px] sm:rounded-[32px] bg-white shadow-2xl animate-in-up scale-95 transition-all duration-300" id="comingSoonPanel">
      <div class="absolute right-4 top-4 sm:right-5 sm:top-5 z-10">
        <button onclick="closeComingSoon()" aria-label="Tutup" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#522b89] transition hover:bg-[#e2e8f0]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
      <div class="flex flex-col items-center px-5 py-8 sm:px-6 sm:py-10 text-center">
        <div class="relative grid h-16 w-16 sm:h-20 sm:w-20 place-items-center rounded-full bg-[#522b89] text-[#F39C12] shadow-md">
            <svg class="h-8 w-8 sm:h-10 sm:w-10 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" style="animation-duration: 2s;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="absolute -right-1 -top-1 h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-[#F39C12] animate-ping"></div>
        </div>
        <h4 class="mt-5 sm:mt-6 font-display text-[17px] sm:text-[20px] font-extrabold text-[#522b89]">Layanan yang akan datang</h4>
        <p class="mt-2 text-[12px] sm:text-[14px] leading-relaxed text-[#64748b]">
          Layanan <span id="comingSoonTitle" class="font-bold text-[#522b89]">Nama Layanan</span> sedang dalam tahap pengembangan. Nantikan *update* terbaru dari kami segera!
        </p>
        <button onclick="closeComingSoon()" class="mt-6 sm:mt-8 w-full rounded-full bg-[#F39C12] px-6 py-3 sm:py-3.5 text-[13px] sm:text-[14px] font-bold text-[#522b89] shadow-sm transition hover:scale-105 hover:bg-[#F5B041]">
          Oke, Mengerti
        </button>
      </div>
    </div>
  </div>

  <!-- ================= MODAL PILIH LOKASI KAMPUS ================= -->
  <div id="locationModal" class="fixed inset-0 z-[110] hidden items-center justify-center transition-opacity duration-300">
      <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleLocationModal()"></div>
      <div class="relative w-[90%] max-w-md rounded-[24px] bg-white p-6 shadow-2xl animate-in zoom-in-95 duration-200">
          <div class="mb-5 flex items-center justify-between pb-2">
              <h3 class="font-display text-lg font-bold text-[#522b89]">Pilih Lokasi</h3>
              <button type="button" onclick="toggleLocationModal()" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#522b89] transition hover:bg-[#e2e8f0]">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
              </button>
          </div>
          <div class="space-y-3 max-h-[50vh] overflow-y-auto pr-1">
              
              <button type="button" onclick="selectUniversity('UPI Cibiru', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#e2e8f0] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">UPI Cibiru</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

              <button type="button" onclick="selectUniversity('Unpad Jatinangor', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#e2e8f0] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">Unpad Jatinangor</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

              <button type="button" onclick="selectUniversity('Telkom University', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#522b89] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">Telkom University</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

              <button type="button" onclick="selectUniversity('UPI Gerlong', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#e2e8f0] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">UPI Gerlong</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

              <button type="button" onclick="selectUniversity('UNDIP', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#e2e8f0] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">UNDIP</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

              <button type="button" onclick="selectUniversity('UGM', this)" class="univ-option flex w-full items-center justify-between rounded-[20px] border border-[#e2e8f0] px-4 py-3.5 text-left transition hover:border-[#522b89]">
                  <div class="flex items-center gap-3">
                      <svg class="h-[18px] w-[18px] text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                      <span class="text-sm font-medium text-[#1e293b]">UGM</span>
                  </div>
                  <svg class="check-icon hidden h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </button>

          </div>
      </div>
  </div>

  </main>
  
  <x-modal-layanan />
  <x-footer />

  <!-- ================= BANNER PWA KUSTOM (MENDUKUNG ANDROID & IOS) ================= -->
  <div id="pwa-install-popup" class="fixed bottom-0 left-0 right-0 z-[100] translate-y-[150%] transition-transform duration-[600ms] ease-in-out sm:bottom-6 sm:left-auto sm:right-6 sm:w-[420px]">
      <div class="rounded-t-2xl sm:rounded-2xl bg-white p-4 sm:p-5 shadow-[0_-10px_40px_rgba(0,0,0,0.15)] sm:shadow-2xl border-t sm:border border-[#e2e8f0] flex flex-col gap-4">
          <div class="flex items-start gap-3">
              <!-- Icon -->
              <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-[#f8fafc] ring-2 ring-[#e2e8f0]">
                  <svg class="h-6 w-6 text-[#522b89]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
              </div>
              <div class="flex-1">
                  <h3 id="pwa-title" class="font-display text-sm font-bold text-[#522b89]">Install Aplikasi KOKA</h3>
                  <p id="pwa-desc" class="mt-0.5 text-xs leading-relaxed text-[#64748b]">
                      Pasang KOKA di layar utama (Homescreen) agar pencarian kos jadi lebih cepat tanpa buka browser!
                  </p>
              </div>
          </div>
          
          <!-- Tombol Aksi -->
          <div class="flex gap-2 w-full mt-1">
              <button id="pwa-cancel-btn" class="flex-1 rounded-xl border border-[#e2e8f0] bg-white px-3 py-2.5 text-xs font-semibold text-[#64748b] transition hover:bg-gray-50 active:bg-gray-100">
                  Nanti Saja
              </button>
              <button id="pwa-install-btn" class="flex-[1.5] rounded-xl bg-[#F39C12] px-3 py-2.5 text-xs font-bold text-[#522b89] transition hover:opacity-90 active:scale-[0.98]">
                  Install Sekarang
              </button>
          </div>
      </div>
  </div>

  <script>
        // SCRIPT UNTUK ANIMASI ON SCROLL
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            const hiddenElements = document.querySelectorAll('.reveal-on-scroll');
            hiddenElements.forEach((el) => observer.observe(el));
        });

        // ================= SCRIPT SLIDER BANNER IKLAN DINAMIS =================
        let dynamicSlideIndex = 0;
        const bannerTrack = document.getElementById('dynamicBannerTrack');
        const bannerDotsContainer = document.getElementById('dynamicBannerDots');
        const totalDynamicSlides = bannerTrack ? bannerTrack.children.length : 0;

        function goToDynamicBanner(index) {
            if (!bannerTrack || totalDynamicSlides === 0) return;
            if (index >= totalDynamicSlides) index = 0;
            if (index < 0) index = totalDynamicSlides - 1;
            
            dynamicSlideIndex = index;
            bannerTrack.style.transform = `translateX(-${dynamicSlideIndex * 100}%)`;

            if (bannerDotsContainer) {
                const dots = bannerDotsContainer.children;
                for (let i = 0; i < dots.length; i++) {
                    if (i === dynamicSlideIndex) {
                        dots[i].className = "h-1.5 w-6 bg-[#F39C12] rounded-full transition-all duration-300 cursor-pointer";
                    } else {
                        dots[i].className = "h-1.5 w-1.5 bg-white/60 hover:bg-white rounded-full transition-all duration-300 cursor-pointer";
                    }
                }
            }
        }

        function moveDynamicBanner(step) {
            goToDynamicBanner(dynamicSlideIndex + step);
        }

        if (totalDynamicSlides > 1) {
            // Auto-slide setiap 5 detik
            setInterval(() => {
                moveDynamicBanner(1);
            }, 5000);

            // Dukungan geser (touch swipe) di perangkat mobile
            let touchStartX = 0;
            bannerTrack.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            bannerTrack.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].screenX;
                if (touchStartX - touchEndX > 40) moveDynamicBanner(1);
                if (touchEndX - touchStartX > 40) moveDynamicBanner(-1);
            }, { passive: true });
        }
        

        setInterval(() => {
            let nextSlide = currentSlide + 1;
            if (nextSlide >= banners.length) nextSlide = 0;
            changeSlide(nextSlide);
        }, 6000);

        function toggleFaq(button) {
          const currentItem = button.parentElement;
          const content = currentItem.querySelector('.faq-content');
          const iconPlus = currentItem.querySelector('.icon-plus');
          const iconMinus = currentItem.querySelector('.icon-minus');
          const isCurrentlyOpen = content.classList.contains('grid-rows-[1fr]');
          const allItems = document.querySelectorAll('.faq-item');
          allItems.forEach(item => {
            const itemContent = item.querySelector('.faq-content');
            const iPlus = item.querySelector('.icon-plus');
            const iMinus = item.querySelector('.icon-minus');
            itemContent.classList.remove('grid-rows-[1fr]');
            itemContent.classList.add('grid-rows-[0fr]');
            iPlus.classList.remove('hidden');
            iMinus.classList.add('hidden');
          });
          if (!isCurrentlyOpen) {
            content.classList.remove('grid-rows-[0fr]');
            content.classList.add('grid-rows-[1fr]');
            iconPlus.classList.add('hidden');
            iconMinus.classList.remove('hidden');
          }
        }

        function selectLocation(city) {
            currentLocation = city; 
            if(document.getElementById('desktopLocText')) document.getElementById('desktopLocText').innerText = city;
            if(document.getElementById('mobileLocText')) document.getElementById('mobileLocText').innerText = city;
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

        function toggleLocationModal() {
            const modal = document.getElementById('locationModal');
            if (modal) {
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }
        }

        function selectUniversity(univName, element) {
            document.getElementById('heroLocText').innerText = univName;
            document.getElementById('inputKampusDesktop').value = univName;
            
            if(document.getElementById('heroLocTextMobile')) {
                document.getElementById('heroLocTextMobile').innerText = univName;
                document.getElementById('inputKampusMobile').value = univName;
            }

            const options = document.querySelectorAll('.univ-option');
            options.forEach(opt => {
                opt.classList.remove('border-[#522b89]');
                opt.classList.add('border-[#e2e8f0]');
                opt.querySelector('.check-icon').classList.add('hidden');
            });
            element.classList.remove('border-[#e2e8f0]');
            element.classList.add('border-[#522b89]');
            element.querySelector('.check-icon').classList.remove('hidden');
            toggleLocationModal();
        }

        function toggleFavorite(kosId, btn) {
        @auth
            fetch(`/kos/${kosId}/favorite`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                const svg = btn.querySelector('svg');
                if(data.status === 'added') {
                    svg.classList.add('text-red-500', 'fill-red-500');
                    svg.classList.remove('text-gray-400');
                } else {
                    svg.classList.remove('text-red-500', 'fill-red-500');
                    svg.classList.add('text-gray-400');
                }
            })
            .catch(err => console.error('Error:', err));
        @else
            window.location.href = '/auth';
        @endauth
        }
  </script>
      
  <!-- Script PWA: Mendukung Android (Otomatis) & iOS (Panduan Manual) -->
  <script>
      if ('serviceWorker' in navigator) {
          window.addEventListener('load', () => {
              navigator.serviceWorker.register('/sw.js');
          });
      }
      
      let deferredPrompt;
      const pwaPopup = document.getElementById('pwa-install-popup');
      const installBtn = document.getElementById('pwa-install-btn');
      const cancelBtn = document.getElementById('pwa-cancel-btn');
      const pwaDesc = document.getElementById('pwa-desc');

      // Fungsi deteksi perangkat iOS (iPhone/iPad/iPod)
      function isIOS() {
          return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
      }

      // Fungsi deteksi jika sudah berjalan dalam mode PWA (Standalone)
      function isInStandaloneMode() {
          return (window.matchMedia('(display-mode: standalone)').matches) || (window.navigator.standalone === true);
      }

      // Jika belum dibuka sebagai aplikasi terinstall
      if (!isInStandaloneMode()) {
          if (isIOS()) {
              // --- JIKA PENGGUNA MEMBUKA LEWAT IOS (SAFARI) ---
              // Ubah teks tombol dan deskripsi menjadi panduan manual Safari
              pwaDesc.innerHTML = "Tap ikon <b>Share (Bagikan)</b> di bawah Safari, lalu pilih <b>'Add to Home Screen'</b>.";
              installBtn.innerText = "Cara Install";
              
              // Tampilkan banner setelah 1.5 detik
              setTimeout(() => {
                  pwaPopup.classList.remove('translate-y-[150%]');
                  pwaPopup.classList.add('translate-y-0');
              }, 1500);

              installBtn.addEventListener('click', () => {
                  alert("Ketuk ikon kotak dengan panah ke atas (Share) di menu bagian bawah browser Safari Anda, lalu gulir dan pilih 'Add to Home Screen' (Tambah ke Layar Utama).");
              });

          } else {
              // --- JIKA PENGGUNA MEMBUKA LEWAT ANDROID / BROWSER CHROMIUM ---
              window.addEventListener('beforeinstallprompt', (e) => {
                  e.preventDefault();
                  deferredPrompt = e;
                  
                  setTimeout(() => {
                      pwaPopup.classList.remove('translate-y-[150%]');
                      pwaPopup.classList.add('translate-y-0');
                  }, 1500);
              });

              installBtn.addEventListener('click', async () => {
                  pwaPopup.classList.remove('translate-y-0');
                  pwaPopup.classList.add('translate-y-[150%]');
                  
                  if (deferredPrompt) {
                      deferredPrompt.prompt();
                      const { outcome } = await deferredPrompt.userChoice;
                      console.log(`User respons PWA: ${outcome}`);
                      deferredPrompt = null;
                  }
              });
          }
      }

      cancelBtn.addEventListener('click', () => {
          pwaPopup.classList.remove('translate-y-0');
          pwaPopup.classList.add('translate-y-[150%]');
      });
  </script>

  <script>
    const vapidPublicKey = '{{ env("VAPID_PUBLIC_KEY") }}';
    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);
        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }

    if ('serviceWorker' in navigator && 'PushManager' in window) {
        navigator.serviceWorker.register('/sw.js').then(registration => {
            Notification.requestPermission().then(permission => {
                if (permission === 'granted') {
                    subscribeUser(registration);
                }
            });
        });
    }

    function subscribeUser(registration) {
        if(!vapidPublicKey) return;
        const convertedVapidKey = urlBase64ToUint8Array(vapidPublicKey);
        registration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: convertedVapidKey
        }).then(subscription => {
            fetch('/push-subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(subscription)
            });
        }).catch(err => console.log('Gagal subscribe: ', err));
    }
  </script>
</body>
</html>