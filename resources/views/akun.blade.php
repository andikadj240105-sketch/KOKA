<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white font-sans text-[#1e293b] antialiased">
  
  @include('components.navbar')

  <!-- Ditambahkan pb-28 agar ada ruang scroll lebih di mobile untuk menghindari tertutup bottom nav -->
  <main x-data="{ editProfileModal: false, imagePreview: null }" class="mx-auto max-w-2xl px-4 pt-8 pb-28 sm:px-6 sm:py-10">
    
    @if(session('success'))
      <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-600 shadow-sm">
          {{ session('success') }}
      </div>
    @endif

    <div class="mb-6">
      <a href="/" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#522b89]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
      </a>
      <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Akun</h1>
      <p class="mt-1 text-sm text-[#64748b]">Kelola profil dan preferensi kamu.</p>
    </div>

    <!-- KARTU INFO PROFIL -->
    <div class="mb-6 flex items-center justify-between rounded-2xl border border-[#e2e8f0] bg-white p-5 shadow-[0_1px_2px_rgba(82,43,137,0.03)]">
      <div class="flex items-center gap-4">
          @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="h-16 w-16 rounded-full object-cover shadow-sm">
          @else
            <div class="grid h-16 w-16 place-items-center rounded-full bg-[#522b89] font-display text-xl font-bold text-[#F39C12]">
              {{ strtoupper(substr(Auth::user()->nama ?? Auth::user()->name, 0, 1)) }}
            </div>
          @endif

          <div>
            <div class="font-display text-lg font-bold text-[#522b89]">{{ Auth::user()->nama ?? Auth::user()->name }}</div>
            <div class="text-sm text-[#64748b]">{{ Auth::user()->email }}</div>
            <span class="mt-1 inline-flex items-center gap-1 rounded-full bg-[#F39C12]/15 px-2.5 py-0.5 text-xs font-semibold text-[#F39C12]">
              {{ ucfirst(Auth::user()->role ?? 'Member') }} · {{ number_format(Auth::user()->poin ?? 0, 0, ',', '.') }} pts
            </span>
          </div>
      </div>

      <button @click="editProfileModal = true" class="grid h-10 w-10 place-items-center rounded-full border border-[#e2e8f0] text-[#522b89] transition hover:bg-[#f8fafc]" title="Edit Profil">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
      </button>
    </div>

    <!-- MODAL EDIT PROFIL -->
    <div x-show="editProfileModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-0 transition-opacity">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="editProfileModal = false"></div>
        
        <div class="relative w-full max-w-sm rounded-3xl bg-white p-6 shadow-2xl animate-in zoom-in-95 duration-200">
            <div class="mb-5 flex items-center justify-between">
                <h3 class="font-display text-lg font-bold text-[#522b89]">Edit Profil</h3>
                <button @click="editProfileModal = false" class="text-slate-400 hover:text-slate-700 transition">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>

            <form action="{{ route('akun.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="flex flex-col items-center gap-2">
                    <div class="relative h-20 w-20 overflow-hidden rounded-full border-2 border-dashed border-[#cbd5e1] bg-slate-50 transition hover:border-[#522b89]">
                        <template x-if="imagePreview">
                            <img :src="imagePreview" class="h-full w-full object-cover">
                        </template>
                        <template x-if="!imagePreview">
                            <div class="grid h-full w-full place-items-center text-slate-400">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="h-full w-full object-cover">
                                @else
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" /><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" /></svg>
                                @endif
                            </div>
                        </template>
                        <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" class="absolute inset-0 h-full w-full cursor-pointer opacity-0" @change="const file = $event.target.files[0]; if(file){ imagePreview = URL.createObjectURL(file); }">
                    </div>
                    <p class="text-[11px] font-medium text-[#64748b]">Ketuk untuk ubah (Maks 2MB)</p>
                </div>

                <div>
                    <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ Auth::user()->nama ?? Auth::user()->name }}" required class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-xl bg-[#522b89] px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DAFTAR MENU AKUN LENGKAP -->
    <div class="divide-y divide-[#e2e8f0] overflow-hidden rounded-2xl border border-[#e2e8f0] bg-white shadow-[0_1px_2px_rgba(82,43,137,0.03)]">
      
      <!-- Profil Saya -->
      <a href="/profil" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-[#522b89]">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Profil Saya</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Pesanan Saya -->
      <a href="/pesanan" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-[#522b89]">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 10a4 4 0 0 1-8 0"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Pesanan Saya</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Kos Favorit Saya -->
      <a href="/favorit" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-red-500">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Kos Favorit Saya</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Artikel / Berita -->
      <a href="/artikel" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-[#522b89]">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Artikel</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Tentang Kami -->
      <a href="/tentang-kami" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-[#522b89]">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Tentang Kami</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Pengaturan Keamanan -->
      <a href="/pengaturan" class="flex w-full items-center gap-3 px-5 py-3.5 text-left transition hover:bg-[#f8fafc]">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-[#f8fafc] text-[#522b89]">
          <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
        </span>
        <span class="flex-1 text-sm font-medium text-[#522b89]">Pengaturan Keamanan</span>
        <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
      </a>

      <!-- Tombol Logout -->
      <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <button type="submit" class="flex w-full items-center gap-3 px-5 py-3.5 text-left text-red-500 transition hover:bg-red-50">
          <span class="grid h-9 w-9 place-items-center rounded-xl bg-red-50">
            <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          </span>
          <span class="flex-1 text-sm font-bold">Logout</span>
        </button>
      </form>

    </div>
  </main>
</body>
</html>