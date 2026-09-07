<!-- resources/views/admin/pemilik.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans" x-data="pemilikData()">
  
  <!-- Page Header -->
  <div>
    <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Pemilik Kos</h1>
    <p class="mt-1 text-sm text-slate-500">Verifikasi dan kelola akun pemilik kos.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
    <!-- Stat 1: Total Pemilik -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Total Pemilik</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">326</p>
        </div>
      </div>
    </div>
    
    <!-- Stat 2: Pemilik Aktif -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Pemilik Aktif</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">298</p>
        </div>
      </div>
    </div>

    <!-- Stat 3: Menunggu Verifikasi -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Menunggu Verifikasi</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">21</p>
        </div>
      </div>
    </div>

    <!-- Stat 4: Ditolak -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Ditolak</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">7</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Data Table Card -->
  <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
    <!-- Filter Header -->
    <div class="flex flex-wrap items-center gap-3 border-b border-slate-200 p-4">
      <!-- Search Input -->
      <div class="relative min-w-[220px] flex-1">
        <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" x-model="searchQuery" placeholder="Cari pemilik…" class="w-full rounded-xl border border-slate-200 bg-white py-2 pl-9 pr-3 text-sm outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
      </div>

      <!-- Filter Dropdown -->
      <select x-model="filterStatus" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
        <option value="Semua Status">Semua Status</option>
        <option value="Terverifikasi">Terverifikasi</option>
        <option value="Menunggu">Menunggu</option>
        <option value="Ditolak">Ditolak</option>
      </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full min-w-[820px] text-sm">
        <thead>
          <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
            <th class="px-5 py-3">Pemilik</th>
            <th class="px-5 py-3">Nomor HP</th>
            <th class="px-5 py-3">Jumlah Kos</th>
            <th class="px-5 py-3">Tanggal Daftar</th>
            <th class="px-5 py-3">Verifikasi</th>
            <th class="px-5 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Alpine JS Loop for Table Rows -->
          <template x-for="owner in filteredOwners" :key="owner.id">
            <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
              <td class="px-5 py-3">
                <div class="flex items-center gap-3">
                  <!-- Avatar -->
                  <div class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-200 font-display text-sm font-semibold text-slate-600" x-text="owner.avatar"></div>
                  <span>
                    <span class="block font-medium text-slate-900" x-text="owner.nama"></span>
                    <span class="block text-xs text-slate-500" x-text="owner.email"></span>
                  </span>
                </div>
              </td>
              <td class="px-5 py-3 text-slate-500" x-text="owner.hp"></td>
              <td class="px-5 py-3 font-semibold text-slate-900"><span x-text="owner.kos"></span> kos</td>
              <td class="px-5 py-3 text-slate-500" x-text="owner.daftar"></td>
              <td class="px-5 py-3">
                <!-- Status Badge -->
                <span :class="{
                  'bg-emerald-50 text-emerald-600': owner.status === 'Terverifikasi',
                  'bg-amber-50 text-amber-600': owner.status === 'Menunggu',
                  'bg-red-50 text-red-600': owner.status === 'Ditolak'
                }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="owner.status"></span>
              </td>
              <td class="px-5 py-3 text-right">
                <div class="flex items-center justify-end gap-2">
                  <!-- Main Action Button -->
                  <template x-if="owner.status === 'Menunggu'">
                    <button @click="openVerify(owner)" class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-[#0b2046] hover:bg-blue-100 transition">Verifikasi</button>
                  </template>
                  <template x-if="owner.status !== 'Menunggu'">
                    <button @click="openVerify(owner)" class="rounded-lg px-3 py-1.5 text-xs font-semibold text-[#0b2046] hover:bg-slate-100 transition">Detail</button>
                  </template>
                  
                  <!-- Dropdown Actions -->
                  <div class="relative inline-block" x-data="{ menuOpen: false }">
                    <button @click="menuOpen = !menuOpen" @click.outside="menuOpen = false" class="p-1.5 rounded text-slate-400 hover:bg-slate-100">
                       <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" /></svg>
                    </button>
                    <div x-show="menuOpen" style="display: none;" class="absolute right-0 mt-1 w-36 rounded-xl border border-slate-200 bg-white py-1 shadow-lg z-10 text-left">
                      <button class="w-full block px-4 py-2 text-sm text-red-600 hover:bg-red-50" @click="openConfirm('Tolak Pemilik', 'Tolak verifikasi untuk ' + owner.nama + '?', 'danger', 'Penolakan terkirim ke pemilik.'); menuOpen=false">Tolak</button>
                      <button class="w-full block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50" @click="openConfirm('Suspend Pemilik', 'Tangguhkan akun ' + owner.nama + '?', 'danger', 'Akun pemilik ditangguhkan.'); menuOpen=false">Suspend</button>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
      
      <!-- Empty State -->
      <div x-show="filteredOwners.length === 0" style="display:none;" class="p-8 text-center text-sm text-slate-500">
        Tidak ada pemilik yang cocok dengan pencarian.
      </div>
    </div>
  </div>

  <!-- Modal Verifikasi & Detail -->
  <div x-show="verifyModal.isOpen" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeVerify()" x-transition.opacity></div>
    
    <div class="relative w-full max-w-lg rounded-2xl bg-white shadow-2xl flex flex-col" x-transition x-show="verifyModal.isOpen">
      
      <!-- State 1: Tampilan Detail/Verifikasi -->
      <template x-if="!verifyModal.isDone">
        <div>
          <!-- Header -->
          <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <h3 class="font-display text-lg font-bold text-slate-900">Verifikasi Pemilik</h3>
            <button @click="closeVerify()" class="text-slate-400 hover:text-slate-500">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
          </div>
          
          <!-- Body -->
          <div class="p-6">
            <div class="mb-5 flex items-center gap-4 rounded-2xl bg-slate-50 p-4 border border-slate-100">
              <div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-slate-200 font-display text-lg font-bold text-slate-600" x-text="verifyModal.data?.avatar"></div>
              <div>
                <p class="font-display font-semibold text-slate-900" x-text="verifyModal.data?.nama"></p>
                <p class="text-sm text-slate-500" x-text="verifyModal.data?.email"></p>
              </div>
            </div>
            
            <div class="space-y-3">
              <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Nomor HP</span><span class="text-sm font-medium text-slate-900" x-text="verifyModal.data?.hp"></span></div>
              <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Jumlah Kos Terdaftar</span><span class="text-sm font-medium text-slate-900" x-text="verifyModal.data?.kos + ' kos'"></span></div>
              <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Tanggal Pendaftaran</span><span class="text-sm font-medium text-slate-900" x-text="verifyModal.data?.daftar"></span></div>
              <div class="flex justify-between border-b border-slate-100 pb-2">
                <span class="text-sm text-slate-500">Status Saat Ini</span>
                <span :class="{
                  'bg-emerald-50 text-emerald-600': verifyModal.data?.status === 'Terverifikasi',
                  'bg-amber-50 text-amber-600': verifyModal.data?.status === 'Menunggu',
                  'bg-red-50 text-red-600': verifyModal.data?.status === 'Ditolak'
                }" class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-semibold" x-text="verifyModal.data?.status"></span>
              </div>
            </div>

            <!-- Dokumen Pendukung -->
            <div class="mt-5">
              <p class="mb-2 text-sm font-medium text-slate-900">Dokumen Pendukung</p>
              <div class="grid grid-cols-2 gap-2">
                <div class="flex items-center gap-2 rounded-xl border border-slate-200 p-3 text-sm hover:bg-slate-50 cursor-pointer transition">
                  <svg class="h-4 w-4 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> 
                  <span class="truncate text-slate-900 font-medium">KTP.jpg</span>
                </div>
                <div class="flex items-center gap-2 rounded-xl border border-slate-200 p-3 text-sm hover:bg-slate-50 cursor-pointer transition">
                  <svg class="h-4 w-4 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> 
                  <span class="truncate text-slate-900 font-medium">Surat Kepemilikan.pdf</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Footer Actions -->
          <div class="border-t border-slate-200 px-6 py-4 flex justify-end gap-3 bg-slate-50 rounded-b-2xl">
            <template x-if="verifyModal.data?.status === 'Menunggu'">
              <div class="flex gap-3">
                <button @click="closeVerify()" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
                <button @click="doVerify()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90">Verifikasi Sekarang</button>
              </div>
            </template>
            <template x-if="verifyModal.data?.status !== 'Menunggu'">
              <button @click="closeVerify()" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Tutup</button>
            </template>
          </div>
        </div>
      </template>

      <!-- State 2: Sukses Verifikasi -->
      <template x-if="verifyModal.isDone">
        <div>
          <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <h3 class="font-display text-lg font-bold text-slate-900">Verifikasi Berhasil</h3>
          </div>
          <div class="p-8 text-center flex flex-col items-center">
            <span class="grid h-16 w-16 place-items-center rounded-full bg-emerald-50 text-emerald-600 mb-4">
              <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </span>
            <p class="font-medium text-slate-900"><span x-text="verifyModal.data?.nama"></span> berhasil diverifikasi.</p>
          </div>
          <div class="border-t border-slate-200 px-6 py-4 flex justify-end bg-slate-50 rounded-b-2xl">
            <button @click="closeVerify()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90">Selesai</button>
          </div>
        </div>
      </template>
    </div>
  </div>

  <!-- Confirm / Reject Modal -->
  <div x-show="confirmModal.isOpen" style="display: none;" class="fixed inset-0 z-[60] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="confirmModal.isOpen = false"></div>
    <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl text-center" x-show="confirmModal.isOpen">
      <h3 class="font-display text-lg font-bold text-slate-900 mb-2" x-text="confirmModal.title"></h3>
      <p class="text-sm text-slate-500 mb-6" x-text="confirmModal.message"></p>
      <div class="flex gap-3 justify-center">
        <button @click="confirmModal.isOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
        <button @click="confirmModal.isOpen = false" class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700" x-text="confirmModal.confirmLabel"></button>
      </div>
    </div>
  </div>

</div>

<!-- Script Manajemen State Alpine JS -->
<script>
  function pemilikData() {
    return {
      searchQuery: '',
      filterStatus: 'Semua Status',
      // Dummy Data Pemilik Kos
      owners: [
        { id: 'OWN-001', nama: 'Ahmad Faisal', email: 'ahmad@example.com', hp: '08111222333', kos: 3, daftar: '10 Jan 2026', status: 'Terverifikasi', avatar: 'AF' },
        { id: 'OWN-002', nama: 'Budi Hartono', email: 'budi.h@example.com', hp: '08222333444', kos: 1, daftar: '02 Sep 2026', status: 'Menunggu', avatar: 'BH' },
        { id: 'OWN-003', nama: 'Citra Kirana', email: 'citra@example.com', hp: '08333444555', kos: 5, daftar: '15 Agu 2026', status: 'Terverifikasi', avatar: 'CK' },
        { id: 'OWN-004', nama: 'Diana Putri', email: 'diana@example.com', hp: '08444555666', kos: 0, daftar: '01 Sep 2026', status: 'Ditolak', avatar: 'DP' },
        { id: 'OWN-005', nama: 'Eko Pratama', email: 'eko.p@example.com', hp: '08555666777', kos: 2, daftar: '28 Agu 2026', status: 'Menunggu', avatar: 'EP' },
      ],
      verifyModal: { isOpen: false, isDone: false, data: null },
      confirmModal: { isOpen: false, title: '', message: '', tone: '', confirmLabel: '' },
      
      // Fungsi Search & Filter Dinamis
      get filteredOwners() {
        return this.owners.filter(o => 
          o.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) &&
          (this.filterStatus === 'Semua Status' || o.status === this.filterStatus)
        );
      },
      
      // Manajemen Modal Verifikasi
      openVerify(owner) {
        this.verifyModal = { isOpen: true, isDone: false, data: owner };
      },
      closeVerify() {
        this.verifyModal.isOpen = false;
        setTimeout(() => { this.verifyModal.isDone = false; this.verifyModal.data = null; }, 300);
      },
      doVerify() {
        // Simulasi proses API
        this.verifyModal.isDone = true;
        this.verifyModal.data.status = 'Terverifikasi';
      },

      // Manajemen Modal Penolakan / Suspend
      openConfirm(title, message, tone, successMsg) {
        this.confirmModal = { 
          isOpen: true, 
          title: title, 
          message: message, 
          tone: tone, 
          confirmLabel: title.includes('Tolak') ? 'Tolak' : 'Suspend'
        };
      }
    };
  }
</script>
@endsection