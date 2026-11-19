<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pembayaran - KOKA Property</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">

  <x-navbar />

  @php
      $layananNama = $order->layanan ?? 'Layanan KOKA';
      $pelanggan = $order->nama ?? Auth::user()->nama ?? Auth::user()->name ?? 'Pelanggan';
      $subtotal = $order->total_harga ?? 0;
      $biayaLayanan = 0; 
      $totalTransfer = $subtotal + $biayaLayanan;

      // Cek apakah metode sudah tersimpan atau usia pesanan sudah lebih dari 1 menit
      $metode = $order->metode_pembayaran ?? '';
      $isLanjutan = !empty($metode) || ($order->created_at && $order->created_at->diffInMinutes(now()) >= 1);
  @endphp

  <main id="checkoutFlow" class="mx-auto max-w-4xl px-4 py-8 sm:px-6 pb-56 sm:pb-12">
    
    <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Pembayaran Layanan</h1>
    <p class="mt-1 text-sm text-[#64748b]">Selesaikan pembayaran untuk <span id="displayTitle" class="font-bold text-[#522b89]">{{ $layananNama }}</span>.</p>

    <div class="mt-7 grid gap-6 lg:grid-cols-[1fr_360px]">
      
      <!-- KOLOM KIRI: Interaksi Pembayaran -->
      <div>
        
        <!-- TAHAP 1: PILIH METODE -->
        <div id="stage-method" class="space-y-3">
          <h3 id="titleMethod" class="font-display text-sm font-semibold text-[#522b89]">
             {{ $isLanjutan ? 'Lanjutkan Pembayaran' : 'Pilih Metode Pembayaran Online' }}
          </h3>
          
          <button onclick="selectMethod('QRIS', this)" class="method-btn flex w-full items-center gap-4 rounded-2xl border border-[#522b89] bg-[#f8fafc] p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#522b89] text-[#F39C12]"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg></div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#522b89]">QRIS</div>
              <div class="text-xs text-[#64748b]">Scan pakai aplikasi apa pun</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#F39C12] bg-[#F39C12]"></span>
          </button>

          <button onclick="selectMethod('BANK', this)" class="method-btn flex w-full items-center gap-4 rounded-2xl border border-[#e2e8f0] bg-white hover:border-[#522b89]/40 p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#522b89] text-[#F39C12]"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg></div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#522b89]">Transfer Bank</div>
              <div class="text-xs text-[#64748b]">BCA, Mandiri, BNI, BRI</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#e2e8f0]"></span>
          </button>

          <!-- OPSI TUNAI (Disembunyikan jika baru, langsung muncul jika kembali/lanjutan) -->
          <button id="optionCash" onclick="selectMethod('CASH', this)" class="method-btn {{ $isLanjutan ? 'flex' : 'hidden' }} w-full items-center gap-4 rounded-2xl border border-[#e2e8f0] bg-white hover:border-[#522b89]/40 p-4 text-left transition">
            <div class="grid h-11 w-11 place-items-center rounded-xl bg-[#522b89] text-[#F39C12]"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg></div>
            <div class="flex-1">
              <div class="font-display text-sm font-semibold text-[#522b89]">Bayar di Tempat (Tunai)</div>
              <div class="text-xs text-[#64748b]">Upload foto penyerahan uang ke petugas</div>
            </div>
            <span class="indicator h-5 w-5 rounded-full border-2 border-[#e2e8f0]"></span>
          </button>

          <!-- Area Tombol Aksi -->
          <div class="mt-6 flex flex-col gap-3 border-t border-[#e2e8f0] pt-6">
            <button id="btnProceedOnline" onclick="proceedToPayment()" class="w-full rounded-xl bg-[#F39C12] px-4 py-3.5 text-sm font-bold text-[#522b89] transition hover:opacity-90 cursor-pointer shadow-sm">
              {{ $isLanjutan ? 'Lanjutkan Upload Bukti' : 'Lanjutkan Pembayaran Online' }}
            </button>
            
            <!-- TOMBOL DIRECT SIMPAN (Muncul jika baru, otomatis hilang jika lanjutan/kembali) -->
            <button id="btnDirectSave" onclick="submitPayment(true)" class="{{ !$isLanjutan ? 'flex' : 'hidden' }} w-full items-center justify-center gap-2 rounded-xl border-2 border-[#522b89] bg-white px-4 py-3.5 text-sm font-bold text-[#522b89] transition hover:bg-[#f8fafc] cursor-pointer">
              <svg class="h-5 w-5 text-[#F39C12]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
              Bayar di Tempat (Simpan ke Pesanan Saya)
            </button>
          </div>
        </div>

        <!-- TAHAP 2: DETAIL & UPLOAD -->
        <div id="stage-payment-details" class="hidden flex flex-col items-center rounded-2xl border border-[#e2e8f0] bg-white p-8">
          
          <div id="instruction-qris" class="hidden w-full flex-col items-center text-center">
            <div class="inline-flex items-center gap-2 rounded-full bg-[#f8fafc] px-3 py-1 text-xs font-semibold text-[#522b89]">Scan QRIS</div>
            <div class="mt-5 rounded-xl border-4 border-white bg-white shadow overflow-hidden">
              <img src="{{ asset('images/qrcode.jpeg') }}" class="h-[200px] w-[200px] object-contain cursor-pointer transition hover:scale-105" onclick="openLightbox(this.src)" />
            </div>
            <p class="mt-5 font-display text-sm font-semibold text-[#522b89]">Scan QR ini melalui aplikasi pembayaran Anda.</p>
          </div>

          <div id="instruction-bank" class="hidden w-full flex-col items-center text-center">
            <h3 class="font-display font-semibold text-[#522b89]">Instruksi Transfer Bank</h3>
            <div class="mt-4 w-full rounded-xl border border-[#e2e8f0] bg-gray-50 p-4 text-left">
              <p class="text-xs text-[#64748b]">Bank Tujuan</p><p class="font-bold text-[#522b89]">MANDIRI</p>
              <p class="mt-3 text-xs text-[#64748b]">Nomor Rekening</p><p class="text-xl font-bold tracking-wider text-[#F39C12]">131-00-2313925-8</p>
              <p class="mt-3 text-xs text-[#64748b]">Atas Nama</p><p class="font-bold text-[#522b89]">PT. KOSAN KAMPUS PROPERTINDO</p>
            </div>
          </div>

          <div id="instruction-cash" class="hidden w-full flex-col items-center text-center">
            <div class="grid h-16 w-16 place-items-center rounded-full bg-green-50 mb-4">
              <svg class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h3 class="font-display text-lg font-bold text-[#522b89]">Bayar di Tempat (Tunai)</h3>
            <p class="mt-2 text-sm text-[#64748b]">Serahkan uang tunai sebesar <strong class="text-[#522b89]">Rp {{ number_format($totalTransfer, 0, ',', '.') }}</strong> kepada petugas KOKA.</p>
          </div>

          <!-- Bagian Upload -->
          <div class="mt-8 w-full border-t border-dashed border-[#e2e8f0] pt-6 text-left">
            <label id="uploadLabel" class="mb-2 block text-sm font-semibold text-[#522b89]">Upload Bukti Pembayaran</label>
            <p id="uploadDesc" class="mb-3 text-xs text-[#64748b]">Format: JPG, PNG. Maks: 10MB.</p>
            <input type="file" id="buktiPembayaran" accept="image/*" class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-500 focus:outline-none file:mr-4 file:border-0 file:bg-[#522b89] file:py-2.5 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-[#522b89]/90">
          </div>

          <!-- Tombol Aksi Upload -->
          <div class="mt-6 w-full space-y-3">
            <button id="btnSubmitFile" onclick="submitPayment(false)" class="w-full rounded-xl bg-[#522b89] px-4 py-3.5 text-sm font-bold text-white transition hover:opacity-90 cursor-pointer">
              Kirim Bukti Pembayaran
            </button>
            <button onclick="resetToMethod()" class="w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm font-bold text-[#522b89] transition hover:bg-[#f8fafc] cursor-pointer">
              Kembali
            </button>
          </div>
        </div>

        <!-- TAHAP 3: LOADING -->
        <div id="stage-processing" class="hidden flex flex-col items-center rounded-2xl border border-[#e2e8f0] bg-white p-12 text-center">
            <svg class="animate-spin h-12 w-12 text-[#522b89]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          <h3 class="mt-5 font-display text-lg font-bold text-[#522b89]">Memproses...</h3>
          <p class="mt-1 text-sm text-[#64748b]">Mohon tunggu sebentar.</p>
        </div>

      </div>

      <!-- KOLOM KANAN: Ringkasan -->
      <div class="lg:pt-0 mb-32 lg:mb-0">
        <div class="rounded-2xl border border-[#e2e8f0] bg-white p-5">
          <h3 class="font-display text-sm font-semibold text-[#522b89]">Ringkasan Pesanan</h3>
          <div class="mt-4 space-y-2.5 text-sm">
            <div class="flex justify-between gap-4"><span class="text-[#64748b]">Layanan</span><span class="font-medium text-[#522b89]">{{ $layananNama }}</span></div>
            <div class="flex justify-between gap-4"><span class="text-[#64748b]">Pelanggan</span><span class="font-medium text-[#522b89]">{{ $pelanggan }}</span></div>
            <div class="flex justify-between gap-4"><span class="text-[#64748b]">Tanggal</span><span id="summaryDate" class="font-medium text-[#522b89]">-</span></div>
            <div class="my-3 border-t border-dashed border-[#e2e8f0]"></div>
            <div class="flex justify-between"><span class="text-[#64748b]">Subtotal</span><span class="font-medium text-[#522b89]">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
            <div class="mt-2 flex justify-between border-t border-[#e2e8f0] pt-3">
              <span class="font-display font-semibold text-[#522b89]">Total Tagihan</span>
              <span class="font-display text-base font-bold text-[#522b89]">Rp {{ number_format($totalTransfer, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <main id="resultScreens" class="hidden mx-auto flex min-h-[70vh] max-w-lg flex-col items-center justify-center px-4 py-16 pb-56 text-center">
    
    <!-- TAHAP 4: SUCCESS SCREEN -->
    <div id="stage-success" class="hidden w-full flex flex-col items-center">
      <div class="grid h-20 w-20 place-items-center rounded-full bg-green-50">
        <svg class="h-11 w-11 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <h1 class="mt-6 font-display text-2xl font-extrabold text-[#522b89]">Selesai!</h1>
      <p class="mt-2 text-sm text-[#64748b]">Bukti pembayaran telah terkirim dan sedang menunggu verifikasi admin.</p>
      
      <!-- KOTAK DETAIL TRANSAKSI -->
      <div class="mt-6 w-full rounded-2xl border border-[#e2e8f0] bg-white p-5 text-left text-sm shadow-sm">
        <div class="flex justify-between border-b border-[#e2e8f0] pb-3">
          <span class="text-[#64748b]">Order ID</span>
          <span class="font-semibold text-[#522b89]">KOKA-{{ $order->id }}</span>
        </div>
        <div class="flex justify-between border-b border-[#e2e8f0] py-3">
          <span class="text-[#64748b]">Layanan</span>
          <span class="font-semibold text-[#522b89]">{{ $layananNama }}</span>
        </div>
        <div class="flex justify-between border-b border-[#e2e8f0] py-3">
          <span class="text-[#64748b]">Total Pembayaran</span>
          <span class="font-semibold text-[#522b89]">Rp {{ number_format($totalTransfer, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between pt-3">
          <span class="text-[#64748b]">Status Pembayaran</span>
          <span class="font-bold text-[#F39C12]">Menunggu Verifikasi</span>
        </div>
      </div>

      <div class="mt-6 grid w-full gap-3 sm:grid-cols-2">
        <a href="/pesanan" class="flex items-center justify-center rounded-xl bg-[#522b89] px-4 py-3 text-sm font-bold text-white transition hover:opacity-90">Lihat Pesanan Saya</a>
        <a href="/" class="flex items-center justify-center rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm font-bold text-[#522b89] transition hover:bg-[#f8fafc]">Kembali ke Beranda</a>
      </div>
    </div>
  </main>

  <!-- MODAL LIGHTBOX QRIS -->
  <div id="qrisLightbox" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/80 p-4 transition-opacity" onclick="closeLightbox()">
    <div class="relative flex w-full max-w-md justify-center" onclick="event.stopPropagation()">
      <button onclick="closeLightbox()" class="absolute -right-4 -top-10 text-white hover:text-gray-300 sm:-right-10"><svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg></button>
      <img id="lightboxImage" src="" class="max-h-[85vh] w-auto rounded-xl bg-white p-2 shadow-2xl object-contain" />
    </div>
  </div>

  <script>
    let selectedMethod = 'QRIS';
    
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById('summaryDate').innerText = "{{ $order->tanggal ? \Carbon\Carbon::parse($order->tanggal)->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}";

        // === BYPASS CACHE BROWSER (REAL-TIME DETECTOR) ===
        // Membaca dari mana asal pengguna (HTTP Referrer) 
        const isFromPesanan = document.referrer.indexOf('pesanan') !== -1;
        
        // Membaca apakah dimuat dari Back/Forward Cache browser
        const navEntries = performance.getEntriesByType("navigation");
        const isBackForward = navEntries.length > 0 && navEntries[0].type === "back_forward";

        if (isFromPesanan || isBackForward) {
            forceLanjutanUI();
        }
    });

    // Cek ulang saat menekan back button di HP/PC
    window.addEventListener("pageshow", function (event) {
        if (event.persisted) {
            forceLanjutanUI();
        }
    });

    function forceLanjutanUI() {
        document.getElementById('titleMethod').innerText = 'Lanjutkan Pembayaran';
        
        const optionCash = document.getElementById('optionCash');
        if(optionCash) { optionCash.classList.remove('hidden'); optionCash.classList.add('flex'); }

        const btnDirectSave = document.getElementById('btnDirectSave');
        if(btnDirectSave) { btnDirectSave.classList.add('hidden'); btnDirectSave.classList.remove('flex'); }
        
        const btnProceedOnline = document.getElementById('btnProceedOnline');
        if(btnProceedOnline) { btnProceedOnline.innerText = 'Lanjutkan Upload Bukti'; }
    }

    function showStage(stageId) {
        ['stage-method', 'stage-payment-details', 'stage-processing'].forEach(id => {
            const el = document.getElementById(id);
            if(el) el.classList.add('hidden');
        });
        document.getElementById('resultScreens').classList.add('hidden');
        document.getElementById('stage-success').classList.add('hidden');

        if (['stage-method', 'stage-payment-details', 'stage-processing'].includes(stageId)) {
            document.getElementById('checkoutFlow').classList.remove('hidden');
        } else {
            document.getElementById('checkoutFlow').classList.add('hidden');
            document.getElementById('resultScreens').classList.remove('hidden');
        }

        const activeStage = document.getElementById(stageId);
        if(activeStage) {
            activeStage.classList.remove('hidden');
            if (stageId === 'stage-payment-details') activeStage.classList.add('flex');
        }
    }

    function selectMethod(method, element) {
        selectedMethod = method;
        document.querySelectorAll('.method-btn').forEach(btn => {
            btn.classList.remove('border-[#522b89]', 'bg-[#f8fafc]');
            btn.classList.add('border-[#e2e8f0]', 'bg-white');
            btn.querySelector('.indicator').classList.remove('border-[#F39C12]', 'bg-[#F39C12]');
            btn.querySelector('.indicator').classList.add('border-[#e2e8f0]');
        });
        element.classList.remove('border-[#e2e8f0]', 'bg-white');
        element.classList.add('border-[#522b89]', 'bg-[#f8fafc]');
        element.querySelector('.indicator').classList.remove('border-[#e2e8f0]');
        element.querySelector('.indicator').classList.add('border-[#F39C12]', 'bg-[#F39C12]');
    }

    function proceedToPayment() {
        showStage('stage-payment-details');
        
        ['instruction-qris', 'instruction-bank', 'instruction-cash'].forEach(id => {
            const el = document.getElementById(id);
            if(el) { el.classList.add('hidden'); el.classList.remove('flex'); }
        });
        
        const uploadLabel = document.getElementById('uploadLabel');
        const uploadDesc = document.getElementById('uploadDesc');

        if (selectedMethod === 'QRIS') {
            document.getElementById('instruction-qris').classList.remove('hidden'); document.getElementById('instruction-qris').classList.add('flex');
            uploadLabel.innerText = "Upload Bukti Pembayaran QRIS";
            uploadDesc.innerText = "Format: JPG, PNG. Maks: 10MB.";
        } else if (selectedMethod === 'BANK') {
            document.getElementById('instruction-bank').classList.remove('hidden'); document.getElementById('instruction-bank').classList.add('flex');
            uploadLabel.innerText = "Upload Bukti Transfer Bank";
            uploadDesc.innerText = "Format: JPG, PNG. Maks: 10MB.";
        } else if (selectedMethod === 'CASH') {
            document.getElementById('instruction-cash').classList.remove('hidden'); document.getElementById('instruction-cash').classList.add('flex');
            uploadLabel.innerText = "Upload Bukti Foto Penyerahan Uang";
            uploadDesc.innerText = "Silakan foto uang saat diserahkan ke petugas.";
        }
    }

    function submitPayment(isPending = false) {
        const fileInput = document.getElementById('buktiPembayaran');
        
        if (!isPending && !fileInput.files[0]) {
            alert("Harap pilih file bukti/foto terlebih dahulu!");
            return;
        }

        showStage('stage-processing');

        let formData = new FormData();
        if(!isPending) formData.append('bukti', fileInput.files[0]);
        formData.append('order_id', '{{ $order->id }}');
        
        formData.append('metode_pembayaran', isPending ? 'cash_pending' : selectedMethod);

        fetch("{{ route('layanan.upload-bukti') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if(data.redirect) {
                    window.location.href = data.url; 
                } else {
                    showStage('stage-success'); 
                }
            } else {
                alert("Gagal: " + data.message);
                resetToMethod();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan sistem saat menghubungi server.");
            resetToMethod();
        });
    }

    function resetToMethod() { showStage('stage-method'); }
    function openLightbox(src) { document.getElementById('lightboxImage').src = src; document.getElementById('qrisLightbox').classList.remove('hidden'); }
    function closeLightbox() { document.getElementById('qrisLightbox').classList.add('hidden'); }
  </script>
</body>
</html>