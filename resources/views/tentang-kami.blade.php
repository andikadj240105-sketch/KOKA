<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Property - Tentang Kami</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <!-- Konten Utama Tentang Kami -->
  <main class="mx-auto max-w-3xl px-6 py-10 sm:py-16 min-h-[70vh]">
    
    <!-- Bagian Kepala (PageHead) -->
    <div class="mb-8">
      <a href="/" class="mb-5 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#0b2046]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg> 
        Kembali
      </a>
      <h1 class="font-display text-[28px] lg:text-[32px] font-bold text-[#0b2046]">Tentang KOKA</h1>
      <p class="mt-1.5 text-[14px] text-[#64748b]">Property & Student Living Company</p>
    </div>

    <!-- Banner Visi/Misi -->
    <div class="overflow-hidden rounded-[24px] bg-gradient-to-br from-[#0b2046] to-[#0f2a59] p-8 sm:p-10 text-white shadow-md">
      <h2 class="font-display text-[24px] font-bold leading-tight">Membuat hidup anak kos lebih mudah</h2>
      <p class="mt-4 text-[14px] leading-relaxed text-white/70">
        KOKA Property Indonesia adalah platform hunian & student living yang menghubungkan
        pelajar dan profesional muda dengan kos terbaik, sekaligus menghadirkan layanan
        pendukung — dari laundry hingga pindahan — dalam satu aplikasi.
      </p>
    </div>

    <!-- Statistik Perusahaan -->
    <div class="mt-6 grid grid-cols-3 gap-4 text-center">
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm">
        <div class="font-display text-[24px] sm:text-[28px] font-extrabold text-[#0b2046]">1000+</div>
        <div class="mt-1 text-[12px] font-medium text-[#64748b]">Pilihan Kos</div>
      </div>
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm">
        <div class="font-display text-[24px] sm:text-[28px] font-extrabold text-[#0b2046]">12.400+</div>
        <div class="mt-1 text-[12px] font-medium text-[#64748b]">Penghuni</div>
      </div>
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm">
        <div class="font-display text-[24px] sm:text-[28px] font-extrabold text-[#0b2046]">5</div>
        <div class="mt-1 text-[12px] font-medium text-[#64748b]">Kota</div>
      </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8 flex flex-wrap gap-3">
      <a href="/cari-kos" class="inline-flex h-[52px] items-center justify-center rounded-full bg-[#0b2046] px-7 text-[14px] font-semibold text-white transition hover:opacity-90 shadow-sm">
        Cari Kos Sekarang
      </a>
      <a href="/layanan" class="inline-flex h-[52px] items-center justify-center rounded-full border border-[#e2e8f0] bg-white px-7 text-[14px] font-semibold text-[#0b2046] transition hover:bg-[#f8fafc] shadow-sm">
        Hubungi Kami
      </a>
    </div>

  </main>

  <x-footer />

</body>
</html>