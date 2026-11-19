<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kos->nama }} - KOKA Property</title>
    
    <!-- === OPEN GRAPH (OG) META TAGS UNTUK SHARE === -->
    <meta property="og:title" content="{{ $kos->nama }} - KOKA Property" />
    <meta property="og:description" content="{{ $kos->deskripsi ? Str::limit($kos->deskripsi, 120) : 'Temukan kos nyaman dan strategis ini hanya di KOKA Property.' }}" />
    
    @php
        $ogImage = $kos->foto_utama ? (Str::startsWith($kos->foto_utama, ['http', '/storage']) ? $kos->foto_utama : asset('storage/' . str_replace('\\', '/', $kos->foto_utama))) : 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=1000&h=800&fit=crop';
    @endphp
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <!-- ============================================= -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <!-- Container Utama -->
  <main class="mx-auto max-w-[1280px] px-4 pb-28 pt-6 sm:px-6 lg:pb-16">
    
    <!-- Tombol Kembali -->
    <a href="/cari-kos" class="mb-5 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#522b89]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
      Kembali ke pencarian
    </a>

    <!-- Cek URL Gambar -->
    @php
        $imgFallback = 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=1000&h=800&fit=crop';
        
        $foto1 =$kos->foto_utama ? (Str::startsWith($kos->foto_utama, ['http', '/storage']) ?$kos->foto_utama : asset('storage/' . str_replace('\\', '/', $kos->foto_utama))) :$imgFallback;
        
        // Menghapus link dummy Unsplash dan menggantinya menjadi null jika kosong
        $foto2 = $kos->foto_2 ? (Str::startsWith($kos->foto_2, ['http', '/storage']) ? $kos->foto_2 : asset('storage/' . str_replace('\\', '/', $kos->foto_2))) : null;
        $foto3 = $kos->foto_3 ? (Str::startsWith($kos->foto_3, ['http', '/storage']) ? $kos->foto_3 : asset('storage/' . str_replace('\\', '/', $kos->foto_3))) : null;
        $foto4 = $kos->foto_4 ? (Str::startsWith($kos->foto_4, ['http', '/storage']) ? $kos->foto_4 : asset('storage/' . str_replace('\\', '/', $kos->foto_4))) : null;
        
        // Setup Harga Default untuk tampilan awal sidebar/mobile (mengutamakan harga_bulan jika ada)
        $hargaBulanValue = $kos->harga_bulan ?? $kos->harga;
        
        $hasBulan = !empty($hargaBulanValue) &&$hargaBulanValue > 0;
        $has6Bulan = !empty($kos->harga_6_bulan) &&$kos->harga_6_bulan > 0;
        $hasTahun = !empty($kos->harga_tahun) &&$kos->harga_tahun > 0;

        // Tentukan harga dan label default berdasarkan harga yang tersedia
        $baseHarga = 0;
        $baseLabelPeriode = '';$baseLabelJenis = '';

        if ($hasBulan) {
            $baseHarga =$hargaBulanValue;
            $baseLabelPeriode = 'per bulan';$baseLabelJenis = 'Sewa Bulanan';
        } elseif ($has6Bulan) {
            $baseHarga =$kos->harga_6_bulan;
            $baseLabelPeriode = 'per 6 bulan';$baseLabelJenis = 'Sewa 6 Bulan';
        } elseif ($hasTahun) {
            $baseHarga =$kos->harga_tahun;
            $baseLabelPeriode = 'per tahun';$baseLabelJenis = 'Sewa Tahunan';
        }
    @endphp

    <!-- Galeri Foto Dinamis -->
    <div class="grid gap-3 sm:grid-cols-[2fr_1fr]">
      <!-- Gambar Utama -->
      <div class="overflow-hidden rounded-2xl bg-[#f8fafc]">
        <img id="mainImage" src="{{ $foto1 }}" alt="{{ $kos->nama }}" class="aspect-[16/11] w-full object-cover" />
      </div>
      <!-- Thumbnail -->
      <div class="grid grid-cols-4 gap-3 sm:grid-cols-2">
        <button onclick="changeImage(this, '{{ $foto1 }}')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-[#F39C12] transition">
          <img src="{{ $foto1 }}" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        
        @if($foto2)
        <button onclick="changeImage(this, '{{ $foto2 }}')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="{{ $foto2 }}" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        @endif

        @if($foto3)
        <button onclick="changeImage(this, '{{ $foto3 }}')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="{{ $foto3 }}" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        @endif

        @if($foto4)
        <button onclick="changeImage(this, '{{ $foto4 }}')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="{{ $foto4 }}" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        @endif
      </div>
    </div>

    <!-- Layout 2 Kolom -->
    <div class="mt-8 grid gap-10 lg:grid-cols-[1fr_360px]">
      
      <!-- KOLOM KIRI -->
      <div>
        <div class="flex items-start justify-between gap-4">
          <div>
            <!-- AREA BADGES -->
            <div class="flex flex-wrap items-center gap-2">
              <span class="rounded-full bg-[#522b89] px-2.5 py-1 text-[11px] font-semibold text-white">{{ $kos->tipe ?? 'Campur' }}</span>
              <span class="rounded-full bg-[#f8fafc] px-2.5 py-1 text-[11px] font-semibold text-[#522b89]">{{ $kos->kamar_tersedia > 0 ? 'Tersedia' : 'Penuh' }}</span>
              
              <!-- MENAMPILKAN SEKITAR KAMPUS JIKA ADA -->
              @if(!empty($kos->sekitar_kampus) &&$kos->sekitar_kampus !== 'Tidak ada / Pilih Kampus')
                <span class="flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-semibold text-emerald-600">
                  <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/></svg>
                  {{ $kos->sekitar_kampus }}
                </span>
              @endif
            </div>

            <h1 class="mt-3 font-display text-2xl font-bold text-[#522b89] sm:text-3xl">{{ $kos->nama }}</h1>
            <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-[#64748b]">
              <span class="flex items-center gap-1">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                {{ $kos->alamat_lengkap ?? $kos->lokasi }}
              </span>
              <span class="flex items-center gap-1 font-semibold text-[#522b89]">
                <svg class="h-4 w-4 fill-[#F39C12] text-[#F39C12]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg> 
                {{ $kos->rating ?? '4.5' }} <span class="font-normal text-[#64748b]">(Ulasan)</span>
              </span>
            </div>
          </div>
          <div class="flex gap-2">
            <button onclick="shareKos()" class="grid h-10 w-10 place-items-center rounded-full border border-[#e2e8f0] text-[#522b89] transition hover:bg-[#f8fafc]">
              <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" /></svg>
            </button>
            <button onclick="this.classList.toggle('fill-[#F39C12]'); this.classList.toggle('text-[#F39C12]')" class="grid h-10 w-10 place-items-center rounded-full border border-[#e2e8f0] text-[#522b89] transition hover:bg-[#f8fafc]">
              <svg class="h-[18px] w-[18px] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
            </button>
          </div>
        </div>

        <!-- Section Deskripsi -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#522b89]">Deskripsi</h2>
          <p class="text-sm leading-relaxed text-[#64748b] whitespace-pre-line">
            {{ $kos->deskripsi ?? 'Tidak ada deskripsi yang tersedia untuk kos ini.' }}
          </p>
        </section>

        <!-- Section Fasilitas (Dengan PHP Native untuk menghindari error) -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#522b89]">Fasilitas</h2>
          <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
            @if($kos->fasilitas)
               @php
                   $daftarFasilitas = explode(',',$kos->fasilitas);
               @endphp
               
               <?php foreach($daftarFasilitas as$f): ?>
                 <div class="flex items-center gap-2 text-sm text-[#1e293b]">
                   <span class="grid h-5 w-5 place-items-center rounded-full bg-[#F39C12]/15 text-[#F39C12]"><svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg></span>
                   {{ trim($f) }}
                 </div>
               <?php endforeach; ?>
               
            @else
               <div class="text-sm text-[#64748b]">Fasilitas belum ditambahkan.</div>
            @endif
          </div>
        </section>

        <!-- Section Pilihan Harga Sewa Interaktif -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#522b89]">Pilihan Harga Sewa</h2>
          <div class="space-y-3">
            
            @php $indexBtn = 0; @endphp

            <!-- Harga Per Bulan -->
            @if($hasBulan)
            <button onclick="selectPrice({{ $indexBtn }}, 'Sewa Bulanan', '{{ number_format($hargaBulanValue, 0, ',', '.') }}', 'per bulan')" class="price-btn flex w-full items-center justify-between rounded-2xl border {{ $indexBtn == 0 ? 'border-[#522b89] bg-[#f8fafc]' : 'border-[#e2e8f0] bg-white hover:border-[#522b89]/40' }} p-4 text-left transition">
              <div>
                <div class="font-display text-sm font-semibold text-[#522b89]">Sewa Bulanan</div>
                <div class="mt-0.5 text-xs text-[#64748b]">Sisa {{ $kos->kamar_tersedia ?? 0 }} kamar</div>
              </div>
              <div class="text-right">
                <div class="font-display text-sm font-bold text-[#522b89]">Rp {{ number_format($hargaBulanValue, 0, ',', '.') }}</div>
                <div class="text-[11px] text-[#64748b]">per bulan</div>
              </div>
            </button>
            @php $indexBtn++; @endphp
            @endif

            <!-- Harga Per 6 Bulan -->
            @if($has6Bulan)
            <button onclick="selectPrice({{ $indexBtn }}, 'Sewa 6 Bulan', '{{ number_format($kos->harga_6_bulan, 0, ',', '.') }}', 'per 6 bulan')" class="price-btn flex w-full items-center justify-between rounded-2xl border {{ $indexBtn == 0 ? 'border-[#522b89] bg-[#f8fafc]' : 'border-[#e2e8f0] bg-white hover:border-[#522b89]/40' }} p-4 text-left transition">
              <div>
                <div class="font-display text-sm font-semibold text-[#522b89]">Sewa 6 Bulan</div>
                <div class="mt-0.5 text-xs text-[#64748b]">Sisa {{ $kos->kamar_tersedia ?? 0 }} kamar</div>
              </div>
              <div class="text-right">
                <div class="font-display text-sm font-bold text-[#522b89]">Rp {{ number_format($kos->harga_6_bulan, 0, ',', '.') }}</div>
                <div class="text-[11px] text-[#64748b]">per 6 bulan</div>
              </div>
            </button>
            @php $indexBtn++; @endphp
            @endif

            <!-- Harga Per Tahun -->
            @if($hasTahun)
            <button onclick="selectPrice({{ $indexBtn }}, 'Sewa Tahunan', '{{ number_format($kos->harga_tahun, 0, ',', '.') }}', 'per tahun')" class="price-btn flex w-full items-center justify-between rounded-2xl border {{ $indexBtn == 0 ? 'border-[#522b89] bg-[#f8fafc]' : 'border-[#e2e8f0] bg-white hover:border-[#522b89]/40' }} p-4 text-left transition">
              <div>
                <div class="font-display text-sm font-semibold text-[#522b89]">Sewa Tahunan</div>
                <div class="mt-0.5 text-xs text-[#64748b]">Sisa {{ $kos->kamar_tersedia ?? 0 }} kamar</div>
              </div>
              <div class="text-right">
                <div class="font-display text-sm font-bold text-[#522b89]">Rp {{ number_format($kos->harga_tahun, 0, ',', '.') }}</div>
                <div class="text-[11px] text-[#64748b]">per tahun</div>
              </div>
            </button>
            @endif

          </div>
        </section>

      </div>

      <!-- KOLOM KANAN (Sidebar Booking Desktop) -->
      <aside class="hidden lg:block">
        <div class="sticky top-24 rounded-2xl border border-[#e2e8f0] bg-white p-6 shadow-[0_20px_50px_-30px_rgba(82,43,137,0.5)]">
          <div class="text-xs text-[#64748b]">Harga dipilih</div>
          <div id="desktopPrice" class="font-display text-2xl font-extrabold text-[#522b89]">
              {{ $baseHarga > 0 ? 'Rp ' . number_format($baseHarga, 0, ',', '.') : 'Harga Belum Ditentukan' }}
          </div>
          <div class="text-xs text-[#64748b]"><span id="desktopPeriod">{{ $baseLabelPeriode }}</span> <span id="desktopRentType" class="hidden">{{ $baseLabelJenis }}</span></div>
          
          <!-- TOMBOL BOOKING DESKTOP (Diamankan Auth) -->
          @if($baseHarga > 0)
          <a href="{{ Auth::check() ? route('kos.booking', $kos->id) : url('/auth') }}" class="mt-5 block w-full rounded-xl bg-[#F39C12] px-4 py-3.5 text-center text-sm font-bold text-[#522b89] transition hover:opacity-90">
            Booking Sekarang
          </a>
          @endif
          
          <!-- TOMBOL HUBUNGI WHATSAPP (Diamankan Auth) -->
          <a href="{{ Auth::check() ? 'https://wa.me/6282116530496?text=Halo,%20saya%20tertarik%20dengan%20kos%20' . urlencode($kos->nama) : url('/auth') }}" 
             target="{{ Auth::check() ? '_blank' : '_self' }}" 
             class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl border border-[#e2e8f0] bg-white px-4 py-3.5 text-sm font-bold text-[#522b89] transition hover:bg-[#f8fafc]">
            <svg class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Hubungi
          </a>

          <p class="mt-4 text-center text-[11px] text-[#64748b]">Gratis biaya survei · Pembayaran aman via KOKA</p>
        </div>
      </aside>

    </div>

    <!-- Sticky Mobile CTA -->
    <div class="fixed inset-x-0 bottom-[68px] z-30 flex items-center gap-3 border-t border-[#e2e8f0] bg-white/95 px-4 py-3 shadow-[0_-10px_20px_-10px_rgba(0,0,0,0.05)] backdrop-blur lg:hidden">
      <!-- Info Harga -->
      <div class="flex-1 min-w-0">
        <div id="mobilePrice" class="truncate font-display text-[15px] font-bold text-[#522b89] sm:text-base">
            {{ $baseHarga > 0 ? 'Rp ' . number_format($baseHarga, 0, ',', '.') : 'Belum Ditentukan' }}
        </div>
        <div id="mobilePeriod" class="text-[11px] text-[#64748b]">{{ $baseLabelPeriode }}</div>
      </div>
      
      <!-- Kumpulan Tombol -->
      <div class="flex shrink-0 items-center gap-2">
        <!-- TOMBOL HUBUNGI WHATSAPP MOBILE (Diamankan Auth) -->
        <a href="{{ Auth::check() ? 'https://wa.me/6282116530496?text=Halo,%20saya%20tertarik%20dengan%20kos%20' . urlencode($kos->nama) : url('/auth') }}" 
           target="{{ Auth::check() ? '_blank' : '_self' }}" 
           class="grid h-11 w-11 place-items-center rounded-xl border border-[#e2e8f0] bg-white text-emerald-600 transition active:bg-gray-50">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
          </svg>
        </a>

        <!-- TOMBOL BOOKING MOBILE (Diamankan Auth) -->
        @if($baseHarga > 0)
        <a href="{{ Auth::check() ? route('kos.booking', $kos->id) : url('/auth') }}" class="flex h-11 items-center justify-center rounded-xl bg-[#F39C12] px-5 text-sm font-bold text-[#522b89] transition active:opacity-90">
          Booking
        </a>
        @endif
      </div>
    </div>

  </main>

  <x-footer />

  <!-- Logika Interaktif (Vanilla JS) -->
  <script>
    function changeImage(element, newSrc) {
        document.getElementById('mainImage').src = newSrc;
        const thumbs = document.querySelectorAll('.thumbnail-btn');
        thumbs.forEach(btn => {
            btn.classList.remove('ring-[#F39C12]');
            btn.classList.add('ring-transparent');
        });
        element.classList.remove('ring-transparent');
        element.classList.add('ring-[#F39C12]');
    }

    // Fungsi Diperbarui untuk Pilihan Harga
    function selectPrice(index, rentType, price, period) {
        const priceBtns = document.querySelectorAll('.price-btn');
        priceBtns.forEach((btn, i) => {
            if(i === index) {
                btn.classList.remove('border-[#e2e8f0]', 'bg-white');
                btn.classList.add('border-[#522b89]', 'bg-[#f8fafc]');
            } else {
                btn.classList.remove('border-[#522b89]', 'bg-[#f8fafc]');
                btn.classList.add('border-[#e2e8f0]', 'bg-white');
            }
        });

        // Update Desktop Sidebar
        document.getElementById('desktopPrice').innerText = `Rp ${price}`;
        document.getElementById('desktopRentType').innerText = rentType;
        document.getElementById('desktopPeriod').innerText = period;
        
        // Update Mobile Bottom Bar
        document.getElementById('mobilePrice').innerText = `Rp ${price}`;
        document.getElementById('mobilePeriod').innerText = period;
    }

    function shareKos() {
        // 1. Coba gunakan fitur Share bawaan HP (jika mendukung dan HTTPS)
        if (navigator.share && window.isSecureContext) {
            navigator.share({
                title: '{{ $kos->nama }} - KOKA Property',
                text: 'Cek kos ini di KOKA: {{ $kos->nama }} di {{$kos->lokasi }}',
                url: window.location.href,
            }).catch((error) => {
                console.log('Share dibatalkan atau error:', error);
            });
        } else {
            // 2. Fallback jika Share tidak didukung (khususnya iPhone Chrome / Localhost HTTP)
            try {
                const textArea = document.createElement("textarea");
                textArea.value = window.location.href;
                textArea.style.position = "fixed";
                textArea.style.top = "0";
                textArea.style.left = "0";
                textArea.style.opacity = "0";
                document.body.appendChild(textArea);
                
                textArea.focus();
                textArea.select();
                textArea.setSelectionRange(0, 99999); // Untuk iOS
                
                document.execCommand('copy');
                document.body.removeChild(textArea);
                
                alert('Link kos berhasil disalin! Silakan paste (tempel) di WhatsApp atau aplikasi lain.');
            } catch (err) {
                alert('Gagal menyalin link. Silakan copy URL secara manual.');
            }
        }
    }
  </script>

</body>
</html>