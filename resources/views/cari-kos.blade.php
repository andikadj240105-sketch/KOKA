<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Cari Kos</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- pb-24 agar konten paling bawah tidak tertutup sticky bar di mobile -->
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll pb-24 lg:pb-0">

  <!-- Komponen Header -->
  <x-navbar />

  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6 lg:py-10">
    
    <!-- HEADER -->
    <div class="mb-6">
      <h1 class="font-display text-[24px] lg:text-[32px] font-extrabold text-[#0b2046]">
        Cari Kos di Bandung
      </h1>
      <p class="mt-1.5 text-[14px] text-[#64748b]">
        Temukan hunian yang sesuai dengan kebutuhan dan budget kamu.
      </p>
    </div>

    <!-- SEARCH & SORT BAR -->
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center">
      <div class="flex flex-1 items-center gap-3 rounded-[16px] border border-[#e2e8f0] bg-white px-5 py-3.5 shadow-sm">
        <svg class="h-5 w-5 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
        <input placeholder="Cari nama kos atau area..." class="w-full bg-transparent text-[14px] font-medium text-[#0b2046] outline-none placeholder:font-normal placeholder:text-[#94a3b8]" />
      </div>
      <div class="hidden items-center gap-3 sm:flex">
        <span class="text-[14px] font-medium text-[#64748b]">Urutkan</span>
        <select class="cursor-pointer rounded-[16px] border border-[#e2e8f0] bg-white px-4 py-3.5 text-[14px] font-bold text-[#0b2046] shadow-sm outline-none hover:border-[#cbd5e1] transition">
          <option>Rekomendasi</option>
          <option>Harga Terendah</option>
          <option>Harga Tertinggi</option>
          <option>Rating</option>
        </select>
      </div>
    </div>

    <div class="grid gap-8 lg:grid-cols-[280px_1fr]">
      
      <!-- DESKTOP SIDEBAR (FILTER) -->
      <!-- Di Mobile elemen ini di-hide (hidden), di Desktop dimunculkan (lg:block) -->
     <aside class="self-start rounded-[24px] border border-[#e2e8f0] bg-white p-6 shadow-sm">
        <div class="space-y-8">
          
          <!-- Filter: Lokasi -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]"> Cari Lokasi Sekitaran Kampus</h4>
            <button class="flex w-full items-center justify-between rounded-[12px] border border-[#e2e8f0] px-4 py-3 text-[14px] font-medium text-[#0b2046] transition hover:border-[#0b2046]">
              Bandung 
              <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
            </button>
          </div>

          <!-- Filter: Harga Maksimal -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Harga maksimal / tahun</h4>
            <input type="range" min="8000000" max="20000000" step="500000" class="w-full accent-[#E5B044]" />
            <div class="mt-2 text-[14px] font-bold text-[#0b2046]">Rp 20.000.000</div>
          </div>

          <!-- Filter: Tipe Kos -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Tipe Kos</h4>
            <div class="flex flex-wrap gap-2.5">
              <button class="rounded-full bg-[#0b2046] px-4 py-2 text-[12px] font-bold text-white transition">Kosan Kampus</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition hover:border-[#0b2046] hover:text-[#0b2046]">Eksklusif</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition hover:border-[#0b2046] hover:text-[#0b2046]">Ekonomis</button>
            </div>
          </div>

          <!-- Filter: Gender -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Gender</h4>
            <div class="flex flex-wrap gap-2.5">
              <button class="rounded-full bg-[#0b2046] px-4 py-2 text-[12px] font-bold text-white transition">Semua</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition hover:border-[#0b2046] hover:text-[#0b2046]">Putra</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition hover:border-[#0b2046] hover:text-[#0b2046]">Putri</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition hover:border-[#0b2046] hover:text-[#0b2046]">Campur</button>
            </div>
          </div>

          <!-- Filter: Fasilitas -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Fasilitas</h4>
            <div class="space-y-3.5">
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                <input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Furnished
              </label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                <input type="checkbox" checked class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> AC
              </label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                <input type="checkbox" checked class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> WiFi
              </label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                <input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Kamar Mandi Dalam
              </label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                <input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Parkir
              </label>
            </div>
          </div>
        </div>

        <div class="mt-8 grid grid-cols-2 gap-3 border-t border-[#e2e8f0] pt-6">
          <button class="rounded-xl border border-[#e2e8f0] px-4 py-3 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">
            Reset
          </button>
          <button class="rounded-xl bg-[#0b2046] px-4 py-3 text-[14px] font-bold text-white transition hover:opacity-90">
            Terapkan
          </button>
        </div>
      </aside>

      <!-- MAIN CONTENT: GRID PROPERTI -->
      <div>
        <p class="mb-5 text-[14px] text-[#64748b]">
          Menampilkan <span class="font-bold text-[#0b2046]">4</span> kos
        </p>
        
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
          
         <!-- Card 1 -->
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">Kosan Kampus</span>
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                </button>
            </div>
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
              <div class="mt-4 flex flex-wrap gap-4 text-[11px] font-medium text-gray-500">
                <span>Kamar Mandi Dalam</span><span>AC</span><span>WiFi</span>
              </div>
              <div class="mt-6 flex flex-col border-t border-[#e2e8f0] pt-4">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 12.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>

          <!-- Card 2 -->
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop&auto=format" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">Kosan Kampus</span>
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
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
                <span>WiFi</span><span>Furnished</span>
              </div>
              <div class="mt-6 flex flex-col border-t border-[#e2e8f0] pt-4">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 11.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>

          <!-- Card 3 -->
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=400&h=300&fit=crop&auto=format" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">Eksklusif</span>
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
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
                <span>AC</span><span>Parkir</span>
              </div>
              <div class="mt-6 flex flex-col border-t border-[#e2e8f0] pt-4">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>

          <!-- Card 4 -->
          <a href="/detail-kos" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?w=400&h=300&fit=crop&auto=format" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#0b2046] px-3 py-1.5 text-[11px] font-semibold text-white">Kosan Kampus</span>
                <button onclick="event.preventDefault(); event.stopPropagation(); this.classList.toggle('text-red-500'); this.classList.toggle('text-gray-400')" class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:scale-110">
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
                <span>Kamar Mandi Dalam</span><span>WiFi</span>
              </div>
              <div class="mt-6 flex flex-col border-t border-[#e2e8f0] pt-4">
                <span class="font-display text-[16px] font-extrabold text-[#0b2046]">Rp 15.000.000</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        </div>
      </div>

    </div>

    <!-- MOBILE STICKY FILTER BOTTOM BAR -->
    <div class="fixed inset-x-0 bottom-0 z-30 flex gap-3 border-t border-[#e2e8f0] bg-white/95 px-4 py-4 backdrop-blur lg:hidden shadow-[0_-10px_20px_-10px_rgba(0,0,0,0.05)]">
      <!-- PERBAIKAN: Menambahkan onclick="openMobileFilter()" -->
      <button onclick="openMobileFilter()" class="flex flex-1 items-center justify-center gap-2 rounded-[16px] border border-[#e2e8f0] bg-white px-4 py-3.5 text-[14px] font-bold text-[#0b2046] shadow-sm active:bg-gray-50 transition">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg> 
        Filter
      </button>
      <select class="flex-1 rounded-[16px] border border-[#e2e8f0] bg-white px-4 py-3.5 text-[14px] font-bold text-[#0b2046] shadow-sm outline-none text-center appearance-none">
        <option>Rekomendasi</option>
        <option>Harga Terendah</option>
        <option>Harga Tertinggi</option>
        <option>Rating</option>
      </select>
    </div>

  </main>

  <x-footer />

  <!-- ================= MOBILE FILTER MODAL (BOTTOM SHEET) ================= -->
  <!-- Komponen ini akan meluncur dari bawah saat tombol Filter di HP ditekan -->
  <div id="mobileFilterModal" class="fixed inset-0 z-[100] hidden items-end justify-center transition-opacity lg:hidden">
    
    <!-- Backdrop Gelap -->
    <div id="mobileFilterBackdrop" class="absolute inset-0 bg-[#0b2046]/40 backdrop-blur-sm opacity-0 transition-opacity duration-300" onclick="closeMobileFilter()"></div>
    
    <!-- Kotak Bottom Sheet -->
    <div id="mobileFilterPanel" class="relative flex w-full max-h-[90vh] flex-col overflow-hidden rounded-t-[32px] bg-white shadow-2xl transition-transform duration-300 translate-y-full">
      
      <!-- Garis Tarik (Handle) -->
      <div class="mx-auto mt-3 h-1.5 w-12 shrink-0 rounded-full bg-[#e2e8f0]"></div>
      
      <!-- Header -->
      <div class="flex shrink-0 items-center justify-between border-b border-[#e2e8f0] px-6 py-4">
        <h3 class="font-display text-[18px] font-bold text-[#0b2046]">Filter Kos</h3>
        <button onclick="closeMobileFilter()" aria-label="Tutup" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Konten Filter (Bisa di-scroll) -->
      <div class="flex-1 overflow-y-auto px-6 py-5">
        <div class="space-y-8 pb-4">
          
          <!-- Duplikat Filter: Lokasi -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Lokasi</h4>
            <button class="flex w-full items-center justify-between rounded-[12px] border border-[#e2e8f0] px-4 py-3 text-[14px] font-medium text-[#0b2046]">
              Bandung <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
            </button>
          </div>

          <!-- Duplikat Filter: Harga -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Harga maksimal / tahun</h4>
            <input type="range" min="8000000" max="20000000" step="500000" class="w-full accent-[#E5B044]" />
            <div class="mt-2 text-[14px] font-bold text-[#0b2046]">Rp 20.000.000</div>
          </div>

          <!-- Duplikat Filter: Tipe Kos -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Tipe Kos</h4>
            <div class="flex flex-wrap gap-2.5">
              <button class="rounded-full bg-[#0b2046] px-4 py-2 text-[12px] font-bold text-white">Kosan Kampus</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b]">Eksklusif</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b]">Ekonomis</button>
            </div>
          </div>

          <!-- Duplikat Filter: Gender -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Gender</h4>
            <div class="flex flex-wrap gap-2.5">
              <button class="rounded-full bg-[#0b2046] px-4 py-2 text-[12px] font-bold text-white">Semua</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b]">Putra</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b]">Putri</button>
              <button class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b]">Campur</button>
            </div>
          </div>

          <!-- Duplikat Filter: Fasilitas -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#0b2046]">Fasilitas</h4>
            <div class="space-y-3.5">
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]"><input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Furnished</label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]"><input type="checkbox" checked class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> AC</label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]"><input type="checkbox" checked class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> WiFi</label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]"><input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Kamar Mandi Dalam</label>
              <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]"><input type="checkbox" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#0b2046]" /> Parkir</label>
            </div>
          </div>
          
        </div>
      </div>

      <!-- Footer Tombol Sticky -->
      <div class="shrink-0 grid grid-cols-2 gap-3 border-t border-[#e2e8f0] p-6 pb-8">
        <button class="rounded-[14px] border border-[#e2e8f0] px-4 py-3.5 text-[14px] font-bold text-[#0b2046] transition active:bg-gray-50">Reset</button>
        <button onclick="closeMobileFilter()" class="rounded-[14px] bg-[#0b2046] px-4 py-3.5 text-[14px] font-bold text-white transition hover:opacity-90">Terapkan</button>
      </div>
      
    </div>
  </div>

  <!-- SCRIPT LOGIKA BUKA TUTUP MODAL -->
  <script>
      function openMobileFilter() {
          const modal = document.getElementById('mobileFilterModal');
          const backdrop = document.getElementById('mobileFilterBackdrop');
          const panel = document.getElementById('mobileFilterPanel');
          
          modal.classList.remove('hidden');
          modal.classList.add('flex');
          
          // Animasi Muncul
          setTimeout(() => {
              backdrop.classList.remove('opacity-0');
              backdrop.classList.add('opacity-100');
              panel.classList.remove('translate-y-full');
              panel.classList.add('translate-y-0');
          }, 10);
      }

      function closeMobileFilter() {
          const modal = document.getElementById('mobileFilterModal');
          const backdrop = document.getElementById('mobileFilterBackdrop');
          const panel = document.getElementById('mobileFilterPanel');
          
          // Animasi Turun
          backdrop.classList.remove('opacity-100');
          backdrop.classList.add('opacity-0');
          panel.classList.remove('translate-y-0');
          panel.classList.add('translate-y-full');
          
          setTimeout(() => {
              modal.classList.add('hidden');
              modal.classList.remove('flex');
          }, 300);
      }
  </script>

</body>
</html>