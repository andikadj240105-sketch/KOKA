<!-- resources/views/admin/kos.blade.php -->
@extends('admin.layout')

@section('content')
<div x-data="kosData()" class="font-sans">
  
  <!-- ========================================== -->
  <!-- VIEW 1: DATA LIST KOS                      -->
  <!-- ========================================== -->
  <div x-show="view === 'list'" x-transition.opacity class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Data Kos</h1>
        <p class="mt-1 text-sm text-slate-500">Kelola, tinjau, dan setujui listing kos.</p>
      </div>
      <button @click="openForm(null)" class="flex items-center gap-2 rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Tambah Kos
      </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
      <!-- Total Kos -->
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
          </span>
          <div>
            <p class="text-xs font-semibold text-slate-500">Total Kos</p>
            <p class="font-display text-lg font-bold tracking-tight text-slate-900">1.284</p>
          </div>
        </div>
      </div>
      <!-- Kos Aktif -->
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </span>
          <div>
            <p class="text-xs font-semibold text-slate-500">Kos Aktif</p>
            <p class="font-display text-lg font-bold tracking-tight text-slate-900">1.108</p>
          </div>
        </div>
      </div>
      <!-- Menunggu Approval -->
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </span>
          <div>
            <p class="text-xs font-semibold text-slate-500">Menunggu Approval</p>
            <p class="font-display text-lg font-bold tracking-tight text-slate-900">132</p>
          </div>
        </div>
      </div>
      <!-- Ditolak -->
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-center gap-3">
          <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </span>
          <div>
            <p class="text-xs font-semibold text-slate-500">Ditolak</p>
            <p class="font-display text-lg font-bold tracking-tight text-slate-900">44</p>
          </div>
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
        <select x-model="filterStatus" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
          <option value="Semua Status">Semua Status</option>
          <option value="Aktif">Aktif</option>
          <option value="Menunggu">Menunggu</option>
          <option value="Nonaktif">Nonaktif</option>
        </select>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
          <thead>
            <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-5 py-3">Kos</th>
              <th class="px-5 py-3">Pemilik</th>
              <th class="px-5 py-3">Harga / bln</th>
              <th class="px-5 py-3">Kamar</th>
              <th class="px-5 py-3">Rating</th>
              <th class="px-5 py-3">Status</th>
              <th class="px-5 py-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <template x-for="kos in filteredKos" :key="kos.id">
              <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
                <td class="px-5 py-3">
                  <button @click="openDetail(kos)" class="flex items-center gap-3 text-left w-full focus:outline-none">
                    <img :src="'https://images.unsplash.com/' + kos.img + '?w=120&h=120&fit=crop'" alt="Kos" class="h-11 w-11 rounded-xl bg-slate-100 object-cover" />
                    <span>
                      <span class="block font-medium text-slate-900 hover:text-[#0b2046]" x-text="kos.nama"></span>
                      <span class="flex items-center gap-1 text-xs text-slate-500">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span x-text="kos.lokasi"></span>
                      </span>
                    </span>
                  </button>
                </td>
                <td class="px-5 py-3 text-slate-500" x-text="kos.pemilik"></td>
                <td class="px-5 py-3 font-semibold text-slate-900" x-text="formatRupiah(kos.harga)"></td>
                <td class="px-5 py-3 text-slate-500"><span x-text="kos.tersedia"></span>/<span x-text="kos.kamar"></span> tersedia</td>
                <td class="px-5 py-3 flex items-center text-amber-500 text-xs">
                  <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                  <span x-text="kos.rating"></span>
                </td>
                <td class="px-5 py-3">
                  <span :class="{
                    'bg-emerald-50 text-emerald-600': kos.status === 'Aktif',
                    'bg-amber-50 text-amber-600': kos.status === 'Menunggu',
                    'bg-slate-100 text-slate-600': kos.status === 'Nonaktif'
                  }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="kos.status"></span>
                </td>
                <td class="px-5 py-3 text-right">
                  <button @click="openDetail(kos)" class="font-semibold text-[#0b2046] hover:underline mr-3">Detail</button>
                  <div class="relative inline-block" x-data="{ menuOpen: false }">
                    <button @click="menuOpen = !menuOpen" @click.outside="menuOpen = false" class="p-1 rounded text-slate-400 hover:bg-slate-100">
                       <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" /></svg>
                    </button>
                    <div x-show="menuOpen" style="display: none;" class="absolute right-0 mt-1 w-32 rounded-xl border border-slate-200 bg-white py-1 shadow-lg z-10 text-left">
                      <button class="w-full block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50" @click="openForm(kos); menuOpen=false">Edit</button>
                      <button class="w-full block px-4 py-2 text-sm text-[#0b2046] hover:bg-blue-50" @click="openConfirm('Approve Kos', 'Setujui '+kos.nama+'?', 'primary', 'Kos disetujui.'); menuOpen=false">Approve</button>
                      <button class="w-full block px-4 py-2 text-sm text-red-600 hover:bg-red-50" @click="openConfirm('Hapus Kos', 'Hapus '+kos.nama+'?', 'danger', 'Kos dihapus.'); menuOpen=false">Hapus</button>
                    </div>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
        <!-- Empty State -->
        <div x-show="filteredKos.length === 0" style="display:none;" class="p-8 text-center text-sm text-slate-500">
          Kos tidak ditemukan.
        </div>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- VIEW 2: DETAIL KOS                         -->
  <!-- ========================================== -->
  <div x-show="view === 'detail'" x-transition.opacity style="display: none;" class="space-y-6">
    <button @click="view = 'list'" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg> 
      Kembali ke Data Kos
    </button>
    
    <div class="grid gap-6 lg:grid-cols-3">
      <!-- Kiri: Galeri & Info Detail -->
      <div class="space-y-6 lg:col-span-2">
        <!-- Galeri -->
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden" x-data="{ activeImage: 0, images: [] }" x-init="images = [currentKos?.img, 'photo-1616486338812-3dadae4b4ace', 'photo-1522708323590-d24dbb6b0267', 'photo-1502672260266-1c1ef2d93688']">
          <img :src="'https://images.unsplash.com/' + images[activeImage] + '?w=1000&h=560&fit=crop'" class="aspect-video w-full bg-slate-100 object-cover" />
          <div class="flex gap-2 p-3 overflow-x-auto">
            <template x-for="(img, index) in images">
              <button @click="activeImage = index" :class="activeImage === index ? 'ring-[#0b2046]' : 'ring-transparent'" class="h-16 w-20 shrink-0 overflow-hidden rounded-lg ring-2 transition">
                <img :src="'https://images.unsplash.com/' + img + '?w=160&h=120&fit=crop'" class="h-full w-full bg-slate-100 object-cover" />
              </button>
            </template>
          </div>
        </div>

        <!-- Detail Deskripsi -->
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
          <div class="flex flex-wrap items-start justify-between gap-3">
            <div>
              <h1 class="font-display text-2xl font-bold text-slate-900" x-text="currentKos?.nama"></h1>
              <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg> 
                Jl. Kebon Sirih No. 12, <span x-text="currentKos?.lokasi"></span>
              </p>
            </div>
            <div class="flex items-center gap-3">
              <span :class="{
                'bg-emerald-50 text-emerald-600': currentKos?.status === 'Aktif',
                'bg-amber-50 text-amber-600': currentKos?.status === 'Menunggu',
                'bg-slate-100 text-slate-600': currentKos?.status === 'Nonaktif'
              }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="currentKos?.status"></span>
            </div>
          </div>
          
          <p class="mt-4 text-sm leading-relaxed text-slate-500">
            Kos <span x-text="currentKos?.tipe.toLowerCase()"></span> nyaman dengan fasilitas lengkap, lokasi strategis dekat pusat kota dan transportasi umum.
            Cocok untuk mahasiswa maupun pekerja. Lingkungan aman dengan keamanan 24 jam.
          </p>

          <div class="mt-6">
            <h3 class="font-display font-semibold text-slate-900">Fasilitas</h3>
            <div class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3">
              <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 p-3 text-sm text-slate-900"><svg class="h-4 w-4 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg> WiFi Cepat</div>
              <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 p-3 text-sm text-slate-900"><svg class="h-4 w-4 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> AC</div>
              <div class="flex items-center gap-2.5 rounded-xl border border-slate-200 p-3 text-sm text-slate-900"><svg class="h-4 w-4 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg> Kamar Mandi Dalam</div>
            </div>
          </div>
          
          <div class="mt-6">
            <h3 class="font-display font-semibold text-slate-900">Peraturan Kos</h3>
            <ul class="mt-3 space-y-1.5 text-sm text-slate-500">
              <li>• Wajib lapor tamu yang menginap</li>
              <li>• Jam malam pukul 23.00 WIB</li>
              <li>• Menjaga kebersihan area bersama</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Kanan: Harga & Aksi -->
      <div class="space-y-6">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
          <p class="text-sm text-slate-500">Harga sewa per bulan</p>
          <p class="font-display text-3xl font-bold text-[#0b2046]" x-text="formatRupiah(currentKos?.harga)"></p>
          <div class="mt-4 rounded-xl bg-slate-50 p-4 text-center">
            <p class="text-sm text-slate-500">Ketersediaan Kamar</p>
            <p class="font-display text-xl font-bold text-slate-900"><span x-text="currentKos?.tersedia"></span> / <span x-text="currentKos?.kamar"></span> kamar</p>
          </div>
          
          <!-- Tombol Aksi -->
          <template x-if="currentKos?.status === 'Menunggu'">
            <div class="mt-4 grid grid-cols-2 gap-3">
              <button @click="openConfirm('Approve Kos', 'Setujui '+currentKos.nama+' agar tampil ke publik?', 'primary', 'Kos disetujui'); view='list'" class="flex items-center justify-center gap-2 rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white transition hover:opacity-90">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Approve
              </button>
              <button @click="openConfirm('Tolak Kos', 'Tolak '+currentKos.nama+'?', 'danger', 'Kos ditolak'); view='list'" class="flex items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-700">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg> Tolak
              </button>
            </div>
          </template>
          <button @click="openForm(currentKos)" class="mt-3 w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Edit Kos</button>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
          <h3 class="font-display font-semibold text-slate-900">Pemilik</h3>
          <div class="mt-3 flex items-center gap-3">
            <span class="grid h-11 w-11 place-items-center rounded-full bg-blue-50 font-semibold text-[#0b2046]" x-text="currentKos?.pemilik.substring(0,2).toUpperCase()"></span>
            <div><p class="font-medium text-slate-900" x-text="currentKos?.pemilik"></p><p class="text-xs text-slate-500">Pemilik terverifikasi</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- VIEW 3: FORM TAMBAH / EDIT KOS             -->
  <!-- ========================================== -->
  <div x-show="view === 'form'" x-transition.opacity style="display: none;" class="space-y-6">
    <button @click="view = currentKos ? 'detail' : 'list'" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg> 
      Kembali
    </button>
    
    <div>
      <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900" x-text="currentKos ? 'Edit Kos' : 'Tambah Kos Baru'"></h1>
      <p class="mt-1 text-sm text-slate-500">Lengkapi informasi kos di bawah ini.</p>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
      <!-- Kiri: Input Forms -->
      <div class="space-y-6 lg:col-span-2">
        
        <!-- Informasi Dasar -->
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
          <h3 class="font-display font-semibold text-slate-900">Informasi Dasar</h3>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Kos</label>
            <input type="text" :value="currentKos?.nama || ''" placeholder="Contoh: Kost Melati Residence" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
          </div>
          <div class="grid gap-4 sm:grid-cols-2">
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Pemilik</label>
              <input type="text" :value="currentKos?.pemilik || ''" placeholder="Nama pemilik" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
            </div>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Tipe Kos</label>
              <select class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
                <option :selected="currentKos?.tipe === 'Campur'">Campur</option>
                <option :selected="currentKos?.tipe === 'Putra'">Putra</option>
                <option :selected="currentKos?.tipe === 'Putri'">Putri</option>
              </select>
            </div>
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Alamat Lengkap</label>
            <textarea rows="2" placeholder="Jalan, nomor, RT/RW…" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15"></textarea>
          </div>
        </div>

        <!-- Harga & Kamar -->
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-4">
          <h3 class="font-display font-semibold text-slate-900">Harga & Kamar</h3>
          <div class="grid gap-4 sm:grid-cols-3">
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Harga / bln (Rp)</label>
              <input type="number" :value="currentKos?.harga || ''" placeholder="1500000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
            </div>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Jumlah Kamar</label>
              <input type="number" :value="currentKos?.kamar || ''" placeholder="20" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
            </div>
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Tersedia</label>
              <input type="number" :value="currentKos?.tersedia || ''" placeholder="5" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
            </div>
          </div>
        </div>
      </div>

      <!-- Kanan: Foto & Submit -->
      <div class="space-y-6">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
          <h3 class="font-display font-semibold text-slate-900">Foto Kos</h3>
          <div class="mt-3 grid grid-cols-2 gap-3">
            <template x-if="currentKos">
              <img :src="'https://images.unsplash.com/' + currentKos.img + '?w=200&h=200&fit=crop'" class="aspect-square rounded-xl bg-slate-100 object-cover" />
            </template>
            <button class="flex aspect-square flex-col items-center justify-center gap-1 rounded-xl border-2 border-dashed border-slate-200 text-slate-400 hover:border-[#0b2046] hover:text-[#0b2046] transition">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
              <span class="text-xs font-medium">Tambah</span>
            </button>
          </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-3">
          <button @click="openConfirm('Publikasikan Kos', 'Simpan dan tampilkan kos ke publik?', 'primary', 'Kos berhasil disimpan.'); view='list'" class="w-full rounded-xl bg-[#0b2046] px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:opacity-90">Simpan & Publish</button>
          <button @click="view = currentKos ? 'detail' : 'list'" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Konfirmasi Umum (Hapus / Approve) -->
  <div x-show="confirmModal.isOpen" style="display: none;" class="fixed inset-0 z-[60] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="confirmModal.isOpen = false"></div>
    <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl text-center" x-show="confirmModal.isOpen">
      <h3 class="font-display text-lg font-bold text-slate-900 mb-2" x-text="confirmModal.title"></h3>
      <p class="text-sm text-slate-500 mb-6" x-text="confirmModal.message"></p>
      <div class="flex gap-3 justify-center">
        <button @click="confirmModal.isOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
        <button @click="confirmModal.isOpen = false" :class="confirmModal.tone === 'danger' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-[#0b2046] hover:opacity-90 text-white'" class="rounded-xl px-4 py-2 text-sm font-semibold shadow-sm" x-text="confirmModal.tone === 'danger' ? 'Hapus' : 'Lanjutkan'"></button>
      </div>
    </div>
  </div>

</div>

<!-- Logic State Alpine.js -->
<script>
  function kosData() {
    return {
      view: 'list', // 'list' | 'detail' | 'form'
      searchQuery: '',
      filterStatus: 'Semua Status',
      currentKos: null,
      confirmModal: { isOpen: false, title: '', message: '', tone: '' },
      
      // Dummy Data Kos
      kosDataList: [
        { id: 'KOS-001', img: 'photo-1522708323590-d24dbb6b0267', nama: 'Kost Melati Residence', lokasi: 'Bandung', pemilik: 'Ahmad Faisal', harga: 1500000, kamar: 20, tersedia: 5, tipe: 'Campur', rating: 4.8, status: 'Aktif' },
        { id: 'KOS-002', img: 'photo-1502672260266-1c1ef2d93688', nama: 'Wisma Asri Jaya', lokasi: 'Jakarta', pemilik: 'Budi Hartono', harga: 2000000, kamar: 15, tersedia: 2, tipe: 'Putra', rating: 4.5, status: 'Menunggu' },
        { id: 'KOS-003', img: 'photo-1616486338812-3dadae4b4ace', nama: 'Graha Putri Sejahtera', lokasi: 'Yogyakarta', pemilik: 'Citra Kirana', harga: 800000, kamar: 30, tersedia: 12, tipe: 'Putri', rating: 4.9, status: 'Aktif' },
        { id: 'KOS-004', img: 'photo-1560448204-e02f11c3d0e2', nama: 'Kost Eksklusif Senayan', lokasi: 'Jakarta', pemilik: 'Ahmad Faisal', harga: 3500000, kamar: 10, tersedia: 0, tipe: 'Campur', rating: 5.0, status: 'Aktif' },
        { id: 'KOS-005', img: 'photo-1513694203232-719a280e022f', nama: 'Pondok Rindang', lokasi: 'Malang', pemilik: 'Eko Pratama', harga: 650000, kamar: 25, tersedia: 8, tipe: 'Putra', rating: 4.2, status: 'Nonaktif' }
      ],
      
      // Getter Computed untuk memfilter Kos
      get filteredKos() {
        return this.kosDataList.filter(k => 
          (k.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
           k.lokasi.toLowerCase().includes(this.searchQuery.toLowerCase())) &&
          (this.filterStatus === 'Semua Status' || k.status === this.filterStatus)
        );
      },
      
      // Helper mengubah angka menjadi Rupiah
      formatRupiah(number) {
        if(!number) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
      },

      // Navigasi Views
      openDetail(kos) {
        this.currentKos = kos;
        this.view = 'detail';
        window.scrollTo(0,0);
      },
      openForm(kos) {
        this.currentKos = kos; // null jika tambah baru
        this.view = 'form';
        window.scrollTo(0,0);
      },
      openConfirm(title, message, tone) {
        this.confirmModal = { isOpen: true, title, message, tone };
      }
    };
  }
</script>
@endsection