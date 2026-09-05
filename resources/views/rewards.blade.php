<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Rewards - KOKA Property</title>
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
      <h1 class="font-display text-[24px] font-bold text-[#0b2046] sm:text-[32px]">KOKA Rewards</h1>
      <p class="mt-1 text-[14px] text-[#64748b]">Tukarkan poinmu dengan hadiah menarik.</p>
    </div>

    <!-- BANNER POIN -->
    <div class="mb-8 overflow-hidden rounded-[24px] bg-gradient-to-br from-[#0b2046] to-[#071530] p-7 text-white shadow-sm">
        <div class="flex items-center gap-2 text-[14px] text-white/70">
            <svg class="h-5 w-5 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>
            Total Poin Kamu
        </div>
        <div class="mt-2 font-display text-[36px] font-extrabold text-[#E5B044]">2.450 pts</div>
        <p class="mt-1 text-[14px] text-white/60">Kumpulkan poin dari setiap transaksi & layanan.</p>
    </div>

    <!-- DAFTAR HADIAH -->
    <h3 class="mb-4 font-display text-[18px] font-bold text-[#0b2046]">Hadiah Tersedia</h3>
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        
        <!-- Item 1 -->
        <div class="flex flex-col rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="grid h-12 w-12 place-items-center rounded-[14px] bg-[#f8fafc] text-[#0b2046]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
            </div>
            <h4 class="mt-4 flex-1 font-display text-[14px] font-semibold text-[#0b2046]">Voucher Laundry Gratis</h4>
            <div class="mt-2 text-[14px] font-bold text-[#E5B044]">500 pts</div>
            <button onclick="openRewardModal('Voucher Laundry Gratis', 500)" class="mt-4 w-full rounded-full bg-[#0b2046] px-4 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
                Tukar Reward
            </button>
        </div>

        <!-- Item 2 -->
        <div class="flex flex-col rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="grid h-12 w-12 place-items-center rounded-[14px] bg-[#f8fafc] text-[#0b2046]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
            </div>
            <h4 class="mt-4 flex-1 font-display text-[14px] font-semibold text-[#0b2046]">Diskon Sewa Rp250.000</h4>
            <div class="mt-2 text-[14px] font-bold text-[#E5B044]">1200 pts</div>
            <button onclick="openRewardModal('Diskon Sewa Rp250.000', 1200)" class="mt-4 w-full rounded-full bg-[#0b2046] px-4 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
                Tukar Reward
            </button>
        </div>

        <!-- Item 3 -->
        <div class="flex flex-col rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="grid h-12 w-12 place-items-center rounded-[14px] bg-[#f8fafc] text-[#0b2046]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
            </div>
            <h4 class="mt-4 flex-1 font-display text-[14px] font-semibold text-[#0b2046]">Gratis KosanClean 1x</h4>
            <div class="mt-2 text-[14px] font-bold text-[#E5B044]">800 pts</div>
            <button onclick="openRewardModal('Gratis KosanClean 1x', 800)" class="mt-4 w-full rounded-full bg-[#0b2046] px-4 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
                Tukar Reward
            </button>
        </div>

        <!-- Item 4 -->
        <div class="flex flex-col rounded-[20px] border border-[#e2e8f0] bg-white p-5 shadow-sm transition hover:shadow-md">
            <div class="grid h-12 w-12 place-items-center rounded-[14px] bg-[#f8fafc] text-[#0b2046]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>
            </div>
            <h4 class="mt-4 flex-1 font-display text-[14px] font-semibold text-[#0b2046]">Voucher KosanMart Rp100.000</h4>
            <div class="mt-2 text-[14px] font-bold text-[#E5B044]">600 pts</div>
            <button onclick="openRewardModal('Voucher KosanMart Rp100.000', 600)" class="mt-4 w-full rounded-full bg-[#0b2046] px-4 py-2.5 text-[14px] font-bold text-white transition hover:bg-[#071530]">
                Tukar Reward
            </button>
        </div>

    </div>
  </main>

  <!-- ================= MODAL TUKAR REWARD ================= -->
  <div id="rewardModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
    
    <!-- Latar Belakang Gelap -->
    <div class="absolute inset-0 bg-[#0b2046]/50 backdrop-blur-sm" onclick="closeRewardModal()"></div>
    
    <!-- Kotak Modal -->
    <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-sm flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
      
      <!-- Header Modal -->
      <div class="flex items-start justify-between gap-4 border-b border-[#e2e8f0] px-6 py-5">
        <h3 class="font-display text-[18px] font-bold text-[#0b2046]">Tukar Reward</h3>
        <button onclick="closeRewardModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Isi Modal -->
      <div class="flex flex-col items-center px-6 py-7 text-center">
        <!-- Ikon Kado -->
        <div class="grid h-16 w-16 place-items-center rounded-full bg-[#0b2046] text-[#E5B044]">
          <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>
        </div>
        
        <!-- Judul Dinamis -->
        <h4 id="rewardModalTitle" class="mt-4 font-display text-[16px] font-bold text-[#0b2046]">Judul Reward</h4>
        
        <p class="mt-1 text-[14px] text-[#64748b]">
          Tukar dengan <span id="rewardModalPoints" class="font-bold text-[#E5B044]">0</span> poin kamu?
        </p>
        
        <!-- Tombol Aksi -->
        <div class="mt-6 grid w-full gap-3 sm:grid-cols-2">
          <button onclick="closeRewardModal()" class="rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-[14px] font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">
            Batal
          </button>
          <button onclick="applyReward()" class="rounded-xl bg-[#0b2046] px-4 py-3 text-[14px] font-bold text-white transition hover:bg-[#071530]">
            Tukar Sekarang
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TOAST NOTIFICATION (DI ATAS) ================= -->
  <div id="toastNotification" class="fixed top-8 left-1/2 z-[100] flex -translate-x-1/2 -translate-y-10 items-center gap-3 rounded-full bg-[#0b2046] px-5 py-3 text-white opacity-0 shadow-lg transition-all duration-300 pointer-events-none">
    <div class="grid h-6 w-6 place-items-center rounded-full bg-[#E5B044] text-[#0b2046]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
    </div>
    <span id="toastMessage" class="text-[14px] font-medium tracking-wide">Pesan berhasil</span>
  </div>

  <x-footer />

  <script>
    // --- LOGIKA MODAL REWARD ---
    function openRewardModal(title, points) {
        // Ubah teks judul dan poin di dalam modal sesuai tombol yang diklik
        document.getElementById('rewardModalTitle').innerText = title;
        document.getElementById('rewardModalPoints').innerText = points;
        
        // Tampilkan modal
        const modal = document.getElementById('rewardModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeRewardModal() {
        const modal = document.getElementById('rewardModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // --- LOGIKA TOAST NOTIFICATION ---
    let toastTimeout; 

    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        const toastMsg = document.getElementById('toastMessage');
        
        toastMsg.innerText = message;
        toast.classList.remove('-translate-y-10', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toast.classList.add('-translate-y-10', 'opacity-0');
        }, 3000);
    }

    // --- AKSI TUKAR SEKARANG ---
    function applyReward() {
        closeRewardModal();
        showToast('Reward berhasil ditukar!'); 
    }
  </script>
</body>
</html>