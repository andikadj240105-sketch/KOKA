<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - KOKA Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <!-- LAYAR 1: ALUR CHECKOUT (Metode, QR, & Processing) -->
  <main id="checkoutFlow" class="mx-auto max-w-4xl px-4 py-8 sm:px-6">
    <button onclick="window.history.back()" class="mb-5 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#0b2046]">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
      Kembali
    </button>
    
    <h1 class="font-display text-2xl font-bold text-[#0b2046] sm:text-3xl">Pembayaran Layanan</h1>
    <p class="mt-1 text-sm text-[#64748b]">Selesaikan pembayaran untuk <span id="displayTitle">KosanJek</span>.</p>

    <div class="mt-7 grid gap-6 lg:grid-cols-[1fr_360px]">
      
      <!-- KOLOM KIRI: Interaksi Pembayaran -->
      <div>
        
        <!-- STAGE: METHOD SELECTION -->
        <div id="stage-method" class="space-y-3">
          <h3 class="font-display text-sm font-semibold text-[#0b2046]">Pilih Metode Pembayaran</h3>
          
          <!-- Tombol QRIS -->
          <button onclick="selectMethod('QRIS', this)" class="method-btn flex w-full items-center gap-4 rounded-2xl border border-[#0b2046] bg-[#f8fafc] p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044]">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
            </div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#0b2046]">QRIS</div>
              <div class="text-xs text-[#64748b]">Scan pakai aplikasi apa pun</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#E5B044] bg-[#E5B044]"></span>
          </button>

          <!-- Tombol Transfer Bank -->
          <button onclick="selectMethod('BANK', this)" class="method-btn flex w-full items-center gap-4 rounded-2xl border border-[#e2e8f0] bg-white hover:border-[#0b2046]/40 p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044]">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#0b2046]">Transfer Bank</div>
              <div class="text-xs text-[#64748b]">BCA, Mandiri, BNI, BRI</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#e2e8f0]"></span>
          </button>

          <!-- Tombol E-Wallet -->
          <button onclick="selectMethod('EWALLET', this)" class="method-btn flex w-full items-center gap-4 rounded-2xl border border-[#e2e8f0] bg-white hover:border-[#0b2046]/40 p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044]">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#0b2046]">E-Wallet</div>
              <div class="text-xs text-[#64748b]">GoPay, OVO, DANA, ShopeePay</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#e2e8f0]"></span>
          </button>

          <button onclick="proceedToPayment()" class="mt-3 w-full rounded-xl bg-[#E5B044] px-4 py-3.5 text-sm font-bold text-[#0b2046] transition hover:opacity-90">
            Bayar Sekarang · <span class="totalPriceDisplay">Rp 30.000</span>
          </button>
        </div>

        <!-- STAGE: QR CODE -->
        <div id="stage-qr" class="hidden flex flex-col items-center rounded-2xl border border-[#e2e8f0] bg-white p-8 text-center">
          <div class="flex items-center gap-2 rounded-full bg-[#f8fafc] px-3 py-1 text-xs font-semibold text-[#0b2046]">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            QRIS
          </div>
          <!-- Fake QR Code Image Placeholder -->
          <div class="mt-5 rounded-xl border-4 border-white bg-white shadow overflow-hidden">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=KOKAPAYMENT&color=0b2046" alt="QR Code" class="h-[200px] w-[200px]" />
          </div>
          <p class="mt-5 font-display text-sm font-semibold text-[#0b2046]">Scan QR untuk melakukan pembayaran</p>
          <div class="mt-2 flex items-center gap-1.5 text-sm text-[#E5B044]">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span id="countdownText" class="font-semibold tabular-nums">15:00</span>
            <span class="text-[#64748b]">· QR berlaku selama 15 menit</span>
          </div>
          <div class="mt-4 font-display text-lg font-bold text-[#0b2046] totalPriceDisplay">Rp 30.000</div>
          
          <button onclick="simulateProcessing()" class="mt-5 w-full rounded-xl bg-[#0b2046] px-4 py-3.5 text-sm font-bold text-white transition hover:opacity-90">
            Saya Sudah Membayar
          </button>
          <button onclick="showStage('stage-failure')" class="mt-3 text-xs font-medium text-[#64748b] underline-offset-2 hover:underline">
            Simulasikan gagal
          </button>
        </div>

       <!-- STAGE: PROCESSING -->
        <div id="stage-processing" class="hidden flex flex-col items-center rounded-2xl border border-[#e2e8f0] bg-white p-12 text-center">
          
          <!-- Ikon Lucide Loader2 yang diputar -->
          <svg class="h-12 w-12 animate-spin text-[#0b2046]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
          </svg>
          
          <h3 class="mt-5 font-display text-lg font-bold text-[#0b2046]">Memeriksa pembayaran...</h3>
          <p class="mt-1 text-sm text-[#64748b]">Mohon tunggu sebentar.</p>
        </div>

      </div>

      <!-- KOLOM KANAN: Ringkasan Pesanan -->
      <div class="lg:pt-0">
        <div class="rounded-2xl border border-[#e2e8f0] bg-white p-5">
          <h3 class="font-display text-sm font-semibold text-[#0b2046]">Ringkasan Pesanan</h3>
          <div class="mt-4 space-y-2.5 text-sm">
            <div class="flex justify-between gap-4">
              <span class="text-[#64748b]">Layanan</span>
              <span id="summaryTitle" class="font-medium text-[#0b2046]">KosanJek</span>
            </div>
            <div class="flex justify-between gap-4">
              <span class="text-[#64748b]">Pelanggan</span>
              <span id="summaryCustomer" class="font-medium text-[#0b2046]">Andika Dwi Januar</span>
            </div>
            <div class="flex justify-between gap-4">
              <span class="text-[#64748b]">Tanggal</span>
              <span id="summaryDate" class="font-medium text-[#0b2046]">-</span>
            </div>
            
            <div class="my-3 border-t border-dashed border-[#e2e8f0]"></div>
            
            <div class="flex justify-between">
              <span class="text-[#64748b]">Subtotal</span>
              <span id="summarySubtotal" class="font-medium text-[#0b2046]">Rp 25.000</span>
            </div>
            <div class="flex justify-between">
              <span class="text-[#64748b]">Biaya Layanan</span>
              <span class="font-medium text-[#0b2046]">Rp 5.000</span>
            </div>
            <div class="mt-2 flex justify-between border-t border-[#e2e8f0] pt-3">
              <span class="font-display font-semibold text-[#0b2046]">Total</span>
              <span class="font-display text-base font-bold text-[#0b2046] totalPriceDisplay">Rp 30.000</span>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>

  <!-- LAYAR 2: KONDISI LAYAR PENUH (SUCCESS / FAILED / EXPIRED) -->
  <main id="resultScreens" class="hidden mx-auto flex min-h-[70vh] max-w-lg flex-col items-center justify-center px-4 py-16 text-center">
    
    <!-- STAGE: SUCCESS -->
    <div id="stage-success" class="hidden w-full flex flex-col items-center">
      <div class="grid h-20 w-20 place-items-center rounded-full bg-green-50">
        <svg class="h-11 w-11 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <h1 class="mt-6 font-display text-2xl font-extrabold text-[#0b2046]">Pembayaran Berhasil!</h1>
      <p class="mt-2 text-sm text-[#64748b]">Pesanan layanan kamu berhasil dibuat.</p>
      
      <div class="mt-6 w-full rounded-2xl border border-[#e2e8f0] bg-white p-5 text-left text-sm">
        <div class="flex justify-between gap-4 py-1.5"><span class="text-[#64748b]">Order ID</span><span class="font-medium text-[#0b2046]" id="finalOrderId">KOKA-123456</span></div>
        <div class="flex justify-between gap-4 py-1.5"><span class="text-[#64748b]">Layanan</span><span class="font-medium text-[#0b2046]" id="finalTitle">KosanJek</span></div>
        <div class="flex justify-between gap-4 py-1.5"><span class="text-[#64748b]">Total Pembayaran</span><span class="font-medium text-[#0b2046] totalPriceDisplay">Rp 30.000</span></div>
        
        <div class="mt-2 flex justify-between border-t border-[#e2e8f0] pt-3">
          <span class="text-[#64748b]">Status Pembayaran</span>
          <span class="rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-semibold text-green-600">Berhasil</span>
        </div>
      </div>
      
      <div class="mt-6 grid w-full gap-3 sm:grid-cols-2">
        <a href="/order-detail" class="flex items-center justify-center rounded-xl bg-[#0b2046] px-4 py-3 text-sm font-bold text-white transition hover:opacity-90">
            Lihat Pesanan
        </a>
        <a href="/" class="flex items-center justify-center rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">Kembali ke Beranda</a>
      </div>
    </div>

    <!-- STAGE: FAILURE -->
    <div id="stage-failure" class="hidden w-full flex flex-col items-center">
      <div class="grid h-20 w-20 place-items-center rounded-full bg-red-50">
        <svg class="h-11 w-11 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <h1 class="mt-6 font-display text-2xl font-extrabold text-[#0b2046]">Pembayaran Gagal</h1>
      <p class="mt-2 text-sm text-[#64748b]">Pembayaran tidak dapat diproses. Silakan coba lagi.</p>
      <div class="mt-6 grid w-full gap-3 sm:grid-cols-2">
        <button onclick="resetToMethod()" class="rounded-xl bg-[#0b2046] px-4 py-3 text-sm font-bold text-white transition hover:opacity-90">Coba Lagi</button>
        <button onclick="window.history.back()" class="rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm font-bold text-[#0b2046] transition hover:bg-[#f8fafc]">Kembali</button>
      </div>
    </div>

    <!-- STAGE: EXPIRED -->
    <div id="stage-expired" class="hidden w-full flex flex-col items-center">
      <div class="grid h-20 w-20 place-items-center rounded-full bg-amber-50">
        <svg class="h-11 w-11 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <h1 class="mt-6 font-display text-2xl font-extrabold text-[#0b2046]">QR Code Kedaluwarsa</h1>
      <p class="mt-2 text-sm text-[#64748b]">Waktu pembayaran habis. Buat QR baru untuk melanjutkan.</p>
      <button onclick="resetQr()" class="mt-6 w-full rounded-xl bg-[#E5B044] px-4 py-3 text-sm font-bold text-[#0b2046] transition hover:opacity-90">Buat QR Baru</button>
    </div>

  </main>

  <!-- SKRIP LOGIKA PEMBAYARAN -->
  <script>
    // Variabel State
    let selectedMethod = 'QRIS';
    let countdownInterval;
    let secondsLeft = 15 * 60; // 15 Menit
    
    // Data Dummy
    const orderData = {
        title: "KosanJek",
        subtotal: 25000,
        fee: 5000,
        orderId: "KOKA-" + Math.floor(100000 + Math.random() * 899999)
    };
    
    // Inisialisasi Data ke DOM
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById('displayTitle').innerText = orderData.title;
        document.getElementById('summaryTitle').innerText = orderData.title;
        document.getElementById('summarySubtotal').innerText = formatRupiah(orderData.subtotal);
        document.getElementById('finalOrderId').innerText = orderData.orderId;
        document.getElementById('finalTitle').innerText = orderData.title;
        
        const total = orderData.subtotal + orderData.fee;
        document.querySelectorAll('.totalPriceDisplay').forEach(el => {
            el.innerText = formatRupiah(total);
        });
        
        const today = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        document.getElementById('summaryDate').innerText = today;
    });

    // Format Angka ke Rupiah
    function formatRupiah(angka) {
        return "Rp " + angka.toLocaleString("id-ID");
    }

    // Fungsi Mengganti Layar (Stage)
    function showStage(stageId) {
        // 1. Sembunyikan semua konten kiri di flow checkout
        ['stage-method', 'stage-qr', 'stage-processing'].forEach(id => {
            const el = document.getElementById(id);
            if(el) el.classList.add('hidden');
        });
        
        // 2. Sembunyikan semua layar hasil (Full Screen)
        ['stage-success', 'stage-failure', 'stage-expired'].forEach(id => {
            const el = document.getElementById(id);
            if(el) el.classList.add('hidden');
        });

        // 3. Tentukan layout mana yang aktif
        if (['stage-method', 'stage-qr', 'stage-processing'].includes(stageId)) {
            document.getElementById('checkoutFlow').classList.remove('hidden');
            document.getElementById('resultScreens').classList.add('hidden');
        } else {
            document.getElementById('checkoutFlow').classList.add('hidden');
            document.getElementById('resultScreens').classList.remove('hidden');
        }

        // 4. Munculkan stage yang diminta (Typo diperbaiki di sini)
        const activeStage = document.getElementById(stageId);
        if(activeStage) activeStage.classList.remove('hidden');
    }

    // Fungsi Pilih Metode Pembayaran
    function selectMethod(method, element) {
        selectedMethod = method;
        
        document.querySelectorAll('.method-btn').forEach(btn => {
            btn.classList.remove('border-[#0b2046]', 'bg-[#f8fafc]');
            btn.classList.add('border-[#e2e8f0]', 'bg-white');
            
            const indicator = btn.querySelector('.indicator');
            indicator.classList.remove('border-[#E5B044]', 'bg-[#E5B044]');
            indicator.classList.add('border-[#e2e8f0]');
        });
        
        element.classList.remove('border-[#e2e8f0]', 'bg-white');
        element.classList.add('border-[#0b2046]', 'bg-[#f8fafc]');
        
        const indicator = element.querySelector('.indicator');
        indicator.classList.remove('border-[#e2e8f0]');
        indicator.classList.add('border-[#E5B044]', 'bg-[#E5B044]');
    }

    // Lanjut ke Proses Bayar
    function proceedToPayment() {
        if (selectedMethod === 'QRIS') {
            startCountdown();
            showStage('stage-qr');
        } else {
            simulateProcessing();
        }
    }

    // Hitung Mundur QR
    function startCountdown() {
        clearInterval(countdownInterval);
        secondsLeft = 15 * 60;
        
        countdownInterval = setInterval(() => {
            secondsLeft--;
            
            if (secondsLeft <= 0) {
                clearInterval(countdownInterval);
                showStage('stage-expired');
                return;
            }
            
            const mm = String(Math.floor(secondsLeft / 60)).padStart(2, '0');
            const ss = String(secondsLeft % 60).padStart(2, '0');
            document.getElementById('countdownText').innerText = `${mm}:${ss}`;
            
        }, 1000);
    }

    // Simulasi Loading
    function simulateProcessing() {
        clearInterval(countdownInterval);
        showStage('stage-processing');
        
        setTimeout(() => {
            showStage('stage-success');
        }, 2200);
    }

    // Fungsi Reset
    function resetToMethod() {
        showStage('stage-method');
    }
    
    function resetQr() {
        startCountdown();
        showStage('stage-qr');
    }
  </script>

</body>
</html>