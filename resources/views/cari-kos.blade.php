<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Cari Kos</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('iconfavicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll pb-10 lg:pb-0">

  <!-- Komponen Header -->
  <x-navbar />

  <!-- BUNGKUS SELURUH KONTEN DENGAN FORM UNTUK FILTER & PENCARIAN -->
  <form action="{{ url('/cari-kos') }}" method="GET">
    <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6 lg:py-10">
      
      <!-- HEADER -->
      <div class="mb-6">
        <h1 class="font-display text-[24px] lg:text-[32px] font-extrabold text-[#522b89]">
          Daftar Kosan
        </h1>
        <p class="mt-1.5 text-[14px] text-[#64748b]">
          Temukan hunian yang sesuai dengan kebutuhan dan budget kamu.
        </p>
      </div>

      <!-- SEARCH, FILTER ICON (MOBILE) & SORT BAR (DESKTOP) -->
      <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center">
        <div class="flex items-center gap-2 flex-1">
          <!-- Kolom Input Pencarian -->
          <div class="flex flex-1 items-center gap-3 rounded-[16px] border border-[#e2e8f0] bg-white px-4 sm:px-5 py-3.5 shadow-sm">
            <svg class="h-5 w-5 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama kosan, lokasi, atau fasilitas..." class="w-full bg-transparent text-[13px] sm:text-[14px] font-medium text-[#522b89] outline-none placeholder:font-normal placeholder:text-[#94a3b8]" />
          </div>

          <!-- Tombol Ikon Filter (Khusus Mobile di sebelah kanan pencarian) -->
          <button type="button" onclick="openMobileFilter()" class="flex lg:hidden h-[50px] w-[50px] shrink-0 items-center justify-center rounded-[16px] border border-[#e2e8f0] bg-white text-[#522b89] shadow-sm transition active:bg-gray-50">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
          </button>
        </div>

        <!-- Urutkan (Desktop) -->
        <div class="hidden items-center gap-3 sm:flex">
          <span class="text-[14px] font-medium text-[#64748b]">Urutkan</span>
          <select class="cursor-pointer rounded-[16px] border border-[#e2e8f0] bg-white px-4 py-3.5 text-[14px] font-bold text-[#522b89] shadow-sm outline-none hover:border-[#cbd5e1] transition">
            <option>Rekomendasi</option>
            <option>Harga Terendah</option>
            <option>Harga Tertinggi</option>
            <option>Rating</option>
          </select>
        </div>
      </div>

      <!-- QUICK GENDER FILTER TABS (KHUSUS MOBILE) -->
      <div class="mb-6 flex gap-2 overflow-x-auto pb-2 sm:hidden no-scrollbar">
        @php 
            $currentTipe = request('tipe', 'Semua'); 
            $queryParams = request()->except(['tipe', 'page']);
        @endphp
        <a href="{{ url('/cari-kos') . '?' . http_build_query(array_merge($queryParams, ['tipe' => 'Semua'])) }}" class="shrink-0 rounded-full px-5 py-2 text-[13px] font-bold transition {{ $currentTipe == 'Semua' ? 'bg-[#522b89] text-white' : 'border border-[#e2e8f0] bg-white text-[#64748b]' }}">
          Semua
        </a>
        <a href="{{ url('/cari-kos') . '?' . http_build_query(array_merge($queryParams, ['tipe' => 'Putra'])) }}" class="shrink-0 rounded-full px-5 py-2 text-[13px] font-bold transition {{ $currentTipe == 'Putra' ? 'bg-[#522b89] text-white' : 'border border-[#e2e8f0] bg-white text-[#64748b]' }}">
          Putra
        </a>
        <a href="{{ url('/cari-kos') . '?' . http_build_query(array_merge($queryParams, ['tipe' => 'Putri'])) }}" class="shrink-0 rounded-full px-5 py-2 text-[13px] font-bold transition {{ $currentTipe == 'Putri' ? 'bg-[#522b89] text-white' : 'border border-[#e2e8f0] bg-white text-[#64748b]' }}">
          Putri
        </a>
        <a href="{{ url('/cari-kos') . '?' . http_build_query(array_merge($queryParams, ['tipe' => 'Campur'])) }}" class="shrink-0 rounded-full px-5 py-2 text-[13px] font-bold transition {{ $currentTipe == 'Campur' ? 'bg-[#522b89] text-white' : 'border border-[#e2e8f0] bg-white text-[#64748b]' }}">
          Campur
        </a>
      </div>

      <div class="grid gap-8 lg:grid-cols-[280px_1fr]">
        
        <!-- DESKTOP SIDEBAR (FILTER) -->
       <aside class="self-start rounded-[24px] border border-[#e2e8f0] bg-white p-6 shadow-sm hidden lg:block">
          <div class="space-y-8">
            
           <!-- Filter: Lokasi -->
          <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Cari Lokasi Sekitaran Kampus</h4>
            <div class="relative">
              <select name="kampus" class="w-full cursor-pointer appearance-none rounded-[12px] border border-[#e2e8f0] bg-white px-4 py-3 pr-10 text-[14px] font-medium text-[#522b89] transition hover:border-[#522b89] focus:border-[#522b89] focus:outline-none focus:ring-1 focus:ring-[#522b89]">
                <option value="">Pilih Universitas</option>
                <option value="Telkom University" {{ request('kampus') == 'Telkom University' ? 'selected' : '' }}>Telkom University</option>
                <option value="Unpad Jatinangor" {{ request('kampus') == 'Unpad Jatinangor' ? 'selected' : '' }}>Unpad Jatinangor</option>
                <option value="UPI Cibiru" {{ request('kampus') == 'UPI Cibiru' ? 'selected' : '' }}>UPI Cibiru</option>
                <option value="UPI Gerlong" {{ request('kampus') == 'UPI Gerlong' ? 'selected' : '' }}>UPI Gerlong</option>
                <option value="UNDIP" {{ request('kampus') == 'UNDIP' ? 'selected' : '' }}>UNDIP</option>
                <option value="UGM" {{ request('kampus') == 'UGM' ? 'selected' : '' }}>UGM</option>
              </select>
              
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </div>
            </div>
          </div>

            <!-- Filter: Periode / Durasi Sewa -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Periode Sewa</h4>
              <div class="flex flex-wrap gap-2">
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="bulan" class="peer hidden" {{ request('periode', 'bulan') == 'bulan' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per Bulan</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="6_bulan" class="peer hidden" {{ request('periode') == '6_bulan' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per 6 Bulan</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="tahun" class="peer hidden" {{ request('periode') == 'tahun' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per Tahun</div>
                </label>
              </div>
            </div>

            <!-- Filter: Harga Maksimal -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Harga maksimal</h4>
              <input type="range" name="harga_max" min="500000" max="50000000" step="100000" value="{{ request('harga_max', 3000000) }}" class="w-full accent-[#F39C12]" oninput="document.getElementById('hargaValDesktop').innerText = 'Rp ' + parseInt(this.value).toLocaleString('id-ID')" />
              <div id="hargaValDesktop" class="mt-2 text-[14px] font-bold text-[#522b89]">Rp {{ number_format(request('harga_max', 3000000), 0, ',', '.') }}</div>
            </div>

            <!-- Filter: Kategori Kos -->
            <div>
            <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Tipe Kos</h4>
            <div class="flex flex-wrap gap-2.5">
              <label class="cursor-pointer">
                <input type="radio" name="kategori" value="Kosan Kampus" class="peer hidden" {{ request('kategori') == 'Kosan Kampus' ? 'checked' : '' }}>
                <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Kosan Kampus</div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="kategori" value="Eksklusif" class="peer hidden" {{ request('kategori') == 'Eksklusif' ? 'checked' : '' }}>
                <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Eksklusif</div>
              </label>
              <label class="cursor-pointer">
                <input type="radio" name="kategori" value="Ekonomis" class="peer hidden" {{ request('kategori') == 'Ekonomis' ? 'checked' : '' }}>
                <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Ekonomis</div>
              </label>
            </div>
          </div>

            <!-- Filter: Gender -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Gender</h4>
              <div class="flex flex-wrap gap-2.5">
                <label class="cursor-pointer">
                  <input type="radio" name="tipe" value="Semua" class="peer hidden" {{ request('tipe', 'Semua') == 'Semua' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Semua</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="tipe" value="Putra" class="peer hidden" {{ request('tipe') == 'Putra' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Putra</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="tipe" value="Putri" class="peer hidden" {{ request('tipe') == 'Putri' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Putri</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="tipe" value="Campur" class="peer hidden" {{ request('tipe') == 'Campur' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-4 py-2 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Campur</div>
                </label>
              </div>
            </div>

            <!-- Filter: Fasilitas -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Fasilitas</h4>
              <div class="space-y-3.5">
                @php $reqFasilitas = request('fasilitas', []); @endphp
                <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                  <input type="checkbox" name="fasilitas[]" value="Furnished" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#522b89]" {{ in_array('Furnished', $reqFasilitas) ? 'checked' : '' }} /> Furnished
                </label>
                <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                  <input type="checkbox" name="fasilitas[]" value="AC" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#522b89]" {{ in_array('AC', $reqFasilitas) ? 'checked' : '' }} /> AC
                </label>
                <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                  <input type="checkbox" name="fasilitas[]" value="WiFi" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#522b89]" {{ in_array('WiFi', $reqFasilitas) ? 'checked' : '' }} /> WiFi
                </label>
                <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                  <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#522b89]" {{ in_array('Kamar Mandi Dalam', $reqFasilitas) ? 'checked' : '' }} /> Kamar Mandi Dalam
                </label>
                <label class="flex cursor-pointer items-center gap-3 text-[14px] font-medium text-[#1e293b]">
                  <input type="checkbox" name="fasilitas[]" value="Parkir" class="h-4.5 w-4.5 rounded border-[#e2e8f0] accent-[#522b89]" {{ in_array('Parkir', $reqFasilitas) ? 'checked' : '' }} /> Parkir
                </label>
              </div>
            </div>
          </div>

          <div class="mt-8 grid grid-cols-2 gap-3 border-t border-[#e2e8f0] pt-6">
            <a href="{{ url('/cari-kos') }}" class="rounded-xl border border-[#e2e8f0] px-4 py-3 text-center text-[14px] font-bold text-[#522b89] transition hover:bg-[#f8fafc]">
              Reset
            </a>
            <button type="submit" class="rounded-xl bg-[#522b89] px-4 py-3 text-[14px] font-bold text-white transition hover:opacity-90">
              Terapkan
            </button>
          </div>
        </aside>

       <!-- MAIN CONTENT: GRID PROPERTI -->
        <div>
          <p class="mb-5 text-[14px] text-[#64748b]">
            Menampilkan <span class="font-bold text-[#522b89]">{{ method_exists($kosans, 'total') ? $kosans->total() : $kosans->count() }}</span> kos
          </p>
          
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
            
            @forelse($kosans as $kos)
            <!-- Card Responsif: Landscape dengan Box Foto di Mobile, Vertikal di Desktop/Tablet -->
            <a href="/detail-kos/{{ $kos->id }}" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer flex sm:flex-col p-3 sm:p-0">
              
              <!-- Foto Kos dengan Box Tersendiri di Mobile -->
              <div class="relative h-[115px] w-[115px] shrink-0 sm:h-[200px] sm:w-full overflow-hidden rounded-[14px] sm:rounded-none bg-gray-100">
                  <img src="{{ $kos->foto_utama ? asset('storage/' . str_replace('\\', '/', $kos->foto_utama)) : 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format' }}" alt="{{ $kos->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                  
                  <span class="hidden sm:inline-block absolute left-3 top-3 z-10 rounded-full bg-[#522b89] px-3 py-1.5 text-[11px] font-semibold text-white">{{ $kos->tipe }}</span>
              </div>

              <!-- Konten Card -->
              <div class="pl-3.5 sm:p-5 flex flex-col justify-between flex-1 relative">
                
                @php
                  $isFavorited = Auth::check() ? \App\Models\Favorite::where('user_id', Auth::id())->where('kos_id', $kos->id)->exists() : false;
                @endphp

                <!-- Tombol Favorite (Hati) di Sebelah Kanan Atas -->
                <button onclick="event.preventDefault(); event.stopPropagation(); toggleFavorite({{ $kos->id }}, this);" class="absolute right-0 top-0 sm:right-3 sm:top-3 z-10 flex h-7 w-7 sm:h-8 sm:w-8 items-center justify-center rounded-full bg-white shadow-sm transition hover:scale-110 cursor-pointer">
                  <svg class="h-3.5 w-3.5 sm:h-4 sm:w-4 transition {{ $isFavorited ? 'text-red-500 fill-red-500' : 'text-[#522b89]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>
                </button>

                <div class="pr-6 sm:pr-0">
                  <div class="flex items-start justify-between gap-2">
                    <h3 class="font-display text-[14px] sm:text-[15px] font-bold text-[#522b89] line-clamp-1">{{ $kos->nama }}</h3>
                    <div class="hidden sm:flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                      <span class="text-[#F39C12] text-[14px]">★</span> {{ $kos->rating ?? '4.5' }}
                    </div>
                  </div>

                  <div class="mt-1 flex items-center gap-1 text-[11px] sm:text-[12px] text-[#64748b]">
                    <svg class="h-3 w-3 sm:h-3.5 sm:w-3.5 shrink-0 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                    <span class="truncate">{{ $kos->lokasi }}</span>
                  </div>

                  <!-- BLOK HARGA -->
                  <div class="mt-1.5 sm:mt-4 flex flex-col">
                    @if(isset($kos->harga_bulan) && $kos->harga_bulan > 0)
                      <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#F39C12] sm:text-[#522b89]">Rp {{ number_format($kos->harga_bulan, 0, ',', '.') }} <span class="text-[10px] sm:text-[11px] font-normal text-[#64748b]">/ bulan</span></span>
                    @elseif(isset($kos->harga_6_bulan) && $kos->harga_6_bulan > 0)
                      <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#F39C12] sm:text-[#522b89]">Rp {{ number_format($kos->harga_6_bulan, 0, ',', '.') }} <span class="text-[10px] sm:text-[11px] font-normal text-[#64748b]">/ 6 bulan</span></span>
                    @elseif(isset($kos->harga_tahun) && $kos->harga_tahun > 0)
                      <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#F39C12] sm:text-[#522b89]">Rp {{ number_format($kos->harga_tahun, 0, ',', '.') }} <span class="text-[10px] sm:text-[11px] font-normal text-[#64748b]">/ tahun</span></span>
                    @elseif(isset($kos->harga) && $kos->harga > 0)
                      <span class="font-display text-[14px] sm:text-[16px] font-extrabold text-[#F39C12] sm:text-[#522b89]">Rp {{ number_format($kos->harga, 0, ',', '.') }} <span class="text-[10px] sm:text-[11px] font-normal text-[#64748b]">/ tahun</span></span>
                    @else
                      <span class="font-display text-[13px] sm:text-[15px] font-bold text-[#522b89]">Hubungi Pemilik</span>
                    @endif
                  </div>

                  <!-- Fasilitas Badge -->
                  <div class="mt-2 flex flex-wrap gap-1.5 text-[10px] sm:text-[11px] font-medium text-gray-500">
                    @if($kos->fasilitas)
                      @foreach(array_slice(explode(',', $kos->fasilitas), 0, 3) as $fasilitas)
                        <span class="rounded-full bg-gray-50 border border-gray-100 px-2.5 py-0.5 text-[#64748b]">{{ trim($fasilitas) }}</span>
                      @endforeach
                    @else
                      <span class="rounded-full bg-gray-50 border border-gray-100 px-2.5 py-0.5 text-[#64748b]">Fasilitas Standar</span>
                    @endif
                  </div>
                </div>

                <!-- Rating di bagian bawah untuk mobile -->
                <div class="mt-2 pt-1 flex items-center justify-between sm:hidden">
                  <div class="flex items-center gap-1 text-[11px] font-bold text-[#64748b]">
                    <span class="text-[#F39C12]">★</span> {{ $kos->rating ?? '4.5' }}
                  </div>
                </div>

              </div>
            </a>
            @empty
            <div class="col-span-full rounded-2xl border border-dashed border-[#e2e8f0] bg-slate-50 p-8 text-center">
              <p class="text-sm font-medium text-[#64748b]">Maaf, kos dengan kriteria tersebut tidak ditemukan.</p>
            </div>
            @endforelse

          </div>

          <!-- NAVIGASI PAGINATION -->
          <div class="mt-10 mb-6 flex justify-center">
              @if(method_exists($kosans, 'links'))
                  {{ $kosans->appends(request()->query())->links('components.pagination') }}
              @endif
          </div>

        </div>

      </div>

    </main>

    <!-- ================= MOBILE FILTER MODAL ================= -->
    <div id="mobileFilterModal" class="fixed inset-0 z-[100] hidden items-end justify-center transition-opacity lg:hidden">
      <div id="mobileFilterBackdrop" class="absolute inset-0 bg-[#522b89]/40 backdrop-blur-sm opacity-0 transition-opacity duration-300" onclick="closeMobileFilter()"></div>
      
      <div id="mobileFilterPanel" class="relative flex w-full max-h-[90vh] flex-col overflow-hidden rounded-t-[32px] bg-white shadow-2xl transition-transform duration-300 translate-y-full">
        <div class="mx-auto mt-3 h-1.5 w-12 shrink-0 rounded-full bg-[#e2e8f0]"></div>
        
        <div class="flex shrink-0 items-center justify-between border-b border-[#e2e8f0] px-6 py-4">
          <h3 class="font-display text-[18px] font-bold text-[#522b89]">Filter Kos</h3>
          <button type="button" onclick="closeMobileFilter()" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#522b89] transition hover:bg-[#e2e8f0]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
          </button>
        </div>

        <div class="flex-1 overflow-y-auto px-6 py-5">
          <div class="space-y-8 pb-4">
            
            <!-- Filter: Periode / Durasi Sewa (Mobile) -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Periode Sewa</h4>
              <div class="flex flex-wrap gap-2">
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="bulan" class="peer hidden" {{ request('periode', 'bulan') == 'bulan' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per Bulan</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="6_bulan" class="peer hidden" {{ request('periode') == '6_bulan' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per 6 Bulan</div>
                </label>
                <label class="cursor-pointer">
                  <input type="radio" name="periode" value="tahun" class="peer hidden" {{ request('periode') == 'tahun' ? 'checked' : '' }}>
                  <div class="rounded-full border border-[#e2e8f0] px-3.5 py-1.5 text-[12px] font-medium text-[#64748b] transition peer-checked:bg-[#522b89] peer-checked:text-white peer-checked:border-[#522b89] hover:border-[#522b89]">Per Tahun</div>
                </label>
              </div>
            </div>

            <!-- Filter: Harga Maksimal -->
            <div>
              <h4 class="mb-3 font-display text-[14px] font-bold text-[#522b89]">Harga maksimal</h4>
              <input type="range" id="mobilePriceRange" min="500000" max="50000000" step="100000" value="{{ request('harga_max', 3000000) }}" class="w-full accent-[#F39C12]" oninput="syncPrice(this.value)" />
              <div id="hargaValMobile" class="mt-2 text-[14px] font-bold text-[#522b89]">Rp {{ number_format(request('harga_max', 3000000), 0, ',', '.') }}</div>
            </div>

            <div class="rounded-xl bg-purple-50 p-4 text-sm text-[#522b89]">
              Silakan atur filter lengkapnya pada tampilan layar yang lebih besar (Desktop/Tablet) untuk pengalaman terbaik.
            </div>
            
          </div>
        </div>

        <div class="shrink-0 grid grid-cols-2 gap-3 border-t border-[#e2e8f0] p-6 pb-8">
          <a href="{{ url('/cari-kos') }}" class="rounded-[14px] border border-[#e2e8f0] px-4 py-3.5 text-center text-[14px] font-bold text-[#522b89] transition active:bg-gray-50">Reset</a>
          <button type="submit" class="rounded-[14px] bg-[#522b89] px-4 py-3.5 text-[14px] font-bold text-white transition hover:opacity-90">Terapkan</button>
        </div>
      </div>
    </div>
  </form>

  <script>
      function syncPrice(value) {
          const formatted = 'Rp ' + parseInt(value).toLocaleString('id-ID');
          document.getElementById('hargaValMobile').innerText = formatted;
          document.getElementById('hargaValDesktop').innerText = formatted;
          document.querySelector('input[name="harga_max"]').value = value;
      }

      function openMobileFilter() {
          const modal = document.getElementById('mobileFilterModal');
          const backdrop = document.getElementById('mobileFilterBackdrop');
          const panel = document.getElementById('mobileFilterPanel');
          
          modal.classList.remove('hidden');
          modal.classList.add('flex');
          
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
          
          backdrop.classList.remove('opacity-100');
          backdrop.classList.add('opacity-0');
          panel.classList.remove('translate-y-0');
          panel.classList.add('translate-y-full');
          
          setTimeout(() => {
              modal.classList.add('hidden');
              modal.classList.remove('flex');
          }, 300);
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
                    svg.classList.remove('text-[#522b89]');
                } else {
                    svg.classList.remove('text-red-500', 'fill-red-500');
                    svg.classList.add('text-[#522b89]');
                }
            })
            .catch(err => console.error('Error:', err));
        @else
            window.location.href = '/auth';
        @endauth
      }
  </script>

</body>
</html>