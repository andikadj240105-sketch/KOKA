<header class="sticky top-0 z-40 border-b border-line bg-white/90 backdrop-blur-md">
  <div class="mx-auto flex h-16 max-w-[1280px] items-center justify-between gap-4 px-4 sm:px-6 lg:h-[72px]">
    
    <!-- Logo Kosan Kampus -->
    <a href="/" class="flex items-center shrink-0">
        <img src="/kosankampus.png" alt="Logo Kosan Kampus" class="h-[100px] lg:h-[120px] w-auto object-contain mix-blend-multiply" />
    </a>

    <!-- Navigasi Desktop -->
    <nav class="hidden items-center gap-1 lg:flex">
        <!-- Logika Blade: Jika URL aktif, beri background bg-cloud. Jika tidak, transparan & hover -->
        <a href="/" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('/') ? 'bg-cloud text-navy' : 'text-slate hover:bg-cloud hover:text-navy' }}">
            Beranda
        </a>
        
        <a href="/cari-kos" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('cari-kos') ? 'bg-cloud text-navy' : 'text-slate hover:bg-cloud hover:text-navy' }}">
            Cari Kos
        </a>
        
        <a href="/layanan" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('layanan') ? 'bg-cloud text-navy' : 'text-slate hover:bg-cloud hover:text-navy' }}">
            Layanan
        </a>
        
        <a href="/promo" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('promo') ? 'bg-cloud text-navy' : 'text-slate hover:bg-cloud hover:text-navy' }}">
            Promo
        </a>
        
        <a href="/tentang-kami" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('tentang-kami') ? 'bg-cloud text-navy' : 'text-slate hover:bg-cloud hover:text-navy' }}">
            Tentang Kami
        </a>
    </nav>

    <!-- Menu Kanan Desktop -->
    <div class="hidden items-center gap-2 lg:flex">
      <!-- Lokasi (Ditambahkan onclick dan ID) -->
      <button onclick="toggleLocationModal()" class="flex items-center gap-1.5 rounded-full px-2.5 py-2 text-sm font-medium text-navy transition hover:bg-cloud">
        <svg class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
        <span id="desktopLocText">Bandung</span>
        <svg class="h-3.5 w-3.5 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
      </button>
      
      <!-- Notifikasi (Ditambahkan onclick) -->
      <button onclick="toggleNotifModal()" aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-navy transition hover:bg-cloud">
        <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
        <span class="absolute right-2.5 top-2.5 h-2 w-2 rounded-full bg-gold ring-2 ring-white"></span>
      </button>

      <!-- Pesan -->
      <button aria-label="Pesan" class="grid h-10 w-10 place-items-center rounded-full text-navy transition hover:bg-cloud">
        <svg class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
      </button>

      <!-- ================= LOGIKA AUTH DESKTOP ================= -->
      @if(!session('is_logged_in'))
        <a href="/auth" class="px-4 py-2 text-sm font-semibold text-navy hover:bg-cloud rounded-full transition inline-block">Masuk</a>
        <a href="/auth?mode=register" class="px-5 py-2 text-sm font-semibold bg-gold text-navy hover:opacity-90 rounded-full transition inline-block">Daftar</a>
      @endif

      @if(session('is_logged_in'))
        <div class="relative ml-2">
          <!-- Tombol Profil -->
          <button onclick="toggleProfileDropdown()" id="btnProfile" class="flex items-center gap-2 rounded-full border border-line p-1 pr-3 transition hover:bg-cloud focus:bg-cloud">
            <img src="https://ui-avatars.com/api/?name=Andika+Dwi&background=0b2046&color=fff" alt="Avatar" class="h-8 w-8 rounded-full object-cover shadow-sm">
            <span class="text-sm font-semibold text-navy">Andika Dwi</span>
            <svg class="h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
          </button>
          
          <!-- Dropdown Menu -->
          <div id="profileDropdown" class="absolute right-0 top-full mt-2 hidden w-56 rounded-2xl border border-line bg-white py-2 shadow-[0_10px_40px_-10px_rgba(11,42,85,0.2)]">
            <div class="px-4 py-2 mb-1">
               <p class="text-xs text-slate">Masuk sebagai</p>
               <p class="text-sm font-bold text-navy truncate">andika@email.com</p>
            </div>
            <hr class="border-line mb-1">
            <a href="/akun" class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-navy transition hover:bg-cloud hover:text-gold">
               <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
               Akun Saya
            </a>
            <a href="/kontrak" class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-navy transition hover:bg-cloud hover:text-gold">
               <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
               Kontrak Kos
            </a>
            <hr class="border-line my-1">
            
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

    <!-- Mobile Menu Button -->
    <button onclick="toggleMobileMenu()" aria-label="Menu" class="grid h-11 w-11 place-items-center rounded-xl border border-line text-navy lg:hidden">
      <svg id="menuIconOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
      <svg id="menuIconClose" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
  </div>

  <!-- ================= MOBILE DRAWER ================= -->
  <div id="mobileDrawer" class="hidden border-t border-line bg-white lg:hidden">
    <div class="mx-auto max-w-[1280px] space-y-1 px-4 py-4 sm:px-6">
      
      <!-- Lokasi Mobile (Ditambahkan onclick dan ID) -->
      <button onclick="toggleLocationModal()" class="mb-2 flex w-full items-center gap-2 rounded-xl bg-cloud px-4 py-3 text-sm font-medium text-navy">
        <svg class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
        <span id="mobileLocText">Bandung</span>
        <svg class="ml-auto h-4 w-4 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
      </button>
      
      <!-- Navigasi Mobile -->
      <a href="/" class="block w-full rounded-xl px-4 py-3 text-left text-sm font-medium transition {{ request()->is('/') ? 'bg-cloud text-navy' : 'text-navy hover:bg-cloud' }}">Beranda</a>
      <a href="/cari-kos" class="block w-full rounded-xl px-4 py-3 text-left text-sm font-medium transition {{ request()->is('cari-kos') ? 'bg-cloud text-navy' : 'text-navy hover:bg-cloud' }}">Cari Kos</a>
      <a href="/layanan" class="block w-full rounded-xl px-4 py-3 text-left text-sm font-medium transition {{ request()->is('layanan') ? 'bg-cloud text-navy' : 'text-navy hover:bg-cloud' }}">Layanan</a>
      <a href="/promo" class="block w-full rounded-xl px-4 py-3 text-left text-sm font-medium transition {{ request()->is('promo') ? 'bg-cloud text-navy' : 'text-navy hover:bg-cloud' }}">Promo</a>
      <a href="/tentang-kami" class="block w-full rounded-xl px-4 py-3 text-left text-sm font-medium transition {{ request()->is('tentang-kami') ? 'bg-cloud text-navy' : 'text-navy hover:bg-cloud' }}">Tentang Kami</a>
      
      <!-- ================= LOGIKA AUTH MOBILE ================= -->
      <!-- Diubah agar sinkron dengan dummy session Desktop -->
      @if(!session('is_logged_in'))
        <div class="grid grid-cols-2 gap-3 pt-3">
          <a href="/auth" class="flex items-center justify-center rounded-xl border border-line px-4 py-2.5 text-sm font-semibold text-navy transition hover:bg-cloud">Masuk</a>
          <a href="/auth?mode=register" class="flex items-center justify-center rounded-xl bg-gold px-4 py-2.5 text-sm font-semibold text-navy transition hover:opacity-90">Daftar</a>
        </div>
      @endif

      @if(session('is_logged_in'))
        <div class="pt-3 border-t border-line mt-2">
          <!-- Info Profil Mobile -->
          <a href="/akun" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-navy transition hover:bg-cloud">
             <img src="https://ui-avatars.com/api/?name=Andika+Dwi&background=0b2046&color=fff" alt="Avatar" class="h-9 w-9 rounded-full object-cover shadow-sm">
             <div>
                <p class="font-bold">Andika Dwi</p>
                <p class="text-xs text-slate">andika@email.com</p>
             </div>
          </a>
          <!-- Logout Mobile Dummy -->
          <a href="/dummy-logout" class="mt-2 flex w-full items-center justify-center rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100">
            Keluar
          </a>
        </div>
      @endif
      
    </div>
  </div>
</header>
  <!-- ================= MODAL PILIH LOKASI ================= -->
  <div id="locationModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
    <!-- Latar Belakang Gelap (Backdrop) -->
    <div class="absolute inset-0 bg-navy/50 backdrop-blur-sm" onclick="toggleLocationModal()"></div>
    
    <!-- Kotak Modal -->
    <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-sm flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
      
      <!-- Header Modal -->
      <div class="flex items-start justify-between gap-4 border-b border-line px-6 py-5">
        <h3 class="font-display text-lg font-bold text-navy">Pilih Lokasi</h3>
        <button onclick="toggleLocationModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-cloud text-navy transition hover:bg-line">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <!-- Isi Modal (Daftar Kota) -->
      <div class="flex-1 overflow-y-auto px-6 py-5">
        <div class="space-y-2" id="locationList">
          <!-- Tombol Kota akan dibuat oleh JavaScript -->
        </div>
      </div>
    </div>
  </div>

  <!-- ================= MODAL NOTIFIKASI ================= -->
<div id="notifModal" class="fixed inset-0 z-[70] hidden items-end justify-center sm:items-center transition-opacity">
  
  <!-- Latar Belakang Gelap (Backdrop) -->
  <div class="absolute inset-0 bg-navy/50 backdrop-blur-sm" onclick="toggleNotifModal()"></div>
  
  <!-- Kotak Modal (Ukurannya dibuat max-w-lg agar lebih lebar dan lega) -->
  <div role="dialog" aria-modal="true" class="relative flex max-h-[92vh] w-full max-w-lg flex-col overflow-hidden rounded-t-3xl bg-white shadow-2xl sm:rounded-3xl animate-in-up">
    
    <!-- Header Modal -->
    <div class="flex items-start justify-between gap-4 border-b border-line px-6 py-5">
      <h3 class="font-display text-lg font-bold text-navy">Notifikasi</h3>
      <button onclick="toggleNotifModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-cloud text-navy transition hover:bg-line">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>

    <!-- Isi Modal (Daftar Notifikasi) -->
    <div class="flex-1 overflow-y-auto px-6 py-5">
      <div class="space-y-3" id="notifList">
        <!-- Notifikasi akan dibuat oleh JavaScript -->
      </div>
    </div>
  </div>
</div>

<!-- ================= SMOOTH LOADING OVERLAY ================= -->
<div id="pageLoader" class="fixed inset-0 z-[999] flex flex-col items-center justify-center bg-white/95 backdrop-blur-md transition-all duration-1000 ease-out opacity-100 scale-100">
    
    <div class="relative flex flex-col items-center">
        <!-- Logo KOKA -->
        <img src="/kosankampus.png" alt="Memuat KOKA..." class="h-14 sm:h-16 w-auto object-contain mix-blend-multiply animate-pulse" />
        
        <!-- Animasi 3 Titik -->
        <div class="mt-6 flex items-center gap-2">
            <div class="h-2.5 w-2.5 rounded-full bg-gold animate-bounce" style="animation-delay: -0.3s;"></div>
            <div class="h-2.5 w-2.5 rounded-full bg-navy animate-bounce" style="animation-delay: -0.15s;"></div>
            <div class="h-2.5 w-2.5 rounded-full bg-slate animate-bounce"></div>
        </div>
    </div>

</div>s

<!-- Skrip Vanilla JS untuk interaksi Menu, Dropdown, dan Modal Lokasi -->
<script>
    // 1. Fungsi Buka/Tutup Menu Mobile
    function toggleMobileMenu() {
        const drawer = document.getElementById('mobileDrawer');
        const iconOpen = document.getElementById('menuIconOpen');
        const iconClose = document.getElementById('menuIconClose');
        
        if (drawer.classList.contains('hidden')) {
            drawer.classList.remove('hidden');    
            iconOpen.classList.add('hidden');     
            iconClose.classList.remove('hidden'); 
        } else {
            drawer.classList.add('hidden');       
            iconOpen.classList.remove('hidden');  
            iconClose.classList.add('hidden');    
        }
    }

    // 2. Fungsi Buka/Tutup Profil Dropdown (Desktop)
    function toggleProfileDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        if (dropdown) {
            dropdown.classList.toggle('hidden');
        }
    }
    
    // Menutup dropdown otomatis jika klik di luar area tombol profil
    window.addEventListener('click', function(e) {
        const btnProfile = document.getElementById('btnProfile');
        const dropdown = document.getElementById('profileDropdown');
        if (btnProfile && dropdown && !btnProfile.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // 3. LOGIKA MODAL LOKASI
    const locOptions = ["Bandung", "Jakarta", "Yogyakarta", "Surabaya", "Malang"];
    let currentLocation = "Bandung";

    function renderLocationList() {
        const listContainer = document.getElementById('locationList');
        if (!listContainer) return;
        
        listContainer.innerHTML = ''; // Kosongkan daftar sebelumnya

        locOptions.forEach(city => {
            const isActive = city === currentLocation;
            
            const btnClass = isActive ? "border-navy bg-cloud" : "border-line hover:bg-cloud";
            const iconColor = isActive ? "text-gold" : "text-slate";
            const checkIcon = isActive ? `<svg class="h-4 w-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>` : '';

            const btnHTML = `
                <button onclick="selectLocation('${city}')" class="flex w-full items-center gap-3 rounded-xl border ${btnClass} p-3.5 text-left transition">
                    <svg class="h-5 w-5 ${iconColor}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                    <span class="flex-1 text-sm font-medium text-navy">${city}</span>
                    ${checkIcon}
                </button>
            `;
            listContainer.innerHTML += btnHTML;
        });
    }

    function toggleLocationModal() {
        const modal = document.getElementById('locationModal');
        if (modal.classList.contains('hidden')) {
            renderLocationList(); // Render ulang daftar setiap kali dibuka
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    function selectLocation(city) {
        currentLocation = city; // Simpan kota yang dipilih
        
        // Ubah teks di Navbar Desktop & Mobile
        document.getElementById('desktopLocText').innerText = city;
        document.getElementById('mobileLocText').innerText = city;
        
        // Tutup modal
        toggleLocationModal();
    }

    // Jalankan render lokasi pertama kali saat halaman dimuat
    document.addEventListener("DOMContentLoaded", () => {
        renderLocationList();
    });

    // === LOGIKA MODAL NOTIFIKASI ===
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
                <a href="${n.link}" class="flex w-full items-start gap-3 rounded-xl border border-line p-3.5 text-left transition hover:bg-cloud">
                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-cloud text-navy">
                        ${n.icon}
                    </span>
                    <div>
                        <div class="text-sm font-semibold text-navy">${n.title}</div>
                        <div class="text-xs text-slate">${n.desc}</div>
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

// === LOGIKA LAYAR LOADING SMOOTH (LEBIH LAMBAT & ELEGAN) ===
document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById('pageLoader');
    
    // 1. EFEK HILANG LEBIH LAMBAT SAAT HALAMAN SELESAI DIMUAT
    window.addEventListener('load', () => {
        if (loader) {
            loader.classList.remove('opacity-100', 'scale-100');
            loader.classList.add('opacity-0', 'scale-110', 'pointer-events-none');
            
            // Waktu untuk menghapus elemen diubah jadi 1000ms (1 detik) 
            // agar sesuai dengan duration-1000 di HTML
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 1000); 
        }
    });

    // 2. MUNCULKAN LEBIH LAMA SAAT KLIK MENU
    document.addEventListener('click', (e) => {
        const target = e.target.closest('a');
        
        if (target && target.href) {
            const isAnchor = target.getAttribute('href').startsWith('#');
            const isNewTab = target.target === '_blank';
            const isJavascript = target.href.includes('javascript:');
            const isInternal = target.host === window.location.host; 

            if (!isAnchor && !isNewTab && !isJavascript && isInternal) {
                e.preventDefault(); 
                
                if (loader) {
                    loader.classList.remove('hidden', 'pointer-events-none');
                    requestAnimationFrame(() => {
                        loader.classList.remove('opacity-0', 'scale-110');
                        loader.classList.add('opacity-100', 'scale-100');
                    });
                }

                // Tunda perpindahan halaman jadi 800 milidetik (sebelumnya 400)
                // Ini memberi waktu layar putih menutup sempurna sebelum halamannya dibunuh browser
                setTimeout(() => {
                    window.location.href = target.href;
                }, 800);
            }
        }
    });

    // 3. MUNCULKAN SAAT SUBMIT FORMULIR
    document.addEventListener('submit', (e) => {
        if (loader) {
            loader.classList.remove('hidden', 'pointer-events-none');
            requestAnimationFrame(() => {
                loader.classList.remove('opacity-0', 'scale-110');
                loader.classList.add('opacity-100', 'scale-100');
            });
        }
    });

    // 4. MUNCULKAN SAAT TOMBOL BACK/FORWARD BROWSER DIKLIK ATAU DI-REFRESH
    window.addEventListener('beforeunload', () => {
        if (loader) {
            loader.classList.remove('hidden', 'pointer-events-none');
            loader.classList.remove('opacity-0', 'scale-110');
            loader.classList.add('opacity-100', 'scale-100');
        }
    });

    // 5. ATASI MASALAH CACHE BROWSER (BFCache)
    // Terkadang saat tombol Back diklik, browser memuat halaman dari memori (cache) 
    // dalam keadaan loading masih menyala. Ini akan menyembunyikannya kembali.
    window.addEventListener('pageshow', (event) => {
        if (event.persisted && loader) {
            loader.classList.remove('opacity-100', 'scale-100');
            loader.classList.add('opacity-0', 'scale-110', 'pointer-events-none');
            setTimeout(() => {
                loader.classList.add('hidden');
            }, 1000);
        }
    });
});
</script>