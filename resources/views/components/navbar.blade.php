<!-- resources/views/components/navbar.blade.php -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Script OneSignal SDK (Pengganti VAPID & sw.js manual) 
<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
  window.OneSignalDeferred = window.OneSignalDeferred || [];
  OneSignalDeferred.push(async function(OneSignal) {
    await OneSignal.init({
      appId: "{{ env('ONESIGNAL_APP_ID') }}",
    });
    
    // Daftarkan ID User ke OneSignal agar target push notifikasi spesifik
    @auth
        OneSignal.login("{{ auth()->id() }}");
    @else
        OneSignal.logout();
    @endauth
  });
</script>
-->

<!-- ================= LOADING SCREEN (Logo & 3 Titik) ================= -->
<div id="page-loader" class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-white transition-opacity duration-500">
    <!-- Logo -->
    <img src="/kosankampus.png" alt="Kosan Kampus" class="h-20 sm:h-24 w-auto object-contain mix-blend-multiply" />
    
    <!-- Animasi 3 Titik -->
    <div class="mt-6 flex items-center gap-2">
        <div class="h-3 w-3 rounded-full bg-[#F39C12] animate-bounce" style="animation-delay: -0.3s"></div>
        <div class="h-3 w-3 rounded-full bg-[#522b89] animate-bounce" style="animation-delay: -0.15s"></div>
        <div class="h-3 w-3 rounded-full bg-[#F39C12] animate-bounce"></div>
    </div>
</div>
<!-- ================================================================= -->

<header class="sticky top-0 z-40 border-b border-[#e2e8f0] bg-white/90 backdrop-blur-md">
  <div class="mx-auto flex h-16 max-w-[1280px] items-center justify-between gap-4 px-4 sm:px-6 lg:h-[72px]">
    
    <!-- Logo Kosan Kampus -->
    <a href="/" class="flex items-center shrink-0">
        <img src="/kosankampus.png" alt="Logo Kosan Kampus" class="h-[120px] w-auto object-contain mix-blend-multiply" />
    </a>

    <!-- Navigasi Desktop -->
    <nav class="hidden items-center gap-1 lg:flex">
        <a href="/" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('/') ? 'bg-[#f8fafc] text-[#522b89]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#522b89]' }}">
            Beranda
        </a>
        <a href="/tentang-kami" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('tentang-kami') ? 'bg-[#f8fafc] text-[#522b89]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#522b89]' }}">
            Tentang Kami
        </a>
        <a href="/cari-kos" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('cari-kos') ? 'bg-[#f8fafc] text-[#522b89]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#522b89]' }}">
            Cari Kos
        </a>
        <a href="/layanan" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('layanan') ? 'bg-[#f8fafc] text-[#522b89]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#522b89]' }}">
            Layanan
        </a>
        <a href="/artikel" class="rounded-full px-3.5 py-2 text-sm font-medium transition {{ request()->is('artikel') ? 'bg-[#f8fafc] text-[#522b89]' : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#522b89]' }}">
            Berita
        </a>
    </nav>

    <!-- Menu Kanan Desktop -->
    <div class="hidden items-center gap-2 lg:flex">
      
      <!-- TOMBOL BARU: Daftarkan Kos -->
      <a href="/mitra-kos" class="mr-1 rounded-full border border-[#522b89] px-4 py-1.5 text-sm font-semibold text-[#522b89] transition hover:bg-[#522b89] hover:text-white {{ request()->is('mitra-kos') ? 'bg-[#522b89] text-white' : '' }}">
          Daftarkan Kos
      </a>

      @php
          $isLoggedIn = Auth::check();
          $userName = $isLoggedIn ? (Auth::user()->nama ?? Auth::user()->name ?? 'Pengguna') : '';
          
          // Ambil 5 notifikasi terbaru untuk list modal
          $notifikasis = $isLoggedIn ? Auth::user()->notifikasis()->latest()->take(5)->get() : collect([]);
          
          // Hitung TOTAL keseluruhan yang belum dibaca dari database
          $unreadCount = $isLoggedIn ? Auth::user()->notifikasis()->where('is_read', 0)->count() : 0;
      @endphp

      <!-- Icon Notifikasi Desktop -->
      <button onclick="toggleNotifModal()" aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-[#522b89] transition hover:bg-[#f8fafc] cursor-pointer">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
        @if($unreadCount > 0)
            <span class="notif-badge absolute right-2.5 top-2.5 grid h-3.5 w-3.5 place-items-center rounded-full bg-red-500 ring-2 ring-white text-[8px] font-bold text-white">{{ $unreadCount }}</span>
        @endif
      </button>

      <!-- Icon Pesan (Arah ke WhatsApp) -->
      <a href="https://wa.me/6282116530496" target="_blank" aria-label="Pesan" class="grid h-10 w-10 place-items-center rounded-full text-[#522b89] transition hover:bg-[#f8fafc]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 256 256">
            <path d="M128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path>
        </svg>
      </a>

      @auth
        <!-- Ikon Profil Navbar -->
        <a href="/akun" class="ml-2 flex items-center gap-2">
            @if(Auth::user()->avatar)
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="h-10 w-10 rounded-full object-cover border-2 border-[#522b89] p-0.5 shadow-sm hover:scale-105 transition" title="{{ $userName }}">
            @else
              <div class="grid h-10 w-10 place-items-center rounded-full bg-[#522b89] font-display text-sm font-bold text-[#F39C12] shadow-sm hover:scale-105 hover:bg-[#3f1d6e] transition" title="{{ $userName }}">
                {{ strtoupper(substr($userName, 0, 2)) }}
              </div>
            @endif
        </a>
      @else
        <!-- TOMBOL MASUK -->
        <a href="/auth" class="group relative overflow-hidden px-5 py-2 text-sm font-semibold bg-[#522b89] text-white rounded-full transition-all inline-block ml-1 shadow-sm">
            <div class="absolute left-0 top-0 h-full w-full translate-y-[150%] transition-transform duration-[600ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[15px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#F39C12" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#F39C12]"></div>
            </div>
            <span class="relative z-10 transition-colors duration-[600ms] group-hover:text-[#522b89]">Masuk</span>
        </a>

        <!-- TOMBOL DAFTAR -->
        <a href="/auth?mode=register" class="group relative overflow-hidden px-6 py-2 text-sm font-semibold bg-[#F39C12] text-[#522b89] rounded-full transition-all inline-block shadow-sm">
            <div class="absolute left-0 top-0 h-full w-full translate-y-[150%] transition-transform duration-[600ms] ease-in-out group-hover:translate-y-0 z-0">
                <svg class="absolute bottom-[99%] left-0 w-[200%] h-[15px]" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#522b89" d="M0,128L48,144C96,160,192,192,288,181.3C384,171,480,117,576,112C672,107,768,149,864,165.3C960,181,1056,171,1152,144C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="h-full w-full bg-[#522b89]"></div>
            </div>
            <span class="relative z-10 transition-colors duration-[600ms] group-hover:text-white">Daftar</span>
        </a>
      @endauth
    </div>

    <!-- Mobile Header Actions -->
    <div class="flex items-center gap-2 lg:hidden">
        <!-- TOMBOL BARU MOBILE: Daftarkan Kos -->
        <a href="/mitra-kos" class="rounded-full border border-[#522b89] px-3 py-1 text-xs font-semibold text-[#522b89] transition hover:bg-[#522b89] hover:text-white {{ request()->is('mitra-kos') ? 'bg-[#522b89] text-white' : '' }}">
            Daftarkan Kos
        </a>

        <button onclick="toggleNotifModal()" aria-label="Notifikasi" class="relative grid h-10 w-10 place-items-center rounded-full text-[#522b89] transition hover:bg-[#f8fafc] cursor-pointer">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
            @if(isset($unreadCount) && $unreadCount > 0)
                <span class="notif-badge absolute right-2 top-2 grid h-3.5 w-3.5 place-items-center rounded-full bg-red-500 ring-2 ring-white text-[8px] font-bold text-white">{{ $unreadCount }}</span>
            @endif
        </button>
    </div>
  </div>
</header>

<!-- ================= MOBILE BOTTOM NAVIGATION BAR ================= -->
<nav class="fixed bottom-0 left-0 right-0 z-50 flex h-[68px] w-full items-center justify-between border-t border-[#e2e8f0] bg-white px-2 pb-[env(safe-area-inset-bottom)] shadow-[0_-5px_20px_rgba(82,43,137,0.05)] lg:hidden">
    
    <a href="/" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('/') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
        <span class="text-[10px] font-semibold">Beranda</span>
    </a>

    <a href="/cari-kos" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('cari-kos') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
        <span class="text-[10px] font-semibold">Cari Kos</span>
    </a>

    <a href="/layanan" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('layanan') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
        <span class="text-[10px] font-semibold">Layanan</span>
    </a>

    <a href="/artikel" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('artikel') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span class="text-[10px] font-semibold">Berita</span>
    </a>

    @auth
      <a href="/akun" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('akun') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
          @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="h-6 w-6 rounded-full object-cover border border-[#522b89] p-[1px]">
          @else
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          @endif
          <span class="text-[10px] font-semibold">Profil</span>
      </a>
    @else
      <a href="/auth" class="flex h-full w-full flex-col items-center justify-center gap-1 transition-colors {{ request()->is('auth') ? 'text-[#F39C12]' : 'text-[#64748b] hover:text-[#522b89]' }}">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-[10px] font-semibold">Masuk</span>
      </a>
    @endauth
</nav>

<!-- ================= MODAL NOTIFIKASI (Popup) ================= -->
<div id="notifModal" class="fixed inset-0 z-[110] hidden items-center justify-center transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleNotifModal()"></div>
    
    <div class="relative w-[90%] max-w-lg rounded-2xl bg-white shadow-2xl p-6 sm:p-8 animate-in zoom-in-95 duration-300">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <h3 class="text-xl font-bold text-[#522b89]">Notifikasi</h3>
            <button onclick="toggleNotifModal()" class="text-slate-400 hover:text-slate-700 transition cursor-pointer">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        
        <div id="notifContainer" class="space-y-4 max-h-[60vh] overflow-y-auto pr-2">
            @auth
                @forelse($notifikasis as $notif)
                <div id="notif-item-{{ $notif->id }}" class="relative group flex items-start gap-4 rounded-xl border {{ $notif->is_read ? 'border-slate-100 bg-white' : 'border-purple-100 bg-purple-50/50' }} p-4 transition-all duration-300 hover:bg-slate-50">
                    
                    <!-- Area Klik untuk Membaca Notif -->
                    <a href="{{ route('notifikasi.read', $notif->id) }}" class="flex-1 flex items-start gap-4 cursor-pointer">
                        <div class="grid h-10 w-10 shrink-0 place-items-center rounded-full {{ $notif->is_read ? 'bg-slate-100 text-slate-500' : 'bg-[#522b89] text-[#F39C12]' }}">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        </div>
                        <div class="pr-8">
                            <h4 class="text-sm font-bold text-[#522b89]">{{ $notif->judul }}</h4>
                            <p class="text-xs text-slate-500 mt-1">{{ $notif->pesan }}</p>
                            <p class="mt-1 text-[10px] text-slate-400">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                    </a>

                    <!-- Tombol Hapus Real-time -->
                    <button type="button" 
                            onclick="deleteNotif(event, {{ $notif->id }})" 
                            class="absolute right-3 top-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg cursor-pointer" 
                            title="Hapus Notifikasi">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
                @empty
                <div id="emptyNotifMsg" class="text-center py-6">
                    <p class="text-sm text-slate-500">Belum ada notifikasi saat ini.</p>
                </div>
                @endforelse

                @if($notifikasis->count() > 0)
                <div id="seeMoreBtn" class="pt-2 text-center">
                    <a href="{{ route('user.notifikasi') }}" class="inline-block w-full rounded-xl bg-slate-100 py-2.5 text-xs font-bold text-[#522b89] transition hover:bg-purple-50">
                        Lihat Selengkapnya &rarr;
                    </a>
                </div>
                @endif

            @else
                <div class="text-center py-6">
                    <p class="text-sm text-slate-500">Silakan masuk untuk melihat notifikasi Anda.</p>
                </div>
            @endauth
        </div>
    </div>
</div>

<x-toast-notification />

<script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('page-loader');
        if (loader) {
            loader.classList.add('opacity-0');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 500); 
        }
    });

    function toggleNotifModal() {
        const modal = document.getElementById('notifModal');
        if (modal) {
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    }

    // ================= FUNGSI HAPUS NOTIFIKASI REALTIME =================
    function deleteNotif(event, notifId) {
        event.preventDefault();
        event.stopPropagation();

        const notifElement = document.getElementById(`notif-item-${notifId}`);
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        const token = tokenMeta ? tokenMeta.getAttribute('content') : '';

        fetch(`/notifikasi/${notifId}/hapus`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw new Error(err.message || 'Rute tidak ditemukan') });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                if (notifElement) {
                    notifElement.style.opacity = '0';
                    notifElement.style.transform = 'scale(0.95)';
                    
                    setTimeout(() => {
                        notifElement.remove();

                        const container = document.getElementById('notifContainer');
                        const remainingItems = container.querySelectorAll('[id^="notif-item-"]');
                        
                        if (remainingItems.length === 0) {
                            const seeMoreBtn = document.getElementById('seeMoreBtn');
                            if (seeMoreBtn) seeMoreBtn.remove();

                            container.innerHTML = `
                                <div id="emptyNotifMsg" class="text-center py-6">
                                    <p class="text-sm text-slate-500">Belum ada notifikasi saat ini.</p>
                                </div>
                            `;
                        }
                    }, 300);
                }

                // Update Lencana Angka
                const badgeElements = document.querySelectorAll('.notif-badge');
                badgeElements.forEach(badge => {
                    if (data.unread_count > 0) {
                        badge.innerText = data.unread_count;
                    } else {
                        badge.remove();
                    }
                });
            } else {
                alert('Sistem menolak penghapusan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error deleting notification:', error);
            alert('Gagal menghubungi server. Pastikan Anda tidak sedang offline.');
        });
    }
</script>