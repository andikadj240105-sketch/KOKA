<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo & Voucher - KOKA Property</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <!-- Komponen Header -->
  <x-navbar />

  <main class="mx-auto max-w-[1280px] px-4 py-8 sm:px-6">
    
    <!-- HEADER HALAMAN -->
    <div class="mb-6">
      <a href="javascript:history.back()" class="mb-4 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#0b2046]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
      </a>
      <h1 class="font-display text-[24px] font-bold text-[#0b2046] sm:text-[32px]">Promo & Voucher</h1>
      <p class="mt-1 text-[14px] text-[#64748b]">Manfaatkan promo menarik untuk hidup lebih hemat.</p>
    </div>

    <!-- GRID PROMO -->
    <div class="grid gap-5 sm:grid-cols-2">
        
      <!-- CARD 1: Diskon 20% (NAVY) -->
      <div class="overflow-hidden rounded-[24px] bg-gradient-to-br from-[#0b2046] to-[#071530] p-6 text-white shadow-sm">
        <div class="flex items-start justify-between">
          <svg class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold tracking-wide">
            KOKA20
          </span>
        </div>
        <h3 class="mt-5 font-display text-[18px] font-bold text-white">Diskon 20% Sewa Pertama</h3>
        <p class="mt-1 text-[14px] text-white/70">Untuk penghuni baru semua tipe kos.</p>
        <button onclick="openPromoModal('Diskon 20% Sewa Pertama')" class="mt-6 rounded-full bg-[#E5B044] px-6 py-2.5 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#F1C86D]">
          Gunakan Promo
        </button>
      </div>

      <!-- CARD 2: Gratis Laundry (GOLD) -->
      <div class="overflow-hidden rounded-[24px] bg-gradient-to-br from-[#E5B044] to-[#F1C86D] p-6 text-white shadow-sm">
        <div class="flex items-start justify-between">
          <svg class="h-8 w-8 opacity-80 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
          <span class="rounded-full bg-white/30 px-3 py-1.5 text-[12px] font-semibold tracking-wide text-[#0b2046]">
            LAUNDRYFREE
          </span>
        </div>
        <h3 class="mt-5 font-display text-[18px] font-bold text-[#0b2046]">Gratis Laundry 5kg</h3>
        <p class="mt-1 text-[14px] text-[#0b2046]/80">Setiap booking kos minimal 1 tahun.</p>
        <button onclick="openPromoModal('Gratis Laundry 5kg')" class="mt-6 rounded-full bg-[#0b2046] px-6 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
          Gunakan Promo
        </button>
      </div>

      <!-- CARD 3: Cashback KosanClean (NAVY) -->
      <div class="overflow-hidden rounded-[24px] bg-gradient-to-br from-[#0b2046] to-[#071530] p-6 text-white shadow-sm">
        <div class="flex items-start justify-between">
          <svg class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
          <span class="rounded-full bg-white/20 px-3 py-1.5 text-[12px] font-semibold tracking-wide">
            CLEAN15
          </span>
        </div>
        <h3 class="mt-5 font-display text-[18px] font-bold text-white">Cashback KosanClean</h3>
        <p class="mt-1 text-[14px] text-white/70">Cashback 15% untuk layanan cleaning.</p>
        <button onclick="openPromoModal('Cashback KosanClean')" class="mt-6 rounded-full bg-[#E5B044] px-6 py-2.5 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#F1C86D]">
          Gunakan Promo
        </button>
      </div>

      <!-- CARD 4: Ongkir KosanJek Rp0 (GOLD) -->
      <div class="overflow-hidden rounded-[24px] bg-gradient-to-br from-[#E5B044] to-[#F1C86D] p-6 text-white shadow-sm">
        <div class="flex items-start justify-between">
          <svg class="h-8 w-8 opacity-80 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
          <span class="rounded-full bg-white/30 px-3 py-1.5 text-[12px] font-semibold tracking-wide text-[#0b2046]">
            JEKGRATIS
          </span>
        </div>
        <h3 class="mt-5 font-display text-[18px] font-bold text-[#0b2046]">Ongkir KosanJek Rp0</h3>
        <p class="mt-1 text-[14px] text-[#0b2046]/80">Antar-jemput gratis area kampus.</p>
        <button onclick="openPromoModal('Ongkir KosanJek Rp0')" class="mt-6 rounded-full bg-[#0b2046] px-6 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
          Gunakan Promo
        </button>
      </div>

    </div>
  </main>

  <!-- ================= MODAL GUNAKAN PROMO ================= -->
  <div id="promoModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
    
    <!-- Latar Belakang Gelap -->
    <div class="absolute inset-0 bg-[#0b2046]/50 backdrop-blur-sm" onclick="closePromoModal()"></div>
    
    <!-- Kotak Modal -->
    <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-sm flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
      
      <!-- Header Modal -->
      <div class="flex items-start justify-between gap-4 border-b border-[#e2e8f0] px-6 py-5">
        <h3 class="font-display text-[18px] font-bold text-[#0b2046]">Gunakan Promo</h3>
        <button onclick="closePromoModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Isi Modal -->
      <div class="flex flex-col items-center px-6 py-7 text-center">
        <!-- Ikon Tiket -->
        <div class="grid h-16 w-16 place-items-center rounded-full bg-[#E5B044]/15">
          <svg class="h-8 w-8 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
        </div>
        
        <!-- Judul Dinamis -->
        <h4 id="promoModalTitle" class="mt-4 font-display text-[16px] font-bold text-[#0b2046]">Judul Promo</h4>
        
        <p class="mt-1 text-[14px] text-[#64748b]">
          Promo ini akan diterapkan pada transaksi berikutnya. Lanjutkan?
        </p>
        
        <!-- Tombol Aksi -->
        <div class="mt-6 grid w-full gap-3 sm:grid-cols-2">
          <button onclick="closePromoModal()" class="rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">
            Batal
          </button>
          <button onclick="applyPromo()" class="rounded-xl bg-[#E5B044] px-4 py-3 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#F1C86D]">
            Gunakan Sekarang
          </button>
        </div>
      </div>
    </div>
  </div>

 <!-- ================= TOAST NOTIFICATION (DI ATAS) ================= -->
  <!-- Posisi awal tersembunyi di atas (-translate-y-10) -->
  <div id="toastNotification" class="fixed top-8 left-1/2 z-[100] flex -translate-x-1/2 -translate-y-10 items-center gap-3 rounded-full bg-[#0b2046] px-5 py-3 text-white opacity-0 shadow-lg transition-all duration-300 pointer-events-none">
    <div class="grid h-6 w-6 place-items-center rounded-full bg-[#E5B044] text-[#0b2046]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
    </div>
    <span id="toastMessage" class="text-[14px] font-medium tracking-wide">Pesan berhasil</span>
  </div>

  <x-footer />

  <script>
    // --- LOGIKA MODAL PROMO ---
    function openPromoModal(title) {
        document.getElementById('promoModalTitle').innerText = title;
        const modal = document.getElementById('promoModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closePromoModal() {
        const modal = document.getElementById('promoModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // --- LOGIKA TOAST NOTIFICATION ---
    let toastTimeout; 

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        const toastMsg = document.getElementById('toastMessage');
        
        toastMsg.innerText = message;
        
        // Hapus efek sembunyi (tanda minus ditambahkan pada translate-y)
        toast.classList.remove('-translate-y-10', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            // Kembalikan efek sembunyi ke atas
            toast.classList.add('-translate-y-10', 'opacity-0');
        }, 3000);
    }

    // --- AKSI GUNAKAN PROMO ---
    function applyPromo() {
        closePromoModal();
        showToast('Promo berhasil digunakan!'); 
    }
  </script>
</body>
</html>