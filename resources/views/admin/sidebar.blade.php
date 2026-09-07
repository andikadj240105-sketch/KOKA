<!-- resources/views/admin/sidebar.blade.php -->
<!-- Desktop Sidebar -->
<aside :class="collapsed ? 'w-[76px]' : 'w-64'" class="hidden shrink-0 flex-col border-r border-slate-200 bg-white transition-all duration-200 lg:flex h-full z-20">
  
  <!-- Logo Header -->
  <div :class="collapsed ? 'justify-center px-2' : 'px-5'" class="flex h-16 items-center border-b border-slate-200 shrink-0">
    <div class="flex items-center gap-2.5">
      <div class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044] shadow-sm">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
      </div>
      <template x-if="!collapsed">
        <div class="leading-none">
          <span class="font-display text-lg font-bold tracking-tight text-slate-900">Kosan</span>
          <span class="block text-[10px] font-semibold uppercase tracking-[0.18em] text-[#0b2046]">Admin</span>
        </div>
      </template>
    </div>
  </div>

  <!-- Navigation Menu List -->
  <nav class="flex-1 overflow-y-auto py-4">
    <div class="flex flex-col gap-0.5 px-3">
      
      @php
        $menus = [
          ['url' => '/admin', 'label' => 'Dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
          ['url' => '/admin/pengguna', 'label' => 'Pengguna', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
          ['url' => '/admin/pemilik', 'label' => 'Pemilik Kos', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
          ['url' => '/admin/kos', 'label' => 'Data Kos', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
          ['url' => '/admin/booking', 'label' => 'Booking', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
          ['url' => '/admin/pembayaran', 'label' => 'Pembayaran', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
          ['url' => '/admin/layanan', 'label' => 'Layanan', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
          ['url' => '/admin/driver', 'label' => 'Driver', 'icon' => 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0zM13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0'],
          ['url' => '/admin/review', 'label' => 'Review & Rating', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
          ['url' => '/admin/promo', 'label' => 'Promo', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
          ['url' => '/admin/notifikasi', 'label' => 'Notifikasi', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
          ['url' => '/admin/laporan', 'label' => 'Laporan', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
          ['url' => '/admin/pengaturan', 'label' => 'Pengaturan', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4'],
        ];
      @endphp

      @foreach($menus as $menu)
        @php
          $isActive = request()->is(trim($menu['url'], '/'));
        @endphp
        
        <a href="{{ $menu['url'] }}" :title="collapsed ? '{{ $menu['label'] }}' : ''"
           class="group relative flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all {{ $isActive ? 'bg-[#0b2046] text-white shadow-sm' : 'text-slate-500 hover:bg-blue-50 hover:text-[#0b2046]' }}"
           :class="{ 'justify-center': collapsed }">
          <svg class="h-[18px] w-[18px] shrink-0 {{ $isActive ? '' : 'text-slate-400 group-hover:text-[#0b2046]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
          </svg>
          <span class="truncate" x-show="!collapsed">{{ $menu['label'] }}</span>
        </a>
      @endforeach

    </div>
  </nav>

  <!-- Sidebar Footer -->
  <div class="border-t border-slate-200 px-3 py-3 space-y-0.5 shrink-0">
    <button title="Help Center"
      class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-500 transition hover:bg-slate-100 hover:text-slate-900"
      :class="{ 'justify-center': collapsed }">
      <svg class="h-[18px] w-[18px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <span x-show="!collapsed">Help Center</span>
    </button>
    <button title="Logout"
      class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-50"
      :class="{ 'justify-center': collapsed }">
      <svg class="h-[18px] w-[18px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
      <span x-show="!collapsed">Logout</span>
    </button>
  </div>

</aside>

<!-- Mobile Drawer Overlay -->
<div x-show="mobileOpen" class="fixed inset-0 z-40 lg:hidden" style="display: none;">
  <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="mobileOpen = false" x-transition.opacity></div>
  <aside class="absolute left-0 top-0 flex h-full w-64 flex-col bg-white shadow-2xl" 
         x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full">
    <button @click="mobileOpen = false" class="absolute right-3 top-4 rounded-lg p-1.5 text-slate-400 hover:bg-slate-100">
      <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    
    <div class="flex h-16 items-center border-b border-slate-200 px-5 shrink-0">
      <div class="flex items-center gap-2.5">
        <div class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044] shadow-sm">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <div class="leading-none">
          <span class="font-display text-lg font-bold tracking-tight text-slate-900">Kosan</span>
          <span class="block text-[10px] font-semibold uppercase tracking-[0.18em] text-[#0b2046]">Admin</span>
        </div>
      </div>
    </div>
    
    <nav class="flex-1 overflow-y-auto py-4">
      <div class="flex flex-col gap-0.5 px-3">
        @foreach($menus as $menu)
          @php
            $isActive = request()->is(trim($menu['url'], '/'));
          @endphp
          <a href="{{ $menu['url'] }}" class="group relative flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all {{ $isActive ? 'bg-[#0b2046] text-white shadow-sm' : 'text-slate-500 hover:bg-blue-50 hover:text-[#0b2046]' }}">
            <svg class="h-[18px] w-[18px] shrink-0 {{ $isActive ? '' : 'text-slate-400 group-hover:text-[#0b2046]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
            </svg>
            <span class="truncate">{{ $menu['label'] }}</span>
          </a>
        @endforeach
      </div>
    </nav>
    
    <div class="border-t border-slate-200 px-3 py-3 space-y-0.5 shrink-0">
      <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-500 transition hover:bg-slate-100 hover:text-slate-900">
        <svg class="h-[18px] w-[18px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>Help Center</span>
      </button>
      <button class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-rose-600 transition hover:bg-rose-50">
        <svg class="h-[18px] w-[18px] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
        <span>Logout</span>
      </button>
    </div>
  </aside>
</div>