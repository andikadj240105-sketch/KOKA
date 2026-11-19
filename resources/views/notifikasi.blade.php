<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Notifikasi - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">
  
  <x-navbar />

  <main class="mx-auto max-w-3xl px-4 py-8 sm:px-6" x-data="userNotifikasi()">
    
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
      <div>
        <a href="/akun" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#522b89]">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
          Kembali ke Akun
        </a>
        <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Pusat Notifikasi</h1>
        <p class="mt-1 text-sm text-[#64748b]">Semua riwayat informasi dan pembaruan aktivitas akun Anda.</p>
      </div>
      <button @click="markAll()" class="rounded-xl border border-[#e2e8f0] bg-white px-4 py-2.5 text-xs font-bold text-[#522b89] shadow-sm transition hover:bg-slate-50">
        Tandai Semua Dibaca
      </button>
    </div>

    <div class="space-y-3">
      <template x-for="n in items" :key="n.id">
        <div @click="markAsRead(n.id)" :class="!n.read ? 'bg-purple-50/60 border-purple-200' : 'bg-white border-[#e2e8f0]'" class="flex items-start gap-4 rounded-2xl border p-4 shadow-sm transition cursor-pointer">
          <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-purple-100 text-[#522b89]">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between">
              <h3 class="text-sm font-bold text-[#522b89]" x-text="n.judul"></h3>
              <span class="text-xs text-[#64748b]" x-text="n.waktu"></span>
            </div>
            <p class="mt-1 text-sm text-slate-600" x-text="n.desc"></p>
          </div>
          <template x-if="!n.read">
            <span class="h-2.5 w-2.5 rounded-full bg-[#522b89] self-center"></span>
          </template>
        </div>
      </template>

      <div x-show="items.length === 0" class="rounded-2xl border border-[#e2e8f0] bg-white py-12 text-center text-sm text-[#64748b] shadow-sm">
        Belum ada notifikasi untuk Anda.
      </div>
    </div>
  </main>

  <script>
    function userNotifikasi() {
      return {
        items: {!! isset($notifikasis) ? json_encode($notifikasis->map(function($n) {
            return [
                'id' => $n->id,
                'judul' => $n->judul,
                'desc' => $n->pesan,
                'waktu' => $n->created_at->diffForHumans(),
                'read' => (bool) $n->is_read
            ];
        })) : '[]' !!},

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
            }).catch(err => console.error(err));
          }
        },

        markAll() {
          this.items.forEach(n => {
            if (!n.read) this.markAsRead(n.id);
          });
        }
      }
    }
  </script>
</body>
</html>