<!-- resources/views/admin/notifikasi.blade.php -->
@extends('admin.layout')

@section('content')
<div x-data="notifikasiData()" class="space-y-6 font-sans">
  
  <!-- Page Header -->
  <div class="flex flex-wrap items-center justify-between gap-4">
    <div>
      <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Pusat Notifikasi</h1>
      <p class="mt-1 text-sm text-slate-500">Aktivitas terbaru di seluruh platform.</p>
    </div>
    <button @click="markAll()" class="flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 cursor-pointer">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      Tandai semua dibaca
    </button>
  </div>

  <!-- Category Filter Pills -->
  <div class="flex flex-wrap gap-2">
    <template x-for="c in cats" :key="c">
      <button @click="cat = c" 
        :class="cat === c ? 'border-[#0b2046] bg-[#0b2046] text-white' : 'border-slate-200 bg-white text-slate-500 hover:border-[#0b2046]/40'"
        class="rounded-full border px-3.5 py-1.5 text-sm font-medium transition cursor-pointer" x-text="c">
      </button>
    </template>
  </div>

  <!-- Notification List -->
  <div class="rounded-2xl border border-slate-200 bg-white shadow-sm divide-y divide-slate-200 overflow-hidden">
    
    <template x-for="n in filteredItems" :key="n.id">
      <div class="relative group flex w-full items-start gap-4 p-5 text-left transition" :class="!n.read ? 'bg-blue-50/40' : 'hover:bg-slate-50'">
        
        <!-- Area Klik untuk Membaca -->
        <div @click="markAsRead(n.id)" class="flex flex-1 items-start gap-4 cursor-pointer">
            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]" x-html="getIcon(n.icon)"></span>
            
            <div class="min-w-0 flex-1 pr-8">
              <div class="flex items-center gap-2">
                <p class="font-medium text-slate-900" x-text="n.judul"></p>
                <template x-if="!n.read">
                  <span class="h-2 w-2 rounded-full bg-[#0b2046]"></span>
                </template>
              </div>
              <p class="text-sm text-slate-500 mt-0.5" x-text="n.desc"></p>
              <p class="mt-1.5 text-xs text-slate-400"><span x-text="n.waktu"></span> · <span x-text="n.kategori"></span></p>
            </div>
        </div>

        <!-- Tombol Hapus Real-time -->
        <button @click.stop="deleteNotif(n.id)" class="absolute right-4 top-5 opacity-0 group-hover:opacity-100 p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-opacity cursor-pointer" title="Hapus Notifikasi">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
        </button>
        
      </div>
    </template>

    <!-- Empty State -->
    <div x-show="filteredItems.length === 0" style="display: none;" class="px-6 py-16 text-center text-sm text-slate-500">
      Tidak ada notifikasi pada kategori ini.
    </div>

  </div>

</div>

<!-- Alpine Script -->
<script>
  function notifikasiData() {
    return {
      cat: 'Semua',
      cats: ["Semua", "Booking baru", "Pembayaran", "Pemilik baru", "Kos baru", "Driver baru", "Laporan pengguna"],
      
      items: {!! isset($notifikasis) ? json_encode($notifikasis->map(function($n) {
          return [
              'id' => $n->id,
              'judul' => $n->judul,
              'desc' => $n->pesan,
              'waktu' => $n->created_at->diffForHumans(),
              'kategori' => 'Semua',
              'icon' => $n->ikon ?? 'CalendarCheck',
              'read' => (bool) $n->is_read
          ];
      })) : '[]' !!},

      get filteredItems() {
        return this.items.filter(n => this.cat === 'Semua' || n.kategori === this.cat);
      },

      markAll() {
        this.items.forEach(n => {
            if (!n.read) this.markAsRead(n.id);
        });
      },

     // Menumpang ke jalur User juga
      markAsRead(id) {
        const item = this.items.find(n => n.id === id);
        if (item && !item.read) {
            item.read = true;
            
            fetch(`/notifikasi/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).catch(error => console.error('Gagal memperbarui notifikasi:', error));
        }
      },

      deleteNotif(id) {
          // KUNCI UTAMA: URL diarahkan ke /notifikasi/... (MENGGUNAKAN JALUR USER)
          fetch(`/notifikasi/${id}/hapus`, {
              method: 'POST', 
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
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
                  // Hapus elemen dari layar jika sukses di database
                  this.items = this.items.filter(n => n.id !== id);
              } else {
                  alert('Gagal dihapus: ' + data.message);
              }
          })
          .catch(error => {
              console.error('Gagal menghapus notifikasi:', error);
              alert('Gagal menghubungi server.');
          });
      },

      getIcon(iconName) {
        const icons = {
          'CalendarCheck': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 16l2 2 4-4"/></svg>',
          'CreditCard': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>',
          'UserPlus': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>',
          'Building2': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>',
          'Bike': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v2m0 0l-3 3v2m3-5l3 3v2M4 16h4l2-4h4l2 4h4m-8-4v4m0 0a2 2 0 100 4 2 2 0 000-4z"/></svg>',
          'Flag': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg>'
        };
        return icons[iconName] || icons['CalendarCheck'];
      }
    };
  }
</script>
@endsection