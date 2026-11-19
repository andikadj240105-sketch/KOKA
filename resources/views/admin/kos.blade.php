<!-- resources/views/admin/kos.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans" x-data="kosData()">
  
  <!-- Alert Notifikasi dari Laravel -->
  @if(session('success'))
    <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-600 shadow-sm mb-4">
        {{ session('success') }}
    </div>
  @endif

  <!-- Alert Error -->
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
  <!-- VIEW 1: DATA LIST KOS                      -->
  <!-- ========================================== -->
  <div x-show="view === 'list'" x-transition.opacity class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Data Kos</h1>
        <p class="mt-1 text-sm text-slate-500">Kelola dan tinjau listing kos.</p>
      </div>
      <button @click="openForm(null)" class="flex items-center gap-2 rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Tambah Kos
      </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 gap-4 xl:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Total Kos</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="kosDataList.length"></p></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Kos Campur / Umum</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="kosDataList.filter(k => k.tipe === 'Campur' || !k.tipe).length"></p></div>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
          <div><p class="text-xs font-semibold text-slate-500">Putra / Putri</p><p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="kosDataList.filter(k => k.tipe === 'Putra' || k.tipe === 'Putri').length"></p></div>
        </div>
      </div>
    </div>

    <!-- Data Table Card -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
      <!-- Filter -->
      <div class="flex flex-wrap items-center gap-3 border-b border-slate-200 p-4">
        <div class="relative min-w-[220px] flex-1">
          <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
          <input type="text" x-model="searchQuery" placeholder="Cari nama kos atau lokasi…" class="w-full rounded-xl border border-slate-200 bg-white py-2 pl-9 pr-3 text-sm outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
        </div>
        <select x-model="filterTipe" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
          <option value="Semua Tipe">Semua Tipe</option>
          <option value="Campur">Campur</option>
          <option value="Putra">Putra</option>
          <option value="Putri">Putri</option>
        </select>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full min-w-[800px] text-sm">
          <thead>
            <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-6 py-3.5">Kos</th>
              <th class="px-6 py-3.5">Kampus</th>
              <th class="px-6 py-3.5">Tipe</th>
              <th class="px-6 py-3.5">Harga / bln</th>
              <th class="px-6 py-3.5">Kamar</th>
              <th class="px-6 py-3.5 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <template x-for="kos in filteredKos" :key="kos.id">
              <tr class="transition hover:bg-slate-50/70">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3.5">
                    <img :src="(kos.img || '').startsWith('http') || (kos.img || '').startsWith('/storage') ? kos.img : 'https://images.unsplash.com/' + (kos.img || 'photo-1522771731570-8682deb54f5c') + '?w=120&h=120&fit=crop'" alt="Kos" class="h-12 w-12 rounded-xl bg-slate-100 object-cover shadow-sm shrink-0" />
                    <div>
                      <span class="block font-semibold text-slate-900" x-text="kos.nama"></span>
                      <span class="flex items-center gap-1 text-xs text-slate-500 mt-0.5">
                        <svg class="h-3 w-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span x-text="kos.lokasi"></span>
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-[#0b2046]" x-text="kos.sekitar_kampus || 'Tidak diatur'"></span>
                </td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700" x-text="kos.tipe || 'Campur'"></span>
                </td>
                <td class="px-6 py-4 font-semibold text-slate-900" x-text="kos.harga"></td>
                <td class="px-6 py-4 text-slate-600"><span x-text="kos.kamar"></span> tersedia</td>
                <td class="px-6 py-4 text-center">
                  <div class="inline-flex items-center justify-center gap-2">
                    <button @click="openForm(kos)" class="inline-flex items-center justify-center rounded-xl bg-slate-100 px-3.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">
                      Edit
                    </button>
                    <button @click="openConfirm('Hapus Kos', 'Hapus '+kos.nama+'?', 'danger', '/admin/kos/' + kos.id + '/hapus', 'DELETE')" class="inline-flex items-center justify-center rounded-xl bg-red-50 px-3.5 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                      Hapus
                    </button>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
        <div x-show="filteredKos.length === 0" style="display:none;" class="p-8 text-center text-sm text-slate-500">Kos tidak ditemukan.</div>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- VIEW 2: FORM TAMBAH / EDIT KOS             -->
  <!-- ========================================== -->
  <div x-show="view === 'form'" x-transition.opacity style="display: none;" class="space-y-6">
    <button @click="view = 'list'" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg> 
      Kembali ke Data Kos
    </button>
    
    <div>
      <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900" x-text="currentKos ? 'Edit Kos' : 'Tambah Kos Baru'"></h1>
      <p class="mt-1 text-sm text-slate-500">Lengkapi informasi kos di bawah ini.</p>
    </div>

    <!-- Form -->
    <form :action="currentKos ? '/admin/kos/' + currentKos.id : '{{ route('admin.kos.store') }}'" method="POST" enctype="multipart/form-data">
      @csrf
      
      <template x-if="currentKos">
          <input type="hidden" name="_method" value="PUT">
      </template>
      <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
          
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
            <h3 class="font-display font-semibold text-slate-900">Informasi Dasar</h3>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Kos</label>
              <input type="text" name="nama" :value="currentKos ? currentKos.nama : ''" placeholder="Contoh: Kost Melati Residence" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
            </div>

            <!-- BLOK BARU: INPUT NAMA DAN HP PEMILIK -->
            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Pemilik Kos</label>
                <input type="text" name="nama_pemilik" :value="currentKos ? currentKos.nama_pemilik : ''" placeholder="Contoh: Bpk. H. Ahmad" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Nomor HP / WA Pemilik</label>
                <input type="text" name="hp_pemilik" :value="currentKos ? currentKos.hp_pemilik : ''" placeholder="Contoh: 081234567890" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
            </div>
            <!-- ================================== -->

            <div class="grid gap-4 sm:grid-cols-3">
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Tipe Kos</label>
                <select name="tipe" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
                  <option value="Campur" :selected="currentKos?.tipe === 'Campur'">Campur</option>
                  <option value="Putra" :selected="currentKos?.tipe === 'Putra'">Putra</option>
                  <option value="Putri" :selected="currentKos?.tipe === 'Putri'">Putri</option>
                </select>
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Kota / Lokasi</label>
                <input type="text" name="lokasi" :value="currentKos ? currentKos.lokasi : ''" placeholder="Contoh: Buah Batu, Bandung" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Sekitar Kampus</label>
                <select name="sekitar_kampus" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
                  <option value="">Tidak ada / Pilih Kampus</option>
                  <option value="Telkom University" :selected="currentKos?.sekitar_kampus === 'Telkom University'">Telkom University</option>
                  <option value="Unpad Jatinangor" :selected="currentKos?.sekitar_kampus === 'Unpad Jatinangor'">Unpad Jatinangor</option>
                  <option value="UPI Cibiru" :selected="currentKos?.sekitar_kampus === 'UPI Cibiru'">UPI Cibiru</option>
                  <option value="UPI Gerlong" :selected="currentKos?.sekitar_kampus === 'UPI Gerlong'">UPI Gerlong</option>
                  <option value="UNDIP" :selected="currentKos?.sekitar_kampus === 'UNDIP'">UNDIP</option>
                  <option value="UGM" :selected="currentKos?.sekitar_kampus === 'UGM'">UGM</option>
                </select>
              </div>
            </div>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Alamat Lengkap</label>
              <textarea name="alamat_lengkap" x-text="currentKos ? currentKos.alamat_lengkap : ''" rows="2" placeholder="Jalan, nomor, RT/RW…" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]"></textarea>
            </div>
          </div>

          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
            
            <h3 class="font-display font-semibold text-slate-900">Harga Sewa (Rp)</h3>
            <div class="grid gap-4 sm:grid-cols-3">
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Per Bulan</label>
                <input type="number" name="harga" :value="currentKos ? String(currentKos.harga || '').replace(/[^0-9]/g, '') : ''" placeholder="1500000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Per 6 Bulan</label>
                <input type="number" name="harga_6_bulan" :value="currentKos ? currentKos.harga_6_bulan : ''" placeholder="8500000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Per Tahun</label>
                <input type="number" name="harga_tahun" :value="currentKos ? currentKos.harga_tahun : ''" placeholder="15000000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
            </div>

            <h3 class="font-display font-semibold text-slate-900 mt-4 border-t border-slate-100 pt-4">Ketersediaan Kamar</h3>
            <div class="grid gap-4 sm:grid-cols-2">
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Jumlah Total Kamar *</label>
                <input type="number" name="kamar_total" :value="currentKos ? currentKos.kamar_total : ''" placeholder="24" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
              <div>
                <label class="block mb-1.5 text-sm font-medium text-slate-900">Kamar Tersedia *</label>
                <input type="number" name="kamar_tersedia" :value="currentKos ? currentKos.kamar_tersedia : ''" placeholder="6" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
              </div>
            </div>
            
          </div>

          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4" x-data="{ facilities: ['WiFi', 'AC', 'Kamar Mandi Dalam', 'Parkir', 'Dapur', 'Kasur', 'Lemari', 'TV', 'Water Heater',' Toilet Duduk', 'Toilet Jongkok', 'Akses Motor', 'Akses Mobil'], selected: currentKos && currentKos.fasilitas ? currentKos.fasilitas.split(',').map(f => f.trim()) : ['WiFi', 'AC', 'Parkir'] }">
            <h3 class="font-display font-semibold text-slate-900">Deskripsi & Fasilitas</h3>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Deskripsi Kos</label>
              <textarea name="deskripsi" x-text="currentKos ? currentKos.deskripsi : ''" rows="4" placeholder="Ceritakan keunggulan kos…" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]"></textarea>
            </div>
            <div>
              <span class="block mb-1.5 text-sm font-medium text-slate-900">Pilih Fasilitas</span>
              <div class="flex flex-wrap gap-2">
                <template x-for="f in facilities" :key="f">
                  <button type="button" @click="selected.includes(f) ? selected.splice(selected.indexOf(f), 1) : selected.push(f)"
                    :class="selected.includes(f) ? 'border-[#0b2046] bg-blue-50 text-[#0b2046]' : 'border-slate-200 text-slate-500 hover:border-[#0b2046]/40'"
                    class="rounded-full border px-3.5 py-1.5 text-sm font-medium transition" x-text="f"></button>
                </template>
              </div>
              <input type="hidden" name="fasilitas" :value="selected.join(', ')">
            </div>
          </div>
        </div>

        <div class="space-y-6">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="font-display font-semibold text-slate-900 mb-3">Foto Kos (Maksimal 4)</h3>
            
            <div class="mt-3" x-data="{ imagePreview: null }">
              <label class="relative flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 py-6 text-sm text-slate-500 hover:border-[#0b2046] hover:text-[#0b2046] cursor-pointer transition overflow-hidden h-40">
                <template x-if="imagePreview"><img :src="imagePreview" class="absolute inset-0 w-full h-full object-cover" /></template>
                <div class="flex flex-col items-center justify-center gap-2" x-show="!imagePreview">
                  <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                  <span class="text-xs font-medium text-center">Foto Utama</span>
                </div>
                <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg" class="hidden" @change="const file = $event.target.files[0]; if (file) { imagePreview = URL.createObjectURL(file); }" />
              </label>
            </div>

            <div class="mt-3 grid grid-cols-3 gap-3">
              <div x-data="{ imagePreview2: null }">
                <label class="relative flex flex-col items-center justify-center gap-1 rounded-xl border-2 border-dashed border-slate-200 h-20 text-slate-500 hover:border-[#0b2046] hover:text-[#0b2046] cursor-pointer overflow-hidden transition">
                  <template x-if="imagePreview2"><img :src="imagePreview2" class="absolute inset-0 w-full h-full object-cover" /></template>
                  <span class="text-[10px] font-medium" x-show="!imagePreview2">+ Foto 2</span>
                  <input type="file" name="foto_2" accept="image/png, image/jpeg, image/jpg" class="hidden" @change="const file = $event.target.files[0]; if (file) { imagePreview2 = URL.createObjectURL(file); }" />
                </label>
              </div>
              <div x-data="{ imagePreview3: null }">
                <label class="relative flex flex-col items-center justify-center gap-1 rounded-xl border-2 border-dashed border-slate-200 h-20 text-slate-500 hover:border-[#0b2046] hover:text-[#0b2046] cursor-pointer overflow-hidden transition">
                  <template x-if="imagePreview3"><img :src="imagePreview3" class="absolute inset-0 w-full h-full object-cover" /></template>
                  <span class="text-[10px] font-medium" x-show="!imagePreview3">+ Foto 3</span>
                  <input type="file" name="foto_3" accept="image/png, image/jpeg, image/jpg" class="hidden" @change="const file = $event.target.files[0]; if (file) { imagePreview3 = URL.createObjectURL(file); }" />
                </label>
              </div>
              <div x-data="{ imagePreview4: null }">
                <label class="relative flex flex-col items-center justify-center gap-1 rounded-xl border-2 border-dashed border-slate-200 h-20 text-slate-500 hover:border-[#0b2046] hover:text-[#0b2046] cursor-pointer overflow-hidden transition">
                  <template x-if="imagePreview4"><img :src="imagePreview4" class="absolute inset-0 w-full h-full object-cover" /></template>
                  <span class="text-[10px] font-medium" x-show="!imagePreview4">+ Foto 4</span>
                  <input type="file" name="foto_4" accept="image/png, image/jpeg, image/jpg" class="hidden" @change="const file = $event.target.files[0]; if (file) { imagePreview4 = URL.createObjectURL(file); }" />
                </label>
              </div>
            </div>

          </div>

          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-3">
            <button type="submit" class="w-full rounded-xl bg-[#0b2046] px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:opacity-90">Simpan & Publish</button>
            <button type="button" @click="view = 'list'" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</button>
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
          <input type="hidden" name="_method" :value="confirmModal.formMethod">
          <button type="submit" @click="confirmModal.isOpen = false" :class="confirmModal.tone === 'danger' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-[#0b2046] hover:opacity-90 text-white'" class="rounded-xl px-4 py-2 text-sm font-semibold shadow-sm" x-text="confirmModal.tone === 'danger' ? 'Hapus' : 'Lanjutkan'"></button>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- Data JSON disuntikkan ke variabel global JS -->
<script>
  const DATA_KOS_DARI_SERVER = @json($kosData);

  function kosData() {
    return {
      // Jika ada error dari server, otomatis tahan posisi di halaman form
      view: '{{ $errors->any() ? "form" : "list" }}', 
      searchQuery: '',
      filterTipe: 'Semua Tipe',
      currentKos: null,
      confirmModal: { isOpen: false, title: '', message: '', tone: '', actionUrl: '', formMethod: 'POST' },
      
      kosDataList: DATA_KOS_DARI_SERVER,
      
      get filteredKos() {
        return this.kosDataList.filter(k => {
          const searchMatch = (k.nama || '').toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                              (k.lokasi || '').toLowerCase().includes(this.searchQuery.toLowerCase());
          
          const itemTipe = (k.tipe || 'Campur').trim().toLowerCase();
          const filterTarget = this.filterTipe.trim().toLowerCase();
          const tipeMatch = filterTarget === 'semua tipe' || itemTipe === filterTarget;
          
          return searchMatch && tipeMatch;
        });
      },

      openForm(kos) {
        this.currentKos = kos ? Object.assign({}, kos) : null; 
        this.view = 'form';
        window.scrollTo(0,0);
      },
      openConfirm(title, message, tone, actionUrl, formMethod) {
        this.confirmModal = { isOpen: true, title, message, tone, actionUrl, formMethod };
      }
    };
  }
</script>
@endsection