<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kos Favorit Saya - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6 lg:py-10">
    <div class="mb-6">
      <a href="/akun" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#522b89]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Akun
      </a>
      <h1 class="font-display text-2xl font-extrabold text-[#522b89] sm:text-3xl">Kos Favorit Saya</h1>
      <p class="mt-1 text-sm text-[#64748b]">Daftar kos yang telah kamu simpan.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
      @forelse($favorites as $fav)
        @php $kos = $fav->kos; @endphp
        @if($kos)
          <a href="/detail-kos/{{ $kos->id }}" class="block group relative overflow-hidden rounded-[20px] border border-[#e2e8f0] bg-white shadow-sm transition hover:shadow-lg cursor-pointer">
            <div class="relative h-[200px] w-full overflow-hidden bg-gray-100">
                <img src="{{ $kos->foto_utama ? asset('storage/' . str_replace('\\', '/', $kos->foto_utama)) : 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop&auto=format' }}" alt="{{ $kos->nama }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <span class="absolute left-3 top-3 z-10 rounded-full bg-[#522b89] px-3 py-1.5 text-[11px] font-semibold text-white">{{ $kos->tipe }}</span>
            </div>
            <div class="p-5">
              <div class="flex items-start justify-between gap-2">
                <h3 class="font-display text-[15px] font-bold text-[#522b89] line-clamp-1">{{ $kos->nama }}</h3>
                <div class="flex shrink-0 items-center gap-1 text-[13px] font-bold text-[#64748b]">
                  <span class="text-[#F39C12] text-[14px]">★</span> {{ $kos->rating ?? '4.5' }}
                </div>
              </div>
              <div class="mt-1.5 flex items-center gap-1.5 text-[12px] text-[#64748b]">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                {{ $kos->lokasi }}
              </div>
              <div class="mt-6 flex flex-col border-t border-[#e2e8f0] pt-4">
                <span class="font-display text-[16px] font-extrabold text-[#522b89]">Rp {{ number_format($kos->harga, 0, ',', '.') }}</span>
                <span class="mt-0.5 text-[11px] text-[#64748b]">per tahun</span>
              </div>
            </div>
          </a>
        @endif
      @empty
        <div class="col-span-full rounded-2xl border border-dashed border-[#e2e8f0] bg-slate-50 p-12 text-center">
          <p class="text-sm font-medium text-[#64748b]">Kamu belum memiliki kos favorit.</p>
        </div>
      @endforelse
    </div>
  </main>

</body>
</html>