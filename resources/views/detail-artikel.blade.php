<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artikel->judul }} - KOKA Property</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">

  <x-navbar />

  <main class="mx-auto max-w-[800px] px-4 py-10 sm:px-6 lg:py-16">
    
    <!-- Navigasi Kembali -->
    <a href="{{ route('artikel.index') }}" class="mb-8 inline-flex items-center gap-1.5 text-[14px] font-medium text-slate-500 transition hover:text-[#6b21a8]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
      Kembali ke daftar artikel
    </a>

    <!-- Header Artikel -->
    <header class="mb-8">
      <span class="inline-block mb-3 rounded-lg bg-purple-50 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#6b21a8] ring-1 ring-[#6b21a8]/15">
        {{ $artikel->kategori }}
      </span>

      <h1 class="font-display text-[28px] font-extrabold leading-snug text-[#6b21a8] md:text-[36px]">
        {{ $artikel->judul }}
      </h1>
      
      <div class="mt-6 flex flex-col gap-1 text-[14px] text-[#64748b]">
        <span class="font-medium text-[#6b21a8]">by {{ $artikel->penulis }}</span>
        <span>{{ $artikel->created_at->translatedFormat('l, d F Y') }}</span>
      </div>
    </header>

    <!-- Gambar Banner Utama Artikel -->
    @if($artikel->gambar)
      <div class="mb-10 overflow-hidden rounded-2xl shadow-sm bg-slate-100 max-h-[420px]">
          <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover" />
      </div>
    @endif

    <!-- Isi Konten Artikel (Merender Blok Subjudul & Paragraf Rata Kiri-Kanan) -->
    <div class="space-y-6">
      @if(is_array($artikel->konten))
        @foreach($artikel->konten as $blok)
          @if(isset($blok['type']) && $blok['type'] === 'subjudul')
            <h2 class="font-display text-[22px] font-bold text-[#6b21a8] mt-8 mb-2">
              {{ $blok['text'] }}
            </h2>
          @else
            <p class="text-base leading-relaxed text-[#334155] text-justify">
              {!! nl2br(e($blok['text'] ?? '')) !!}
            </p>
          @endif
        @endforeach
      @endif
    </div>
    
  </main>

  <x-footer />
</body>
</html>