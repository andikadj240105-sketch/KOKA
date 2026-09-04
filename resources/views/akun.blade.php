<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
  
  <!-- (Sisipkan File Komponen Header.blade.php milikmu di sini) -->

  <!-- Container Utama mirip dengan TSX: max-w-2xl -->
  <main class="mx-auto max-w-2xl px-4 py-8 sm:px-6">
    
    <!-- Bagian Header Halaman -->
    <div class="mb-6">
      <a href="/" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-slate transition hover:text-navy">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
      </a>
      <h1 class="font-display text-2xl font-bold text-navy sm:text-3xl">Akun</h1>
      <p class="mt-1 text-sm text-slate">Kelola profil dan preferensi kamu.</p>
    </div>

    <!-- Kartu Info Profil -->
    <div class="mb-6 flex items-center gap-4 rounded-2xl border border-line bg-white p-5 shadow-[0_1px_2px_rgba(16,33,61,0.03)]">
      <!-- Inisial Avatar -->
      <div class="grid h-16 w-16 place-items-center rounded-full bg-navy font-display text-xl font-bold text-gold">
        A
      </div>
      <div>
        <div class="font-display text-lg font-bold text-navy">Andika Dwi</div>
        <div class="text-sm text-slate">andika@email.com</div>
        <span class="mt-1 inline-flex rounded-full bg-gold/15 px-2.5 py-0.5 text-xs font-semibold text-gold">
          Member · 2.450 pts
        </span>
      </div>
    </div>

    <!-- Daftar Menu Akun -->
    <div class="divide-y divide-line overflow-hidden rounded-2xl border border-line bg-white shadow-[0_1px_2px_rgba(16,33,61,0.03)]">
      
      <!-- Profil Saya -->
      <a href="/profil" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Profil Saya</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Kos Saya -->
      <a href="/kontrak" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Kos Saya</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Pembayaran -->
      <a href="/bayar-kos" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Pembayaran</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Kontrak Saya -->
      <a href="/kontrak" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Kontrak Saya</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Pesanan Saya -->
      <a href="/pesanan" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 10a4 4 0 0 1-8 0"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Pesanan Saya</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Rewards -->
      <a href="/rewards" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><polyline points="20 12 20 22 4 22 4 12"/><rect width="20" height="5" x="2" y="7"/><line x1="12" x2="12" y1="22" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Rewards</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Pesan -->
      <a href="/chat" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Pesan</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Notifikasi -->
      <button onclick="alert('Buka modal Notifikasi')" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path stroke-linecap="round" stroke-linejoin="round" d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Notifikasi</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </button>

      <!-- Pengaturan -->
      <a href="/pengaturan" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Pengaturan</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Bantuan -->
      <a href="/bantuan" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-cloud">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-cloud text-navy">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-navy">Bantuan</span>
        <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Tombol Logout (Di dalam form agar aman) -->
      <form method="POST" action="/logout" class="w-full">
        @csrf
        <button type="submit" class="flex w-full items-center gap-3 px-5 py-3.5 text-left text-red-500 transition hover:bg-red-50">
          <span class="grid h-9 w-9 place-items-center rounded-xl bg-red-50">
            <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          </span>
          <span class="flex-1 text-sm font-medium">Logout</span>
        </button>
      </form>

    </div>
  </main>
</body>
</html>