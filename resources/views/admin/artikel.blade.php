<!-- resources/views/admin/artikel.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans" x-data="artikelData()">
  
  <!-- Alert Notifikasi dari Laravel -->
  @if(session('success'))
    <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-600 shadow-sm mb-4">
        {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm font-semibold text-red-600 shadow-sm mb-4">
        Terjadi kesalahan, data gagal disimpan:
        <ul class="mt-2 list-disc pl-5 font-normal text-xs">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <!-- ========================================== -->
  <!-- VIEW 1: DATA LIST ARTIKEL                  -->
  <!-- ========================================== -->
  <div x-show="view === 'list'" x-transition.opacity class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-semibold tracking-tight text-[#0b2046]">Data Artikel</h1>
        <p class="mt-1 text-sm text-slate-500">Kelola informasi, panduan, dan tips untuk pengguna.</p>
      </div>
      <button @click="openForm(null)" class="flex items-center gap-2 rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Tulis Artikel Baru
      </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 gap-4 xl:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-blue-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Total Artikel</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="artikelList.length"></p></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Published</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="artikelList.filter(a => a.status === 'Published').length"></p></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-slate-100 text-slate-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Draft</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="artikelList.filter(a => a.status === 'Draft').length"></p></div>
        </div>
      </div>
    </div>

    <!-- Data Table Card -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
      <!-- Filter -->
      <div class="flex flex-wrap items-center gap-3 border-b border-slate-200 p-4">
        <div class="relative min-w-[220px] flex-1">
          <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input type="text" x-model="searchQuery" placeholder="Cari judul artikel…" class="w-full rounded-xl border border-slate-200 bg-white py-2 pl-9 pr-3 text-sm outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
        </div>
        <select x-model="filterStatus" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
          <option value="Semua">Semua Status</option>
          <option value="Published">Published</option>
          <option value="Draft">Draft</option>
        </select>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full min-w-[800px] text-sm">
          <thead>
            <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-6 py-3.5">Judul Artikel</th>
              <th class="px-6 py-3.5">Kategori</th>
              <th class="px-6 py-3.5">Penulis</th>
              <th class="px-6 py-3.5">Status</th>
              <th class="px-6 py-3.5 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <template x-for="artikel in filteredArtikel" :key="artikel.id">
              <tr class="transition hover:bg-slate-50/70">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3.5">
                    <img :src="artikel.gambar_url || 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=120&h=120&fit=crop'" alt="Thumbnail" class="h-12 w-16 rounded-lg bg-slate-100 object-cover shadow-sm shrink-0" />
                    <div>
                      <span class="block font-semibold text-slate-900" x-text="artikel.judul"></span>
                      <span class="block text-xs text-slate-500 mt-0.5" x-text="'/' + artikel.slug"></span>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-[11px] font-bold uppercase tracking-wider text-[#6b21a8] ring-1 ring-[#6b21a8]/10" x-text="artikel.kategori"></span>
                </td>
                <td class="px-6 py-4 text-slate-600" x-text="artikel.penulis"></td>
                <td class="px-6 py-4">
                  <span :class="artikel.status === 'Published' ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-100 text-slate-600'" class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold" x-text="artikel.status"></span>
                </td>
                <td class="px-6 py-4 text-center">
                  <div class="inline-flex items-center justify-center gap-2">
                    <button @click="openForm(artikel)" class="inline-flex items-center justify-center rounded-xl bg-slate-100 px-3.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">
                      Edit
                    </button>
                    <button @click="openConfirm('Hapus Artikel', 'Yakin ingin menghapus artikel ' + artikel.judul + '?', 'danger', '/admin/artikel/' + artikel.id + '/hapus')" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-3.5 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                      Hapus
                    </button>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
        <div x-show="filteredArtikel.length === 0" style="display:none;" class="p-8 text-center text-sm text-slate-500">Artikel tidak ditemukan.</div>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- VIEW 2: FORM TAMBAH / EDIT ARTIKEL         -->
  <!-- ========================================== -->
  <div x-show="view === 'form'" x-transition.opacity style="display: none;" class="space-y-6">
    <button @click="view = 'list'" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-[#0b2046] transition">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg> 
      Kembali ke Data Artikel
    </button>
    
    <div>
      <h1 class="font-display text-2xl font-semibold tracking-tight text-[#0b2046]" x-text="currentArtikel ? 'Edit Artikel' : 'Tulis Artikel Baru'"></h1>
      <p class="mt-1 text-sm text-slate-500">Lengkapi konten artikel di bawah ini.</p>
    </div>

    <!-- Form -->
    <form :action="currentArtikel ? '/admin/artikel/' + currentArtikel.id : '{{ route('admin.artikel.store') }}'" method="POST" enctype="multipart/form-data">
      @csrf
      <template x-if="currentArtikel">
          <input type="hidden" name="_method" value="PUT">
      </template>
      
      <div class="grid gap-6 lg:grid-cols-3">
        <!-- Main Form Content -->
        <div class="space-y-6 lg:col-span-2">
          
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Judul Artikel *</label>
              <input type="text" name="judul" :value="currentArtikel ? currentArtikel.judul : ''" placeholder="Masukkan judul yang menarik..." required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-1 focus:ring-[#0b2046]" />
            </div>
            
            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Kategori *</label>
                <select name="kategori" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
                  <option value="Information" :selected="currentArtikel?.kategori === 'Information'">Information</option>
                  <option value="Tips & Trik" :selected="currentArtikel?.kategori === 'Tips & Trik'">Tips & Trik</option>
                  <option value="Berita" :selected="currentArtikel?.kategori === 'Berita'">Berita</option>
                  <option value="Promo" :selected="currentArtikel?.kategori === 'Promo'">Promo</option>
                </select>
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Status *</label>
                <select name="status" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
                  <option value="Published" :selected="currentArtikel?.status === 'Published'">Published</option>
                  <option value="Draft" :selected="currentArtikel?.status === 'Draft'">Simpan sebagai Draft</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Deskripsi Singkat (Muncul di Card) *</label>
              <textarea name="deskripsi_singkat" x-text="currentArtikel ? currentArtikel.deskripsi_singkat : ''" rows="2" placeholder="Tulis ringkasan atau cuplikan artikel yang menarik pembaca..." required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]"></textarea>
            </div>
          </div>

          <!-- Bagian Blok Konten Dinamis -->
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
              <div>
                <h3 class="font-display font-semibold text-slate-900">Susunan Konten Artikel *</h3>
                <p class="text-xs text-slate-500 mt-0.5">Tambahkan blok Subjudul atau Paragraf secara terpisah.</p>
              </div>
              <div class="flex gap-2">
                <button type="button" @click="tambahBlok('subjudul')" class="rounded-xl bg-purple-50 px-3 py-1.5 text-xs font-bold text-[#6b21a8] hover:bg-purple-100 transition">+ Subjudul</button>
                <button type="button" @click="tambahBlok('paragraf')" class="rounded-xl bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-600 hover:bg-blue-100 transition">+ Paragraf</button>
              </div>
            </div>

            <div class="space-y-3 mt-4">
              <template x-for="(blok, index) in formKonten" :key="index">
                <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50/50 p-4">
                  <div class="flex-1 space-y-2">
                    <div class="flex items-center justify-between">
                      <span class="text-xs font-bold uppercase tracking-wider text-slate-500" x-text="blok.type === 'subjudul' ? '📌 Subjudul' : '📝 Paragraf'"></span>
                      <div class="flex gap-1">
                        <button type="button" @click="pindahUrutan(index, -1)" x-show="index > 0" class="text-xs text-slate-400 hover:text-slate-600 px-1">↑ Naik</button>
                        <button type="button" @click="pindahUrutan(index, 1)" x-show="index < formKonten.length - 1" class="text-xs text-slate-400 hover:text-slate-600 px-1">↓ Turun</button>
                      </div>
                    </div>

                    <template x-if="blok.type === 'subjudul'">
                      <input type="text" :name="'konten['+index+'][text]'" x-model="blok.text" placeholder="Tulis subjudul di sini..." required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-bold text-[#6b21a8] outline-none focus:border-[#6b21a8]" />
                    </template>
                    <template x-if="blok.type === 'paragraf'">
                      <textarea :name="'konten['+index+'][text]'" x-model="blok.text" rows="3" placeholder="Tulis isi paragraf di sini..." required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm leading-relaxed text-slate-700 outline-none focus:border-[#0b2046]"></textarea>
                    </template>
                    
                    <input type="hidden" :name="'konten['+index+'][type]'" x-model="blok.type">
                  </div>

                  <button type="button" @click="formKonten.splice(index, 1)" class="mt-1 text-slate-400 hover:text-red-600 p-1 transition" title="Hapus Blok">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                  </button>
                </div>
              </template>
              
              <div x-show="formKonten.length === 0" class="rounded-xl border border-dashed border-slate-300 p-8 text-center text-sm text-slate-400">
                Belum ada konten. Klik tombol <b>+ Subjudul</b> atau <b>+ Paragraf</b> di atas.
              </div>
            </div>
          </div>

        </div>

        <!-- Sidebar Form (Gambar & Aksi) -->
        <div class="space-y-6">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="font-display font-semibold text-slate-900 mb-3">Gambar Thumbnail</h3>
            
            <div class="mt-3" x-data="{ imagePreview: null }">
              <label class="relative flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 py-6 text-sm text-slate-500 hover:border-[#0b2046] hover:text-[#0b2046] cursor-pointer transition overflow-hidden h-48">
                <img x-show="imagePreview || (currentArtikel && currentArtikel.gambar_url)" :src="imagePreview || (currentArtikel ? currentArtikel.gambar_url : '')" class="absolute inset-0 w-full h-full object-cover" />
                
                <div class="flex flex-col items-center justify-center gap-2" x-show="!imagePreview && (!currentArtikel || !currentArtikel.gambar_url)">
                  <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  <span class="text-xs font-medium text-center">Klik untuk upload foto <br/> (Max: 2MB)</span>
                </div>
                <input type="file" name="gambar" accept="image/png, image/jpeg, image/jpg" class="hidden" @change="const file = $event.target.files[0]; if (file) { imagePreview = URL.createObjectURL(file); }" />
              </label>
            </div>
          </div>

          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-3">
            <button type="submit" class="w-full rounded-xl bg-[#0b2046] px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90">Simpan Artikel</button>
            <button type="button" @click="view = 'list'" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Modal Konfirmasi -->
  <div x-show="confirmModal.isOpen" style="display: none;" class="fixed inset-0 z-[60] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="confirmModal.isOpen = false"></div>
    <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl text-center" x-show="confirmModal.isOpen">
      <h3 class="font-display text-lg font-bold text-slate-900 mb-2" x-text="confirmModal.title"></h3>
      <p class="text-sm text-slate-500 mb-6" x-text="confirmModal.message"></p>
      <div class="flex gap-3 justify-center">
        <button @click="confirmModal.isOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
        <form :action="confirmModal.actionUrl" method="POST" class="m-0">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" @click="confirmModal.isOpen = false" class="rounded-xl px-4 py-2 text-sm font-semibold shadow-sm bg-red-600 hover:bg-red-700 text-white">Hapus</button>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- Injeksi Data JSON -->
<script>
  const DATA_ARTIKEL_DARI_SERVER = @json($artikels ?? []);

  function artikelData() {
    return {
      view: '{{ $errors->any() ? "form" : "list" }}', 
      searchQuery: '',
      filterStatus: 'Semua',
      currentArtikel: null,
      confirmModal: { isOpen: false, title: '', message: '', actionUrl: '' },
      
      formKonten: [],
      artikelList: DATA_ARTIKEL_DARI_SERVER,
      
      get filteredArtikel() {
        return this.artikelList.filter(a => {
          const searchMatch = (a.judul || '').toLowerCase().includes(this.searchQuery.toLowerCase());
          const statusMatch = this.filterStatus === 'Semua' || a.status === this.filterStatus;
          return searchMatch && statusMatch;
        });
      },

      openForm(artikel) {
        this.currentArtikel = artikel ? Object.assign({}, artikel) : null; 
        this.formKonten = (artikel && Array.isArray(artikel.konten)) ? JSON.parse(JSON.stringify(artikel.konten)) : [{ type: 'paragraf', text: '' }];
        this.view = 'form';
        window.scrollTo(0,0);
      },

      tambahBlok(tipe) {
        this.formKonten.push({ type: tipe, text: '' });
      },

      pindahUrutan(index, arah) {
        const targetIndex = index + arah;
        if (targetIndex >= 0 && targetIndex < this.formKonten.length) {
          const temp = this.formKonten[index];
          this.formKonten[index] = this.formKonten[targetIndex];
          this.formKonten[targetIndex] = temp;
        }
      },
      
      openConfirm(title, message, tone, actionUrl) {
        this.confirmModal = { isOpen: true, title, message, actionUrl };
      }
    };
  }
</script>
@endsection