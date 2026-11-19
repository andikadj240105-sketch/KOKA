<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel & Informasi - KOKA Property</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-ink antialiased overflow-y-scroll">

  <x-navbar />

  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6">
    
    <!-- HEADER HALAMAN -->
    <div class="mb-10">
      <a href="javascript:history.back()" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 transition hover:text-[#6b21a8]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
      </a>
      <h1 class="font-display text-3xl font-bold text-[#6b21a8] sm:text-4xl">Artikel & Informasi</h1>
      <p class="mt-2 text-sm text-slate-500">Panduan, tips, dan informasi terbaru seputar dunia kos.</p>
    </div>

    <!-- GRID ARTIKEL DINAMIS -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        
      @forelse($artikels as $item)
      <!-- CARD ARTIKEL -->
      <a href="{{ route('artikel.detail', $item->slug) }}" class="group flex flex-col rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:ring-[#6b21a8]/20">
        
        <!-- Gambar Thumbnail dengan Floating Badge -->
        <div class="relative h-56 w-full overflow-hidden rounded-t-2xl bg-slate-100">
          <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&h=600&fit=crop' }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
          
          <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/40 to-transparent"></div>
          
          <div class="absolute left-4 top-4 rounded-lg bg-white/95 px-3 py-1.5 text-[10px] font-bold uppercase tracking-widest text-[#6b21a8] shadow-sm backdrop-blur-sm">
            {{ $item->kategori }}
          </div>
        </div>

        <!-- Konten Card -->
        <div class="flex flex-1 flex-col p-6">
          <h3 class="font-display text-xl font-bold leading-snug text-[#6b21a8] transition-colors group-hover:text-[#eab308] line-clamp-2">
            {{ $item->judul }}
          </h3>
          
          <p class="mt-3 flex-1 text-sm leading-relaxed text-slate-500 line-clamp-3">
            {{ $item->deskripsi_singkat }}
          </p>

          <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-5">
            <div class="flex items-center gap-3">
              <div class="grid h-9 w-9 place-items-center rounded-full bg-purple-50 text-sm font-bold text-[#6b21a8] ring-1 ring-[#6b21a8]/10">
                {{ strtoupper(substr($item->penulis, 0, 2)) }}
              </div>
              <div>
                <div class="text-[13px] font-bold text-[#6b21a8]">{{ $item->penulis }}</div>
                <div class="text-[11px] font-medium text-slate-400">{{ $item->created_at->format('d M Y') }}</div>
              </div>
            </div>
            
            <span class="inline-flex items-center gap-1.5 text-sm font-bold text-[#6b21a8] transition-colors group-hover:text-[#eab308]">
              Baca 
              <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </span>
          </div>
        </div>
      </a>
      @empty
      <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
        <p class="text-sm text-slate-500">Belum ada artikel yang diterbitkan saat ini.</p>
      </div>
      @endforelse

    </div>
  </main>

  <x-footer />
</body>
</html>