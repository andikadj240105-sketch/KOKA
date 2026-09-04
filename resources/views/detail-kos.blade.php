<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kos - KOKA Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <!-- Container Utama -->
  <main class="mx-auto max-w-[1280px] px-4 pb-28 pt-6 sm:px-6 lg:pb-16">
    
    <!-- Tombol Kembali -->
    <a href="/cari-kos" class="mb-5 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#0b2046]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
      Kembali ke pencarian
    </a>

    <!-- Galeri Foto -->
    <div class="grid gap-3 sm:grid-cols-[2fr_1fr]">
      <!-- Gambar Utama -->
      <div class="overflow-hidden rounded-2xl bg-[#f8fafc]">
        <img id="mainImage" src="https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=1000&h=800&fit=crop" alt="Foto Kos" class="aspect-[16/11] w-full object-cover" />
      </div>
      <!-- Thumbnail -->
      <div class="grid grid-cols-4 gap-3 sm:grid-cols-2">
        <button onclick="changeImage(this, 'https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=1000&h=800&fit=crop')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-[#E5B044] transition">
          <img src="https://images.unsplash.com/photo-1522771731570-8682deb54f5c?w=400&h=300&fit=crop" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        <button onclick="changeImage(this, 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1000&h=800&fit=crop')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        <button onclick="changeImage(this, 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=1000&h=800&fit=crop')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=400&h=300&fit=crop" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
        <button onclick="changeImage(this, 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=1000&h=800&fit=crop')" class="thumbnail-btn overflow-hidden rounded-xl bg-[#f8fafc] ring-2 ring-transparent transition">
          <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?w=400&h=300&fit=crop" class="aspect-square w-full object-cover sm:aspect-[4/3]" />
        </button>
      </div>
    </div>

    <!-- Layout 2 Kolom (Kiri: Detail, Kanan: Sidebar Booking) -->
    <div class="mt-8 grid gap-10 lg:grid-cols-[1fr_360px]">
      
      <!-- KOLOM KIRI -->
      <div>
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="flex items-center gap-2">
              <span class="rounded-full bg-[#0b2046] px-2.5 py-1 text-[11px] font-semibold text-white">Campur</span>
              <span class="rounded-full bg-[#f8fafc] px-2.5 py-1 text-[11px] font-semibold text-[#0b2046]">Kos Premium</span>
            </div>
            <h1 class="mt-3 font-display text-2xl font-bold text-[#0b2046] sm:text-3xl">Wisma Kampus Hasanah</h1>
            <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-[#64748b]">
              <span class="flex items-center gap-1">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                Buah Batu, Bandung
              </span>
              <span class="flex items-center gap-1 font-semibold text-[#0b2046]">
                <svg class="h-4 w-4 fill-[#E5B044] text-[#E5B044]" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg> 
                4.8 <span class="font-normal text-[#64748b]">(124 ulasan)</span>
              </span>
            </div>
          </div>
          <div class="flex gap-2">
            <button class="grid h-10 w-10 place-items-center rounded-full border border-[#e2e8f0] text-[#0b2046] transition hover:bg-[#f8fafc]">
              <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" /></svg>
            </button>
            <button onclick="this.classList.toggle('fill-[#E5B044]'); this.classList.toggle('text-[#E5B044]')" class="grid h-10 w-10 place-items-center rounded-full border border-[#e2e8f0] text-[#0b2046] transition hover:bg-[#f8fafc]">
              <svg class="h-[18px] w-[18px] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
            </button>
          </div>
        </div>

        <!-- Section Deskripsi -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#0b2046]">Deskripsi</h2>
          <p class="text-sm leading-relaxed text-[#64748b]">
            Wisma Kampus Hasanah adalah hunian modern yang berlokasi strategis di Buah Batu, Bandung, hanya beberapa menit dari kampus. Dengan fasilitas lengkap dan lingkungan yang aman, tempat ini cocok untuk mahasiswa maupun profesional muda.
          </p>
        </section>

        <!-- Section Fasilitas -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#0b2046]">Fasilitas</h2>
          <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
            <!-- Render statis fasilitas -->
            <div class="flex items-center gap-2 text-sm text-[#1e293b]">
              <span class="grid h-5 w-5 place-items-center rounded-full bg-[#E5B044]/15 text-[#E5B044]"><svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg></span>
              Kamar Mandi Dalam
            </div>
            <div class="flex items-center gap-2 text-sm text-[#1e293b]">
              <span class="grid h-5 w-5 place-items-center rounded-full bg-[#E5B044]/15 text-[#E5B044]"><svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg></span>
              AC & WiFi Cepat
            </div>
            <div class="flex items-center gap-2 text-sm text-[#1e293b]">
              <span class="grid h-5 w-5 place-items-center rounded-full bg-[#E5B044]/15 text-[#E5B044]"><svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg></span>
              Kasur & Lemari
            </div>
          </div>
        </section>

        <!-- Section Tipe Kamar (Pilihan Interaktif) -->
        <section class="mt-8 border-t border-[#e2e8f0] pt-7">
          <h2 class="mb-4 font-display text-lg font-bold text-[#0b2046]">Tipe Kamar</h2>
          <div class="space-y-3">
            
            <!-- Tipe 1 -->
            <button onclick="selectRoom(0, 'Tipe Standard', '12.000.000')" class="room-btn flex w-full items-center justify-between rounded-2xl border border-[#0b2046] bg-[#f8fafc] p-4 text-left transition">
              <div>
                <div class="font-display text-sm font-semibold text-[#0b2046]">Tipe Standard</div>
                <div class="mt-0.5 text-xs text-[#64748b]">3 x 3 m · Sisa 4 kamar</div>
              </div>
              <div class="text-right">
                <div class="font-display text-sm font-bold text-[#0b2046]">Rp 12.000.000</div>
                <div class="text-[11px] text-[#64748b]">per tahun</div>
              </div>
            </button>

            <!-- Tipe 2 -->
            <button onclick="selectRoom(1, 'Tipe Deluxe', '15.000.000')" class="room-btn flex w-full items-center justify-between rounded-2xl border border-[#e2e8f0] bg-white hover:border-[#0b2046]/40 p-4 text-left transition">
              <div>
                <div class="font-display text-sm font-semibold text-[#0b2046]">Tipe Deluxe</div>
                <div class="mt-0.5 text-xs text-[#64748b]">3 x 4 m · Sisa 2 kamar</div>
              </div>
              <div class="text-right">
                <div class="font-display text-sm font-bold text-[#0b2046]">Rp 15.000.000</div>
                <div class="text-[11px] text-[#64748b]">per tahun</div>
              </div>
            </button>

          </div>
        </section>

      </div>

      <!-- KOLOM KANAN (Sidebar Booking Desktop) -->
      <aside class="hidden lg:block">
        <div class="sticky top-24 rounded-2xl border border-[#e2e8f0] bg-white p-6 shadow-[0_20px_50px_-30px_rgba(11,42,85,0.5)]">
          <div class="text-xs text-[#64748b]">Mulai dari</div>
          <div id="desktopPrice" class="font-display text-2xl font-extrabold text-[#0b2046]">Rp 12.000.000</div>
          <div class="text-xs text-[#64748b]">per tahun · <span id="desktopRoomName">Tipe Standard</span></div>
          
          <button class="mt-5 w-full rounded-xl bg-[#E5B044] px-4 py-3.5 text-sm font-bold text-[#0b2046] transition hover:opacity-90">
            Booking Sekarang
          </button>
          <button class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl border border-[#e2e8f0] bg-white px-4 py-3.5 text-sm font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
            Hubungi Pemilik
          </button>
          <p class="mt-4 text-center text-[11px] text-[#64748b]">Gratis biaya survei · Pembayaran aman via KOKA</p>
        </div>
      </aside>

    </div>

    <!-- Sticky Mobile CTA -->
    <div class="fixed inset-x-0 bottom-0 z-30 flex items-center gap-3 border-t border-[#e2e8f0] bg-white/95 px-4 py-3 backdrop-blur lg:hidden">
      <div class="flex-1">
        <div id="mobilePrice" class="font-display text-base font-bold text-[#0b2046]">Rp 12.000.000</div>
        <div class="text-[11px] text-[#64748b]">per tahun</div>
      </div>
      <button class="rounded-xl bg-[#E5B044] px-6 py-3 text-sm font-bold text-[#0b2046] transition hover:opacity-90">
        Booking
      </button>
    </div>

  </main>

  <x-footer />

  <!-- Logika Interaktif (Vanilla JS) -->
  <script>
    // 1. Fungsi Mengubah Gambar Galeri
    function changeImage(element, newSrc) {
        // Ganti gambar utama
        document.getElementById('mainImage').src = newSrc;
        
        // Reset semua garis tepi (ring) thumbnail
        const thumbs = document.querySelectorAll('.thumbnail-btn');
        thumbs.forEach(btn => {
            btn.classList.remove('ring-[#E5B044]');
            btn.classList.add('ring-transparent');
        });
        
        // Aktifkan garis tepi emas pada gambar yang diklik
        element.classList.remove('ring-transparent');
        element.classList.add('ring-[#E5B044]');
    }

    // 2. Fungsi Memilih Tipe Kamar
    function selectRoom(index, roomName, price) {
        // Reset warna kotak pilihan kamar
        const roomBtns = document.querySelectorAll('.room-btn');
        roomBtns.forEach((btn, i) => {
            if(i === index) {
                // Yang dipilih: Border biru gelap, Background kebiruan
                btn.classList.remove('border-[#e2e8f0]', 'bg-white');
                btn.classList.add('border-[#0b2046]', 'bg-[#f8fafc]');
            } else {
                // Yang tidak dipilih: Kembali ke putih polos
                btn.classList.remove('border-[#0b2046]', 'bg-[#f8fafc]');
                btn.classList.add('border-[#e2e8f0]', 'bg-white');
            }
        });

        // Update harga dan nama kamar di Panel Kanan (Desktop)
        document.getElementById('desktopPrice').innerText = `Rp ${price}`;
        document.getElementById('desktopRoomName').innerText = roomName;

        // Update harga di Bar Bawah (Mobile)
        document.getElementById('mobilePrice').innerText = `Rp ${price}`;
    }
  </script>

</body>
</html>