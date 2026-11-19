<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOKA Care - KOKA Property</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased overflow-y-scroll">

  <x-navbar />

  <main class="mx-auto max-w-[800px] px-4 py-8 sm:px-6">
    
    <!-- HEADER HALAMAN -->
    <div class="mb-8">
      <a href="javascript:history.back()" class="mb-4 inline-flex items-center gap-1.5 text-[14px] font-medium text-[#64748b] transition hover:text-[#0b2046]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
      </a>
      <h1 class="font-display text-[24px] font-bold text-[#0b2046] sm:text-[32px]">KOKA Care</h1>
      <p class="mt-1 text-[14px] text-[#64748b]">Bantuan 24/7 untukmu.</p>
    </div>

    <!-- GRID BANTUAN -->
    <div class="grid gap-4 sm:grid-cols-2">
        
        <!-- Card 1: Live Chat (Arah ke WhatsApp) -->
        <a href="https://wa.me/6282116530496?text=Halo%20Tim%20KOKA%20Care,%20saya%20ingin%20bertanya%20melalui%20Live%20Chat." target="_blank" class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md cursor-pointer">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">Live Chat</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Ngobrol langsung dengan tim kami</div>
            </div>
        </a>

        <!-- Card 2: FAQ (Buka Modal) -->
        <button onclick="openFaqModal()" class="flex w-full items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md cursor-pointer">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">FAQ</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Pertanyaan yang sering diajukan</div>
            </div>
        </button>

        <!-- Card 3: Contact Support (Arah ke WhatsApp) -->
        <a href="https://wa.me/6282116530496?text=Halo%20KOKA%20Support,%20saya%20butuh%20bantuan%20terkait%20layanan%20atau%20kosan." target="_blank" class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md cursor-pointer">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">Contact Support</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Hubungi via telepon / pesan</div>
            </div>
        </a>

        <!-- Card 4: Pesanan (Masuk ke Notifikasi) -->
        <a href="/pusat-notifikasi" class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md cursor-pointer">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">Pesanan</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Lihat status notifikasi laporanmu</div>
            </div>
        </a>

    </div>
  </main>

  <!-- ================= MODAL FAQ ================= -->
  <div id="faqModal" class="fixed inset-0 z-[120] hidden items-center justify-center p-4 sm:p-0">
      <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeFaqModal()"></div>
      
      <div class="relative w-full max-w-2xl rounded-[24px] bg-white shadow-2xl max-h-[85vh] flex flex-col overflow-hidden animate-in zoom-in-95 duration-300">
          
          <!-- Modal Header -->
          <div class="flex items-center justify-between border-b border-[#e2e8f0] px-6 py-5">
              <h3 class="font-display text-xl font-bold text-[#0b2046]">Pertanyaan yang Sering Diajukan (FAQ)</h3>
              <button onclick="closeFaqModal()" class="text-slate-400 hover:text-slate-700 transition">
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
              </button>
          </div>

          <!-- Modal Body (Scrollable Accordions) -->
          <div class="flex-1 overflow-y-auto px-6 py-6 space-y-4">
              
              <!-- Pertanyaan 1 -->
              <details class="group rounded-xl border border-slate-200 bg-slate-50 p-5 [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 font-semibold text-[#0b2046]">
                      <span class="text-[15px]">Bagaimana cara melakukan booking kos di KOKA?</span>
                      <span class="shrink-0 transition duration-300 group-open:-rotate-180 text-slate-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                      </span>
                  </summary>
                  <p class="mt-4 text-[14px] leading-relaxed text-[#64748b]">
                      Cari kos yang Anda inginkan di halaman <b>Cari Kos</b>, lalu klik kos tersebut. Di halaman detail, pilih durasi sewa, klik tombol <b>Booking Sekarang</b>, isi data diri Anda, dan Anda akan diarahkan ke WhatsApp Admin untuk mengonfirmasi dan melanjutkan pembayaran.
                  </p>
              </details>

              <!-- Pertanyaan 2 -->
              <details class="group rounded-xl border border-slate-200 bg-slate-50 p-5 [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 font-semibold text-[#0b2046]">
                      <span class="text-[15px]">Apa saja metode pembayaran yang tersedia?</span>
                      <span class="shrink-0 transition duration-300 group-open:-rotate-180 text-slate-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                      </span>
                  </summary>
                  <p class="mt-4 text-[14px] leading-relaxed text-[#64748b]">
                      Saat ini, pembayaran untuk kos maupun layanan KOKA dapat dilakukan melalui <b>Transfer Bank</b> dan <b>E-Wallet (Dana, GoPay, OVO, ShopeePay)</b> secara manual yang akan diinstruksikan oleh Admin KOKA setelah Anda melakukan pemesanan.
                  </p>
              </details>

              <!-- Pertanyaan 3 -->
              <details class="group rounded-xl border border-slate-200 bg-slate-50 p-5 [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 font-semibold text-[#0b2046]">
                      <span class="text-[15px]">Bagaimana cara memesan layanan KOKA (Laundry, Pindahan, dll)?</span>
                      <span class="shrink-0 transition duration-300 group-open:-rotate-180 text-slate-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                      </span>
                  </summary>
                  <p class="mt-4 text-[14px] leading-relaxed text-[#64748b]">
                      Buka menu <b>Layanan</b> di website kami, pilih layanan yang Anda butuhkan (seperti Kosan Clean, Kosan Laundry, dll), lalu isi form kebutuhan Anda. Setelah data terkirim, Anda bisa mengunggah bukti pembayaran atau menghubungi Admin untuk diproses.
                  </p>
              </details>

              <!-- Pertanyaan 4 -->
              <details class="group rounded-xl border border-slate-200 bg-slate-50 p-5 [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 font-semibold text-[#0b2046]">
                      <span class="text-[15px]">Apakah saya bisa survei kos terlebih dahulu?</span>
                      <span class="shrink-0 transition duration-300 group-open:-rotate-180 text-slate-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                      </span>
                  </summary>
                  <p class="mt-4 text-[14px] leading-relaxed text-[#64748b]">
                      Tentu saja! KOKA Property membebaskan biaya survei (Gratis). Anda cukup mengisi formulir booking dan mencantumkan <b>Rencana Tanggal Survei</b> Anda, lalu sampaikan kepada Admin melalui WhatsApp untuk mengatur jadwalnya bersama pemilik kos.
                  </p>
              </details>

              <!-- Pertanyaan 5 -->
              <details class="group rounded-xl border border-slate-200 bg-slate-50 p-5 [&_summary::-webkit-details-marker]:hidden">
                  <summary class="flex cursor-pointer items-center justify-between gap-1.5 font-semibold text-[#0b2046]">
                      <span class="text-[15px]">Dimana saya bisa mengecek status pesanan saya?</span>
                      <span class="shrink-0 transition duration-300 group-open:-rotate-180 text-slate-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                      </span>
                  </summary>
                  <p class="mt-4 text-[14px] leading-relaxed text-[#64748b]">
                      Jika Anda sudah membuat akun (login) di KOKA Property, semua riwayat pesanan (baik layanan maupun booking kos) dan status pembayarannya dapat Anda lihat pada ikon Lonceng Notifikasi di atas, atau pada halaman menu <b>Pesanan Saya</b> di profil Anda.
                  </p>
              </details>

          </div>
      </div>
  </div>

  <x-footer />

  <!-- JavaScript untuk Modal FAQ -->
  <script>
      function openFaqModal() {
          const modal = document.getElementById('faqModal');
          modal.classList.remove('hidden');
          modal.classList.add('flex');
      }

      function closeFaqModal() {
          const modal = document.getElementById('faqModal');
          modal.classList.add('hidden');
          modal.classList.remove('flex');
      }
  </script>
</body>
</html>