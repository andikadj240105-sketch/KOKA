<!-- resources/views/components/navbar.blade.php -->
<header class="sticky top-0 z-40 border-b border-[#e2e8f0] bg-white/90 backdrop-blur-md">
  <div class="mx-auto flex h-16 max-w-[1280px] items-center justify-between gap-4 px-4 sm:px-6 lg:h-[72px]">
    
    <!-- Logo Kosan Kampus (Tampil di Semua Layar) -->
    <a href="/" class="flex items-center shrink-0">
        <img src="/kosankampus.png" alt="Logo Kosan Kampus" class="h-[100px] lg:h-[120px] w-auto object-contain mix-blend-multiply" />
    </a>

    <!-- Navigasi Desktop (Hanya tampil di Laptop/PC) -->
    <nav class="hidden items-center gap-1 lg:flex">
        <a href="/" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('/') ? 'bg-[#f8fafc] text-[#0b2046]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#0b2046]' }}">
            Beranda
        </a>
        <a href="/cari-kos" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('cari-kos') ? 'bg-[#f8fafc] text-[#0b2046]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#0b2046]' }}">
            Cari Kos
        </a>
        <a href="/layanan" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('layanan') ? 'bg-[#f8fafc] text-[#0b2046]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#0b2046]' }}">
            Layanan
        </a>
        <a href="/promo" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('promo') ? 'bg-[#f8fafc] text-[#0b2046]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#0b2046]' }}">
            Promo
        </a>
        <a href="/tentang-kami" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('tentang-kami') ? 'bg-[#f8fafc] text-[#0b2046]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#0b2046]' }}">
            Tentang Kami
        </a>
    </nav>

    <!-- Menu Kanan Desktop (Hanya tampil di Laptop/PC) -->
    <div class="hidden items-center gap-2 lg:flex">
      
      
      <button onclick="toggleNotifModal()" aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-[#0b2046] transition hover:bg-[#f8fafc]">
        <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
        <span class="absolute right-2.5 top-2.5 h-2 w-2 rounded-full bg-[#E5B044] ring-2 ring-white"></span>
      </button>

      <a href="/pesan" aria-label="Pesan" class="grid h-10 w-10 place-items-center rounded-full text-[#0b2046] transition hover:bg-[#f8fafc]">
        <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
      </a>

      @if(!session('is_logged_in'))
        <a href="/auth" class="px-4 py-2 text-sm font-semibold text-[#0b2046] hover:bg-[#f8fafc] rounded-full transition inline-block">Masuk</a>
        <a href="/auth?mode=register" class="px-5 py-2 text-sm font-semibold bg-[#E5B044] text-[#0b2046] hover:opacity-90 rounded-full transition inline-block">Daftar</a>
      @endif

      @if(session('is_logged_in'))
        <div class="relative ml-2">
          <button onclick="toggleProfileDropdown()" id="btnProfile" class="flex items-center gap-2 rounded-full border border-[#e2e8f0] p-1 pr-3 transition hover:bg-[#f8fafc] focus:bg-[#f8fafc]">
            <img src="https://ui-avatars.com/api/?name=Andika+Dwi&background=0b2046&color=fff" alt="Avatar" class="h-8 w-8 rounded-full object-cover shadow-sm">
            <span class="text-sm font-semibold text-[#0b2046]">Andika Dwi</span>
            <svg class="h-4 w-4 text-[#64748b]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
          </button>
          
          <div id="profileDropdown" class="absolute right-0 top-full mt-2 hidden w-56 rounded-2xl border border-[#e2e8f0] bg-white py-2 shadow-[0_10px_40px_-10px_rgba(11,42,85,0.2)]">
            <div class="px-4 py-2 mb-1">
               <p class="text-xs text-[#64748b]">Masuk sebagai</p>
               <p class="text-sm font-bold text-[#0b2046] truncate">andika@email.com</p>
            </div>
            <hr class="border-[#e2e8f0] mb-1">
            <a href="/akun" class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-[#0b2046] transition hover:bg-[#f8fafc] hover:text-[#E5B044]">
               <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
               Akun Saya
            </a>
            <a href="/kontrak" class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-[#0b2046] transition hover:bg-[#f8fafc] hover:text-[#E5B044]">
               <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
               Kontrak Kos
            </a>
            <hr class="border-[#e2e8f0] my-1">
            <a href="/dummy-logout" class="flex w-full items-center gap-3 px-5 py-3.5 text-left text-red-500 transition hover:bg-red-50">
              <span class="grid h-9 w-9 place-items-center rounded-xl bg-red-50">
                <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
              </span>
              <span class="flex-1 text-sm font-medium">Logout</span>
            </a>
          </div>
        </div>
      @endif
    </div>

    <!-- Mobile Header Actions (HANYA NOTIFIKASI) -->
    <div class="flex items-center gap-2 lg:hidden">
        <!-- Notifikasi Mobile -->
        <button onclick="toggleNotifModal()" aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-[#0b2046] transition hover:bg-[#f8fafc]">
            <svg class="h-[22px] w-[22px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
            <span class="absolute right-2 top-2 h-2.5 w-2.5 rounded-full bg-[#E5B044] ring-2 ring-white"></span>
        </button>
        <!-- Ikon Garis Tiga (Hamburger) Telah Dihapus Secara Permanen -->
    </div>
  </div>
</header>

<!-- ================= MOBILE BOTTOM NAVIGATION BAR ================= -->
<nav class="fixed bottom-0 left-0 right-0 z-50 flex h-[68px] w-full items-center justify-between border-t border-[#e2e8f0] bg-white px-2 pb-[env(safe-area-inset-bottom)] shadow-[0_-5px_20px_rgba(11,32,70,0.05)] lg:hidden">
    
    <!-- 1. Beranda -->
    <a href="/" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('/') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="text-[10px] font-semibold">Beranda</span>
    </a>

    <!-- 2. Cari Kos -->
    <a href="/cari-kos" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('cari-kos') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class="text-[10px] font-semibold">Cari Kos</span>
    </a>

    <!-- 3. Layanan -->
    <a href="/layanan" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('layanan') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
        </svg>
        <span class="text-[10px] font-semibold">Layanan</span>
    </a>

    <!-- 4. Pesan -->
    <a href="/pesan" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('pesan') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <span class="text-[10px] font-semibold">Pesan</span>
    </a>

    <!-- 5. Akun (Dinamis: Jika Login ke /akun, Jika belum ke /auth) -->
    @if(session('is_logged_in'))
      <a href="/akun" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('akun') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-[10px] font-semibold">Profil</span>
      </a>
    @else
      <a href="/auth" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('auth') ? 'text-[#E5B044]' : 'text-[#64748b] hover:text-[#0b2046]' }}">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-[10px] font-semibold">Masuk</span>
      </a>
    @endif

</nav>

<!-- Beri bantalan bawah (padding-bottom) khusus untuk mobile -->
<main class="bg-white pb-24 lg:pb-0">

<!-- ================= MODAL PILIH LOKASI ================= -->
<div id="locationModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
  <div class="absolute inset-0 bg-[#0b2046]/50 backdrop-blur-sm" onclick="toggleLocationModal()"></div>
  
  <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-sm flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
    <div class="flex items-start justify-between gap-4 border-b border-[#e2e8f0] px-6 py-5">
      <h3 class="font-display text-lg font-bold text-[#0b2046]">Pilih Kampus</h3>
      <button onclick="toggleLocationModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>

    <div class="flex-1 overflow-y-auto px-6 py-5">
      <div class="space-y-2" id="locationList"></div>
    </div>
  </div>
</div>

<!-- ================= MODAL NOTIFIKASI ================= -->
<div id="notifModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
  <div class="absolute inset-0 bg-[#0b2046]/50 backdrop-blur-sm" onclick="toggleNotifModal()"></div>
  
  <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-lg flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
    <div class="flex items-start justify-between gap-4 border-b border-[#e2e8f0] px-6 py-5">
      <h3 class="font-display text-lg font-bold text-[#0b2046]">Notifikasi</h3>
      <button onclick="toggleNotifModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>

    <div class="flex-1 overflow-y-auto px-6 py-5">
      <div class="space-y-3" id="notifList"></div>
    </div>
  </div>
</div>

<!-- ================= SMOOTH LOADING OVERLAY ================= -->
<div id="pageLoader" class="fixed inset-0 z-[999] flex flex-col items-center justify-center bg-white/95 backdrop-blur-md transition-all duration-1000 ease-out opacity-100 scale-100">
    <div class="relative flex flex-col items-center">
        <img src="/kosankampus.png" alt="Memuat KOKA..." class="h-14 sm:h-16 w-auto object-contain mix-blend-multiply animate-pulse" />
        <div class="mt-6 flex items-center gap-2">
            <div class="h-2.5 w-2.5 rounded-full bg-[#E5B044] animate-bounce" style="animation-delay: -0.3s;"></div>
            <div class="h-2.5 w-2.5 rounded-full bg-[#0b2046] animate-bounce" style="animation-delay: -0.15s;"></div>
            <div class="h-2.5 w-2.5 rounded-full bg-[#64748b] animate-bounce"></div>
        </div>
    </div>
</div>

<!-- ================= SCRIPTS ================= -->
<script>
    // 1. Profil Dropdown (Desktop)
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    }
    
    window.addEventListener('click', function(e) {
        const btnProfile = document.getElementById('btnProfile');
        const dropdown = document.getElementById('profileDropdown');
        if (btnProfile && dropdown && !btnProfile.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // 2. LOGIKA MODAL LOKASI
    const locOptions = ["Telkom University", "Institut Teknologi Bandung", "Universitas Pendidikan Indonesia", "Universitas Padjajaran", "Universitas Terbuka"];
    let currentLocation = "Bandung";

    function renderLocationList() {
        const listContainer = document.getElementById('locationList');
        if (!listContainer) return;
        
        listContainer.innerHTML = ''; 

        locOptions.forEach(city => {
            const isActive = city === currentLocation;
            const btnClass = isActive ? "border-[#0b2046] bg-[#f8fafc]" : "border-[#e2e8f0] hover:bg-[#f8fafc]";
            const iconColor = isActive ? "text-[#E5B044]" : "text-[#64748b]";
            const checkIcon = isActive ? `<svg class="h-4 w-4 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>` : '';

            const btnHTML = `
                <button onclick="selectLocation('${city}')" class="flex w-full items-center gap-3 rounded-xl border ${btnClass} p-3.5 text-left transition">
                    <svg class="h-5 w-5 ${iconColor}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                    <span class="flex-1 text-sm font-medium text-[#0b2046]">${city}</span>
                    ${checkIcon}
                </button>
            `;
            listContainer.innerHTML += btnHTML;
        });
    }

    function toggleLocationModal() {
        const modal = document.getElementById('locationModal');
        if (modal.classList.contains('hidden')) {
            renderLocationList(); 
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    function selectLocation(city) {
        currentLocation = city; 
        if(document.getElementById('desktopLocText')) document.getElementById('desktopLocText').innerText = city;
        if(document.getElementById('heroLocText')) document.getElementById('heroLocText').innerText = city;
        toggleLocationModal();
    }

    document.addEventListener("DOMContentLoaded", () => {
        renderLocationList();
    });

    // 3. LOGIKA MODAL NOTIFIKASI
    const notifs = [
        { 
            title: "Pembayaran kos jatuh tempo", 
            desc: "Tagihan September jatuh tempo 10 Sep.", 
            link: "/bayar-kos", 
            icon: `<svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>` 
        },
        { 
            title: "Pesanan KosanClean diterima", 
            desc: "Petugas dijadwalkan besok pukul 10.00.", 
            link: "/chat", 
            icon: `<svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>` 
        },
        { 
            title: "Promo baru untuk kamu", 
            desc: "Diskon 20% sewa pertama, cek sekarang!", 
            link: "/promo", 
            icon: `<svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" /></svg>` 
        },
        { 
            title: "Kontrak akan berakhir", 
            desc: "Kontrak berakhir 31 Agu 2026.", 
            link: "/kontrak", 
            icon: `<svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>` 
        }
    ];

    function renderNotifList() {
        const listContainer = document.getElementById('notifList');
        if (!listContainer) return;
        listContainer.innerHTML = ''; 

        notifs.forEach(n => {
            const html = `
                <a href="${n.link}" class="flex w-full items-start gap-3 rounded-xl border border-[#e2e8f0] p-3.5 text-left transition hover:bg-[#f8fafc]">
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046]">
                        ${n.icon}
                    </span>
                    <div>
                        <div class="text-sm font-semibold text-[#0b2046]">${n.title}</div>
                        <div class="text-xs text-[#64748b]">${n.desc}</div>
                    </div>
                </a>
            `;
            listContainer.innerHTML += html;
        });
    }

    function toggleNotifModal() {
        const modal = document.getElementById('notifModal');
        if (modal.classList.contains('hidden')) {
            renderNotifList(); 
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    // 4. LAYAR LOADING SMOOTH & SCROLL FREEZE
    document.addEventListener("DOMContentLoaded", () => {
        const loader = document.getElementById('pageLoader');
        if (!loader) return;

        function preventScroll(e) { e.preventDefault(); }
        function preventKeyScroll(e) {
            if (["Space", "ArrowUp", "ArrowDown", "PageUp", "PageDown"].includes(e.code)) {
                e.preventDefault();
            }
        }

        function lockScroll() {
            document.body.style.pointerEvents = 'none'; 
            window.addEventListener('wheel', preventScroll, { passive: false }); 
            window.addEventListener('touchmove', preventScroll, { passive: false }); 
            window.addEventListener('keydown', preventKeyScroll, { passive: false }); 
        }

        function unlockScroll() {
            document.body.style.pointerEvents = '';
            window.removeEventListener('wheel', preventScroll);
            window.removeEventListener('touchmove', preventScroll);
            window.removeEventListener('keydown', preventKeyScroll);
        }

        function hideLoader() {
            setTimeout(() => {
                loader.classList.remove('opacity-100', 'scale-100');
                loader.classList.add('opacity-0', 'scale-110', 'pointer-events-none');
                
                setTimeout(() => {
                    loader.classList.add('hidden');
                    unlockScroll(); 
                }, 1000); 
            }, 50);
        }

        if (document.readyState === 'complete') {
            hideLoader();
        } else {
            window.addEventListener('load', hideLoader);
        }

        document.addEventListener('click', (e) => {
            const target = e.target.closest('a');
            if (target && target.href) {
                const isAnchor = target.getAttribute('href').startsWith('#');
                const isNewTab = target.target === '_blank';
                const isJavascript = target.href.includes('javascript:');
                const isInternal = target.host === window.location.host; 

                if (!isAnchor && !isNewTab && !isJavascript && isInternal) {
                    e.preventDefault(); 
                    lockScroll(); 

                    loader.classList.remove('hidden', 'pointer-events-none');
                    requestAnimationFrame(() => {
                        loader.classList.remove('opacity-0', 'scale-110');
                        loader.classList.add('opacity-100', 'scale-100');
                    });

                    setTimeout(() => {
                        window.location.href = target.href;
                    }, 800);
                }
            }
        });

        document.addEventListener('submit', (e) => {
            lockScroll(); 
            loader.classList.remove('hidden', 'pointer-events-none');
            requestAnimationFrame(() => {
                loader.classList.remove('opacity-0', 'scale-110');
                loader.classList.add('opacity-100', 'scale-100');
            });
        });

        window.addEventListener('beforeunload', () => {
            lockScroll(); 
            loader.classList.remove('hidden', 'pointer-events-none');
            loader.classList.remove('opacity-0', 'scale-110');
            loader.classList.add('opacity-100', 'scale-100');
        });

        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                hideLoader(); 
            }
        });
    });
</script>