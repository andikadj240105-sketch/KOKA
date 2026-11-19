<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Layanan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('iconfavicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <!-- LOGIKA TARIK DATA DARI DATABASE (BERDASARKAN ID) -->
 @php
     // Ambil semua layanan dan jadikan ID sebagai kuncinya
     $dbServices = \App\Models\Service::all()->keyBy('id');

     // Fungsi untuk mengambil nama, deskripsi, dan status is_active berdasarkan ID
     $getSvc = function($id, $defaultName, $defaultDesc) use ($dbServices) {
         $svc = $dbServices->get($id);
         return [
             'nama'      => $svc ? $svc->nama : $defaultName,
             'desc'      => $svc ? $svc->deskripsi : $defaultDesc,
             'is_active' => $svc ? (bool)$svc->is_active : false,
         ];
     };

     // Inisialisasi variabel dengan mencocokkan urutan ID di database
     $jek      = $getSvc(1, 'KosanJek', 'Antar-jemput & Pengantaran');
     $move     = $getSvc(2, 'KosanMove', 'Pindahan Mudah');
     $clean    = $getSvc(3, 'KosanClean', 'Kebersihan Terjaga');
     $fix      = $getSvc(4, 'KosanFix', 'Perawatan & Perbaikan');
     $laundry  = $getSvc(5, 'KosanLaundry', 'Laundry Praktis');
     $guestkos = $getSvc(6, 'Guest Kos', 'Penginapan Harian Tamu');
     $storage  = $getSvc(7, 'KosanStorage', 'Titip Barang Aman');
     $lapor    = $getSvc(8, 'Lapor Masalah', 'Laporkan Masalah');
     $guard    = $getSvc(9, 'Kosan Guard', 'Jasa pengantaran pulang ke kos');
     $care     = $getSvc(10, 'KOKA Care', 'Bantuan 24/7 untukmu');
 @endphp

  <!-- Konten Utama Layanan -->
  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6 lg:py-12 min-h-[70vh]">
    
    <!-- Page Head (Tombol Kembali & Judul) -->
    <div class="mb-8">
      <a href="/" class="mb-6 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#522b89]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg> 
        Kembali
      </a>
      <h1 class="font-display text-[24px] lg:text-[32px] font-bold text-[#522b89]">Layanan KOKA</h1>
      <p class="mt-1.5 text-[14px] text-[#64748b]">Semua kebutuhan anak kos dalam satu aplikasi. Klik layanan untuk memesan.</p>
    </div>

    <!-- Grid Layanan Dinamis dari Database -->
    <div class="grid grid-cols-2 gap-3.5 sm:grid-cols-3 sm:gap-4 lg:grid-cols-5">
       <!-- 1. KosanJek -->
        <button 
            @if($jek['is_active'])
                @auth onclick="openModal('{{ $jek['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $jek['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <!-- Elemen Animasi Gelombang Naik -->
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <!-- Konten (relative z-10 agar di atas gelombang) -->
            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 256 256"><path d="M208,40H167.2a40,40,0,0,0-78.4,0H48a8,8,0,0,0,0,16H88.8a40,40,0,0,0,12.58,21.82A64.08,64.08,0,0,0,64,136v64a16,16,0,0,0,16,16H96a32,32,0,0,0,64,0h16a16,16,0,0,0,16-16V136a64.08,64.08,0,0,0-37.38-58.18A40,40,0,0,0,167.2,56H208a8,8,0,0,0,0-16ZM144,216a16,16,0,0,1-32,0V168a16,16,0,0,1,32,0Zm32-80v64H160V168a32,32,0,0,0-64,0v32H80V136a48,48,0,0,1,96,0ZM104,48a24,24,0,1,1,24,24A24,24,0,0,1,104,48Z"></path></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $jek['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $jek['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 2. KosanMove -->
        <button 
            @if($move['is_active'])
                @auth onclick="openModal('{{ $move['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $move['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M5 18H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h10c.6 0 1 .4 1 1v11"/><path stroke-linecap="round" stroke-linejoin="round" d="M14 9h4l4 4v5c0 .6-.4 1-1 1h-2"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $move['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $move['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 3. KosanClean -->
        <button 
            @if($clean['is_active'])
                @auth onclick="openModal('{{ $clean['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $clean['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $clean['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $clean['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 4. KosanFix -->
        <button 
            @if($fix['is_active'])
                @auth onclick="openModal('{{ $fix['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $fix['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $fix['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $fix['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 5. KosanLaundry -->
        <button 
            @if($laundry['is_active'])
                @auth onclick="openModal('{{ $laundry['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $laundry['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $laundry['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $laundry['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 6. Guest Kos -->
        <button 
            @if($guestkos['is_active'])
                @auth onclick="openModal('{{ $guestkos['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $guestkos['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2 8v11m0-5h20m-5-6h4a2 2 0 0 1 2 2v4H15V8zm-8 3a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm15 8v-5"/>
                    </svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $guestkos['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $guestkos['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 7. KosanStorage -->
        <button 
            @if($storage['is_active'])
                @auth onclick="openModal('{{ $storage['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $storage['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m7.5 4.27 9 5.15"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m3.3 7 8.7 5 8.7-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 22V12"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $storage['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $storage['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 8. Lapor Masalah (WA Direct) -->
        <button 
            @if($lapor['is_active'])
                @auth onclick="window.open('https://wa.me/6282116530496?text=Halo%20Admin,%20saya%20ingin%20melaporkan%20masalah%20di%20Kosan...', '_blank')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $lapor['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 22v-7"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $lapor['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $lapor['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 9. Kosan Guard (Sebelumnya KOKA Rewards) -->
        <button 
            @if($guard['is_active'])
                @auth onclick="openModal('{{ $guard['nama'] }}')" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $guard['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <!-- Mengganti Ikon menjadi Ikon Penjagaan / Perisai -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $guard['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $guard['desc'] }}</div>
                </div>
            </div>
        </button>

        <!-- 10. KOKA Care -->
        <button 
            @if($care['is_active'])
                @auth onclick="window.location.href='/kokacare'" @else onclick="window.location.href='/auth'" @endauth 
            @else
                onclick="openComingSoon('{{ $care['nama'] }}')"
            @endif
            class="group relative overflow-hidden cursor-pointer flex flex-col items-start gap-3 rounded-2xl border border-transparent bg-[#522b89] p-5 sm:p-6 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            
            <div class="absolute left-0 top-0 h-full w-full translate-y-full transition-transform duration-[800ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[40px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>

            <div class="relative z-10 flex flex-col items-start gap-3 w-full">
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-white/10 text-[#F39C12] transition-all duration-[800ms] group-hover:scale-110 group-hover:bg-white group-hover:text-[#522b89]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/></svg>
                </div>
                <div>
                    <div class="font-display text-[14px] font-semibold text-white transition-colors duration-[800ms] group-hover:text-[#522b89]">{{ $care['nama'] }}</div>
                    <div class="mt-0.5 text-[11px] leading-snug text-white/70 transition-colors duration-[800ms] group-hover:text-[#522b89]/80">{{ $care['desc'] }}</div>
                </div>
            </div>
        </button>

    </div>
  </main>

  <x-modal-layanan />

  <!-- ================= MODAL COMING SOON ================= -->
  <div id="comingSoonModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-0 transition-opacity">
   <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeComingSoon()"></div>
    
    <div role="dialog" aria-modal="true" class="relative flex w-full max-w-sm flex-col overflow-hidden rounded-[24px] sm:rounded-[32px] bg-white shadow-2xl animate-in-up">
      <div class="absolute right-4 top-4 sm:right-5 sm:top-5 z-10">
        <button onclick="closeComingSoon()" aria-label="Tutup" class="grid h-8 w-8 place-items-center rounded-full bg-[#f8fafc] text-[#522b89] transition hover:bg-[#e2e8f0]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <div class="flex flex-col items-center px-6 py-8 sm:py-10 text-center">
        <div class="relative grid h-16 w-16 sm:h-20 sm:w-20 place-items-center rounded-full bg-[#522b89] text-[#F39C12] shadow-md">
            <svg class="h-8 w-8 sm:h-10 sm:w-10 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" style="animation-duration: 2s;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="absolute -right-1 -top-1 h-3 w-3 sm:h-4 sm:w-4 rounded-full bg-[#F39C12] animate-ping"></div>
        </div>
        
        <h4 class="mt-5 sm:mt-6 font-display text-[18px] sm:text-[20px] font-extrabold text-[#522b89]">Layanan yang akan datang</h4>
        
        <p class="mt-2 text-[13px] sm:text-[14px] leading-relaxed text-[#64748b]">
          Layanan <span id="comingSoonTitle" class="font-bold text-[#522b89]">Nama Layanan</span> sedang dalam tahap pengembangan. Nantikan update terbaru dari kami segera!
        </p>
        
        <button onclick="closeComingSoon()" class="mt-6 sm:mt-8 w-full rounded-full bg-[#F39C12] px-6 py-3 sm:py-3.5 text-[13px] sm:text-[14px] font-bold text-[#522b89] shadow-sm transition hover:scale-105 hover:bg-[#F5B041]">
          Oke, Mengerti
        </button>
      </div>
    </div>
  </div>

  <x-footer />

  <script>
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