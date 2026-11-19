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
<body class="bg-white font-sans text-[#1e293b] antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <!-- Konten Utama Tentang Kami -->
  <main class="mx-auto max-w-[1000px] px-6 py-10 sm:py-16 min-h-[70vh]">
    
    <!-- Bagian Kepala (PageHead) -->
    <div class="mb-8">
      <a href="/" class="mb-5 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#522b89]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg> 
        Kembali
      </a>
      <h1 class="font-display text-[28px] lg:text-[36px] font-bold text-[#522b89]">Tentang KOKA</h1>
      <p class="mt-1.5 text-[14px] sm:text-[16px] text-[#64748b]">Property Management & Student Living Company</p>
    </div>

    <!-- Banner Utama -->
    <div class="relative overflow-hidden rounded-[24px] bg-gradient-to-br from-[#522b89] via-[#3f1d6e] to-[#2d144f] p-8 sm:p-12 text-white shadow-xl">
      <!-- Dekorasi Cahaya -->
      <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-[#F39C12]/20 blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>

      <div class="relative z-10">
        <h2 class="font-display text-[24px] sm:text-[32px] font-bold leading-tight">Membuat hidup anak kos & pengelolaan properti lebih mudah</h2>
        <p class="mt-4 max-w-2xl text-[14px] sm:text-[15px] leading-relaxed text-white/80">
          KOKA Property Indonesia (Kosan Kampus) adalah platform hunian, manajemen pengelolaan kos, dan <em>student living</em> yang menghubungkan pelajar serta profesional muda dengan kos terkelola terbaik, sekaligus menghadirkan layanan pendukung terpadu — dari laundry hingga pindahan — dalam satu ekosistem yang praktis dan aman.
        </p>
      </div>
    </div>

    <!-- Statistik Perusahaan -->
    <div class="mt-6 grid grid-cols-3 gap-3 sm:gap-6 text-center">
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 sm:p-8 shadow-sm transition hover:shadow-md hover:border-[#522b89]/30">
        <div class="font-display text-[24px] sm:text-[36px] font-extrabold text-[#522b89]">1000+</div>
        <div class="mt-1 sm:mt-2 text-[11px] sm:text-[14px] font-medium text-[#64748b]">Pilihan & Kos Terkelola</div>
      </div>
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 sm:p-8 shadow-sm transition hover:shadow-md hover:border-[#522b89]/30">
        <div class="font-display text-[24px] sm:text-[36px] font-extrabold text-[#522b89]">12.4K</div>
        <div class="mt-1 sm:mt-2 text-[11px] sm:text-[14px] font-medium text-[#64748b]">Penghuni Aktif</div>
      </div>
      <div class="rounded-[20px] border border-[#e2e8f0] bg-white p-5 sm:p-8 shadow-sm transition hover:shadow-md hover:border-[#522b89]/30">
        <div class="font-display text-[24px] sm:text-[36px] font-extrabold text-[#522b89]">5</div>
        <div class="mt-1 sm:mt-2 text-[11px] sm:text-[14px] font-medium text-[#64748b]">Kota Tersebar</div>
      </div>
    </div>

    <!-- KOMPONEN BARU: Pengelolaan Kos oleh Kosan Kampus -->
    <div class="mt-16 border-t border-[#e2e8f0] pt-12">
      <div class="text-center mb-10">
        <span class="inline-flex items-center gap-1.5 rounded-full bg-[#522b89]/10 px-3.5 py-1 text-[12px] font-semibold text-[#522b89] mb-3">
          KOKA Property Management
        </span>
        <h2 class="font-display text-[24px] sm:text-[28px] font-bold text-[#522b89]">Pengelolaan Kos Profesional oleh Kosan Kampus</h2>
        <p class="mt-2 max-w-2xl mx-auto text-[14px] text-[#64748b]">
          Selain sebagai platform pencarian hunian, Kosan Kampus hadir sebagai mitra manajemen operasional kos secara menyeluruh untuk menjamin standar kenyamanan bagi penghuni dan optimalisasi pendapatan bagi pemilik properti.
        </p>
      </div>

      <div class="grid gap-6 sm:grid-cols-2">
        <!-- Untuk Pemilik Kos -->
        <div class="rounded-[24px] border border-[#e2e8f0] bg-white p-8 shadow-sm transition hover:border-[#522b89]/30 hover:shadow-md">
          <div class="flex items-center gap-3.5 mb-5">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#522b89] text-[#F39C12] shadow-sm">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
            </div>
            <div>
              <span class="text-[11px] font-bold uppercase tracking-wider text-[#F39C12]">Mitra Juragan Kos</span>
              <h3 class="font-display text-[19px] font-bold text-[#522b89]">Manajemen Operasional End-to-End</h3>
            </div>
          </div>
          <p class="text-[14px] leading-relaxed text-[#64748b] mb-4">
            Pemilik kos tidak perlu repot mengurus operasional harian. Tim Kosan Kampus menangani pengelolaan aset properti secara profesional dan transparan:
          </p>
          <ul class="space-y-2.5 text-[13.5px] text-[#475569]">
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#522b89]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Pemasaran & Okupansi Tinggi:</strong> Promosi terarah ke ribuan mahasiswa di sekitar kampus.</span>
            </li>
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#522b89]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Penagihan & Laporan Keuangan Otomatis:</strong> Sistem pembayaran sewa digital dan laporan bulanan yang rapi.</span>
            </li>
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#522b89]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Perawatan & Kebersihan Berkala:</strong> Penanganan komplain fasilitas, kebersihan area umum, hingga keamanan properti.</span>
            </li>
          </ul>
        </div>

        <!-- Untuk Penghuni Kos -->
        <div class="rounded-[24px] border border-[#e2e8f0] bg-white p-8 shadow-sm transition hover:border-[#F39C12]/50 hover:shadow-md">
          <div class="flex items-center gap-3.5 mb-5">
            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#F39C12] text-[#522b89] shadow-sm">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <span class="text-[11px] font-bold uppercase tracking-wider text-[#522b89]">KOKA Managed Kos</span>
              <h3 class="font-display text-[19px] font-bold text-[#522b89]">Standar Kenyamanan Terjamin</h3>
            </div>
          </div>
          <p class="text-[14px] leading-relaxed text-[#64748b] mb-4">
            Kos yang dikelola langsung oleh Kosan Kampus memiliki standar pelayanan terkurasi agar penghuni merasa aman dan betah layaknya di rumah sendiri:
          </p>
          <ul class="space-y-2.5 text-[13.5px] text-[#475569]">
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Fasilitas Terawat & Siap Huni:</strong> Pengecekan rutin Wi-Fi, kelistrikan, air, dan kebersihan kamar sebelum serah terima.</span>
            </li>
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Respon Cepat Tim Lapangan:</strong> Bantuan teknis langsung tanpa harus menunggu lama jika terjadi kendala di kamar.</span>
            </li>
            <li class="flex items-start gap-2.5">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span><strong>Terintegrasi Layanan Harian:</strong> Akses mudah ke layanan laundry, angkut barang, dan kebutuhan mahasiswa lainnya.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Visi & Misi -->
    <div class="mt-16 border-t border-[#e2e8f0] pt-12">
      <div class="text-center mb-10">
        <h2 class="font-display text-[24px] sm:text-[28px] font-bold text-[#522b89]">Visi & Misi Kami</h2>
        <p class="mt-2 text-[14px] text-[#64748b]">Tujuan besar yang menggerakkan setiap langkah KOKA Property.</p>
      </div>

      <div class="grid gap-6 sm:grid-cols-2">
        <!-- Visi -->
        <div class="rounded-[24px] bg-[#f8fafc] p-8 border border-[#e2e8f0]">
          <div class="grid h-12 w-12 place-items-center rounded-full bg-[#522b89] text-[#F39C12] mb-5 shadow-md">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
          </div>
          <h3 class="font-display text-[20px] font-bold text-[#522b89]">Visi</h3>
          <p class="mt-3 text-[14px] leading-relaxed text-[#64748b]">
            Menjadi platform <span class="font-semibold text-[#522b89]">Student Living & Manajemen Kos #1 di Indonesia</span> yang mewujudkan ekosistem hunian modern, terkelola profesional, dan menjadi rumah kedua yang paling nyaman bagi setiap pelajar maupun pekerja.
          </p>
        </div>

        <!-- Misi -->
        <div class="rounded-[24px] bg-[#f8fafc] p-8 border border-[#e2e8f0]">
          <div class="grid h-12 w-12 place-items-center rounded-full bg-[#F39C12] text-[#522b89] mb-5 shadow-md">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
          </div>
          <h3 class="font-display text-[20px] font-bold text-[#522b89]">Misi</h3>
          <ul class="mt-3 space-y-2 text-[14px] text-[#64748b]">
            <li class="flex items-start gap-2">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span>Menyediakan pilihan hunian terkurasi serta pengelolaan kos profesional dengan standar kualitas tinggi.</span>
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span>Memberikan kemudahan layanan harian (KosanJek, KosanMove, Laundry, dll) dalam satu platform.</span>
            </li>
            <li class="flex items-start gap-2">
              <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              <span>Memberikan dukungan pelanggan dan pemilik kos (KOKA Care) yang responsif dan selalu siap membantu.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Nilai Utama (Core Values) -->
    <div class="mt-16">
      <div class="text-center mb-10">
        <h2 class="font-display text-[24px] sm:text-[28px] font-bold text-[#522b89]">Nilai-Nilai Kami</h2>
      </div>

      <div class="grid gap-6 sm:grid-cols-3">
        <div class="flex flex-col items-center text-center p-4">
          <div class="mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-[#522b89]/5 text-[#522b89]">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
          </div>
          <h4 class="font-display text-[16px] font-bold text-[#522b89]">Integritas & Kepercayaan</h4>
          <p class="mt-2 text-[13px] text-[#64748b]">Informasi yang jujur, pengelolaan properti yang transparan, serta transaksi yang 100% dijamin aman.</p>
        </div>
        
        <div class="flex flex-col items-center text-center p-4">
          <div class="mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-[#522b89]/5 text-[#522b89]">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
          </div>
          <h4 class="font-display text-[16px] font-bold text-[#522b89]">Inovasi Digital</h4>
          <p class="mt-2 text-[13px] text-[#64748b]">Terus menghadirkan teknologi manajemen kos dan fitur layanan yang mempermudah rutinitas penghuni maupun pemilik.</p>
        </div>

        <div class="flex flex-col items-center text-center p-4">
          <div class="mb-4 grid h-14 w-14 place-items-center rounded-2xl bg-[#522b89]/5 text-[#522b89]">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
          </div>
          <h4 class="font-display text-[16px] font-bold text-[#522b89]">Pelayanan Penuh Hati</h4>
          <p class="mt-2 text-[13px] text-[#64748b]">Kami merawat setiap properti dan melayani setiap penghuni dengan kepedulian seperti keluarga sendiri.</p>
        </div>
      </div>
    </div>

    <!-- CTA / Tombol Aksi Bawah -->
    <div class="mt-16 flex flex-col items-center justify-center rounded-[24px] bg-[#f8fafc] px-6 py-12 text-center border border-[#e2e8f0]">
      <h2 class="font-display text-[22px] sm:text-[26px] font-bold text-[#522b89]">Jadilah bagian dari Ekosistem KOKA</h2>
      <p class="mt-3 max-w-xl text-[14px] text-[#64748b]">
        Mulai temukan kos terkelola impianmu sekarang, atau titipkan pengelolaan properti kos Anda bersama Kosan Kampus.
      </p>
      
      <div class="mt-8 flex flex-col w-full sm:w-auto sm:flex-row gap-3 sm:gap-4">
        <a href="/cari-kos" class="inline-flex h-[50px] items-center justify-center rounded-full bg-[#F39C12] px-8 text-[14px] font-bold text-[#522b89] transition hover:bg-[#F5B041] shadow-md">
          Cari Kos Sekarang
        </a>
        <a href="https://wa.me/6282116530496?text=Halo%20KOKA%20Care,%20saya%20tertarik%20bekerja%20sama%20untuk%20pengelolaan%20kos" target="_blank" class="inline-flex h-[50px] items-center justify-center rounded-full border-2 border-[#522b89] bg-white px-8 text-[14px] font-bold text-[#522b89] transition hover:bg-[#522b89] hover:text-white shadow-sm">
          Titip Kelola Kos / Hubungi Kami
        </a>
      </div>
    </div>

  </main>

  <x-footer />

</body>
</html>