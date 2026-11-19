<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' 'unsafe-eval' data: blob:;">
    <title>Admin Panel - KOKA Property</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased">

  <div class="flex h-screen overflow-hidden bg-slate-50" x-data="{ collapsed: false, mobileOpen: false, notifOpen: false, profileOpen: false }">
    
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Main Content -->
    <div class="flex min-w-0 flex-1 flex-col">
      
      @php
          $userAdmin = Auth::user();$namaAdmin = $userAdmin->nama ?? $userAdmin->name ?? 'Administrator';
          $emailAdmin =$userAdmin->email ?? 'admin@kosan.id';

          $adminUnread = 0;
          $adminListNotifs = collect([]);

          if ($userAdmin) {
              $adminListNotifs = \App\Models\Notifikasi::where('user_id',$userAdmin->id)
                                  ->latest()
                                  ->take(5)
                                  ->get();
              
              $adminUnread = \App\Models\Notifikasi::where('user_id',$userAdmin->id)
                                  ->where('is_read', 0)
                                  ->count();
          }

          $words = explode(' ', trim($namaAdmin));$initials = '';
          if (count($words) >= 2) {$initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
          } else {
              $initials = strtoupper(substr($namaAdmin, 0, 2));
          }
      @endphp

      <!-- Topbar Header -->
      <header class="sticky top-0 z-30 flex h-16 items-center gap-3 border-b border-slate-200 bg-white/90 px-4 backdrop-blur-md sm:px-6">
        <button @click="mobileOpen = true" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:hidden">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <button @click="collapsed = !collapsed" class="hidden rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:block">
          <svg :class="collapsed ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
        </button>

        <!-- Search Bar -->
        <div class="relative hidden max-w-md flex-1 sm:block">
          <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input placeholder="Cari pengguna, kos, transaksi…" class="w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-9 pr-3 text-sm outline-none transition focus:border-[#0b2046] focus:bg-white focus:ring-2 focus:ring-[#0b2046]/15" />
        </div>

        <div class="ml-auto flex items-center gap-1.5">
          <!-- Notifications Dropdown -->
          <div class="relative">
            <button @click="notifOpen = !notifOpen; profileOpen = false" class="relative rounded-xl p-2.5 text-slate-500 transition hover:bg-slate-100">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
              @if($adminUnread > 0)
                <span id="adminTopbarBadge" class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
              @endif
            </button>
            
            <div x-show="notifOpen" @click.outside="notifOpen = false" style="display: none;" class="absolute right-0 mt-2 w-80 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">
              <div class="flex items-center justify-between border-b border-slate-200 px-4 py-3">
                <span class="font-display text-sm font-semibold text-slate-900">Notifikasi</span>
                @if($adminUnread > 0)
                    <span id="adminTopbarCount" class="rounded-full bg-blue-50 px-2 py-0.5 text-xs font-semibold text-[#0b2046]">{{ $adminUnread }} baru</span>
                @endif
              </div>
              
              <div id="adminTopbarNotifContainer" class="max-h-80 overflow-y-auto divide-y divide-slate-100">
                @forelse($adminListNotifs as $notif)
                <div id="admin-top-notif-{{ $notif->id }}" class="relative group flex gap-3 border-b border-slate-200 px-4 py-3 transition-all duration-300 {{ $notif->is_read ? 'bg-white' : 'bg-blue-50/40 hover:bg-slate-50' }}">
                  
                  <a href="{{ url('/admin/notifikasi') }}" class="flex flex-1 gap-3 cursor-pointer">
                      <span class="mt-0.5 grid h-8 w-8 shrink-0 place-items-center rounded-lg bg-blue-50 text-[#0b2046]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                      </span>
                      <div class="min-w-0 pr-6">
                        <p class="truncate text-sm font-medium text-slate-900">{{ $notif->judul }}</p>
                        <p class="line-clamp-2 text-xs text-slate-500 mt-0.5">{{ $notif->pesan }}</p>
                        <p class="mt-1 text-[10px] text-slate-400">{{ $notif->created_at->diffForHumans() }}</p>
                      </div>
                  </a>

                  <!-- Tombol Hapus Realtime -->
                  <button type="button" onclick="deleteAdminTopbarNotif(event, {{ $notif->id }})" class="absolute right-3 top-3 opacity-0 group-hover:opacity-100 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-opacity cursor-pointer" title="Hapus">
                      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                  </button>
                </div>
                @empty
                <div class="px-4 py-6 text-center text-sm text-slate-500">Tidak ada notifikasi baru.</div>
                @endforelse
              </div>

              <a href="{{ url('/admin/notifikasi') }}" class="block w-full bg-slate-50 px-4 py-2.5 text-center text-sm font-semibold text-[#0b2046] hover:bg-blue-50 transition">
                Lihat Semua Notifikasi
              </a>
            </div>
          </div>

          <!-- Profile Dropdown -->
          <div class="relative">
            <button @click="profileOpen = !profileOpen; notifOpen = false" class="flex items-center gap-2.5 rounded-xl py-1.5 pl-1.5 pr-2.5 transition hover:bg-slate-100">
              <span class="grid h-9 w-9 place-items-center rounded-full bg-[#0b2046] font-display text-sm font-semibold text-white">{{ $initials }}</span>
              <span class="hidden text-left leading-tight sm:block">
                <span class="block text-sm font-semibold text-slate-900">{{ $namaAdmin }}</span>
                <span class="block text-xs text-slate-500">Super Admin</span>
              </span>
              <svg class="hidden h-4 w-4 text-slate-500 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            
            <div x-show="profileOpen" @click.outside="profileOpen = false" style="display: none;" class="absolute right-0 mt-2 w-56 overflow-hidden rounded-2xl border border-slate-200 bg-white py-1.5 shadow-xl">
              <div class="border-b border-slate-200 px-4 py-3">
                <p class="text-sm font-semibold text-slate-900 truncate">{{ $namaAdmin }}</p>
                <p class="text-xs text-slate-500 truncate">{{ $emailAdmin }}</p>
              </div>
              
              <a href="{{ url('/admin/pengaturan') }}" class="flex w-full items-center gap-2.5 px-4 py-2.5 text-sm text-slate-900 hover:bg-slate-50">
                <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Pengaturan
              </a>
              
              <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="flex w-full items-center gap-2.5 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg> Logout
                </button>
              </form>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
          @yield('content')
        </div>
      </main>

    </div>
  </div>

<script>
    function deleteAdminTopbarNotif(event, notifId) {
        event.preventDefault();
        event.stopPropagation();

        const notifElement = document.getElementById(`admin-top-notif-${notifId}`);
        const metaToken = document.querySelector('meta[name="csrf-token"]');
        const token = metaToken ? metaToken.getAttribute('content') : '';

        // KUNCI UTAMA: URL diarahkan ke /notifikasi/... (MENGGUNAKAN JALUR USER)
        fetch(`/notifikasi/${notifId}/hapus`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(res => {
             if (!res.ok) throw new Error('Rute tidak ditemukan');
             return res.json();
        })
        .then(data => {
            if (data.success) {
                if (notifElement) {
                    notifElement.style.opacity = '0';
                    notifElement.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        notifElement.remove();
                        
                        const container = document.getElementById('adminTopbarNotifContainer');
                        if (container && container.children.length === 0) {
                            container.innerHTML = '<div class="px-4 py-6 text-center text-sm text-slate-500">Tidak ada notifikasi baru.</div>';
                        }
                    }, 300);
                }

                const badge = document.getElementById('adminTopbarBadge');
                const countTag = document.getElementById('adminTopbarCount');

                if (data.unread_count > 0) {
                    if (countTag) countTag.innerText = `${data.unread_count} baru`;
                } else {
                    if (badge) badge.remove();
                    if (countTag) countTag.remove();
                }
            } else {
                alert('Sistem menolak penghapusan: ' + data.message);
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('Gagal menghubungi server.');
        });
    }
  </script>

</body>
</html>