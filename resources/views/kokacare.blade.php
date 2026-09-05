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
        
        <!-- Card 1 -->
        <button class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">Live Chat</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Ngobrol langsung dengan tim kami</div>
            </div>
        </button>

        <!-- Card 2 -->
        <button class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">FAQ</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Pertanyaan yang sering diajukan</div>
            </div>
        </button>

        <!-- Card 3 -->
        <button class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">Contact Support</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Hubungi via telepon / email</div>
            </div>
        </button>

        <!-- Card 4 -->
        <button class="flex items-center gap-5 rounded-[24px] border border-[#e2e8f0] bg-white p-5 text-left shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#E5B044]/40 hover:shadow-md">
            <div class="grid h-[52px] w-[52px] shrink-0 place-items-center rounded-[16px] bg-[#0b2046] text-[#E5B044]">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>
            </div>
            <div>
                <div class="font-display text-[16px] font-bold text-[#0b2046]">My Tickets</div>
                <div class="mt-0.5 text-[13px] text-[#64748b]">Lihat status laporanmu</div>
            </div>
        </button>

    </div>
  </main>

  <x-footer />
</body>
</html>