<!-- resources/views/admin/pengguna.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans" x-data="penggunaData()">
  
  <!-- Page Header -->
  <div>
    <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Manajemen Pengguna</h1>
    <p class="mt-1 text-sm text-slate-500">Kelola akun pengguna platform Kosan.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
    <!-- Stat 1: Total Pengguna -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Total Pengguna</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">2.548</p>
        </div>
      </div>
    </div>
    
    <!-- Stat 2: Pengguna Aktif -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Pengguna Aktif</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">2.311</p>
        </div>
      </div>
    </div>

    <!-- Stat 3: Ditangguhkan -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-red-50 text-red-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Ditangguhkan</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">47</p>
        </div>
      </div>
    </div>

    <!-- Stat 4: Baru Bulan Ini -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </span>
        <div>
          <p class="text-xs font-semibold text-slate-500">Baru Bulan Ini</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900">302</p>
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
        <input type="text" x-model="searchQuery" placeholder="Cari nama atau email…" class="w-full rounded-xl border border-slate-200 bg-white py-2 pl-9 pr-3 text-sm outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
      </div>

      <!-- Filter Dropdowns -->
      <select x-model="filterStatus" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
        <option value="Semua Status">Semua Status</option>
        <option value="Aktif">Aktif</option>
        <option value="Nonaktif">Nonaktif</option>
        <option value="Ditangguhkan">Ditangguhkan</option>
      </select>
      
      <select x-model="filterSort" class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm outline-none focus:border-[#0b2046]">
        <option value="Terbaru">Terbaru</option>
        <option value="Booking Terbanyak">Booking Terbanyak</option>
      </select>
      
      <button class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
        Filter Tanggal
      </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="w-full min-w-[820px] text-sm">
        <thead>
          <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
            <th class="px-5 py-3">Pengguna</th>
            <th class="px-5 py-3">Nomor HP</th>
            <th class="px-5 py-3">Bergabung</th>
            <th class="px-5 py-3">Booking</th>
            <th class="px-5 py-3">Status</th>
            <th class="px-5 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Alpine JS Loop for Table Rows -->
          <template x-for="user in paginatedUsers" :key="user.id">
            <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
              <td class="px-5 py-3">
                <button @click="openDetail(user)" class="flex items-center gap-3 text-left w-full focus:outline-none">
                  <!-- Avatar -->
                  <div class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-200 font-display text-sm font-semibold text-slate-600" x-text="user.avatar"></div>
                  <span>
                    <span class="block font-medium text-slate-900 hover:text-[#0b2046]" x-text="user.nama"></span>
                    <span class="block text-xs text-slate-500" x-text="user.email"></span>
                  </span>
                </button>
              </td>
              <td class="px-5 py-3 text-slate-500" x-text="user.hp"></td>
              <td class="px-5 py-3 text-slate-500" x-text="user.gabung"></td>
              <td class="px-5 py-3 font-semibold text-slate-900" x-text="user.booking"></td>
              <td class="px-5 py-3">
                <!-- Status Badge -->
                <span :class="{
                  'bg-emerald-50 text-emerald-600': user.status === 'Aktif',
                  'bg-slate-100 text-slate-600': user.status === 'Nonaktif',
                  'bg-red-50 text-red-600': user.status === 'Ditangguhkan'
                }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="user.status"></span>
              </td>
              <td class="px-5 py-3 text-right">
                <button @click="openDetail(user)" class="font-semibold text-[#0b2046] hover:underline mr-3">Detail</button>
                <div class="relative inline-block" x-data="{ menuOpen: false }">
                  <button @click="menuOpen = !menuOpen" @click.outside="menuOpen = false" class="p-1 rounded text-slate-400 hover:bg-slate-100">
                     <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" /></svg>
                  </button>
                  <!-- Dropdown Menu -->
                  <div x-show="menuOpen" style="display: none;" class="absolute right-0 mt-1 w-32 rounded-xl border border-slate-200 bg-white py-1 shadow-lg z-10 text-left">
                    <button class="w-full block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50" @click="openConfirm('Edit Pengguna', 'Buka editor?', 'primary'); menuOpen=false">Edit</button>
                    <button class="w-full block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50" @click="openConfirm('Ubah Status', 'Ubah status akun?', 'primary'); menuOpen=false" x-text="user.status === 'Ditangguhkan' ? 'Aktifkan' : 'Suspend'"></button>
                    <button class="w-full block px-4 py-2 text-sm text-red-600 hover:bg-red-50" @click="openConfirm('Hapus Pengguna', 'Hapus akun ini permanen?', 'danger'); menuOpen=false">Hapus</button>
                  </div>
                </div>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
      
      <!-- Empty State -->
      <div x-show="filteredUsers.length === 0" style="display:none;" class="p-8 text-center text-sm text-slate-500">
        Tidak ada pengguna yang cocok dengan pencarian.
      </div>
    </div>
    
    <!-- Pagination (Dummy) -->
    <div class="border-t border-slate-200 px-5 py-3 flex items-center justify-between" x-show="filteredUsers.length > 0">
      <span class="text-sm text-slate-500">Menampilkan <span x-text="((page - 1) * perPage) + 1"></span> - <span x-text="Math.min(page * perPage, filteredUsers.length)"></span> dari <span x-text="filteredUsers.length"></span></span>
      <div class="flex gap-1">
        <button @click="if(page > 1) page--" class="rounded px-3 py-1 text-sm border border-slate-200 hover:bg-slate-50" :disabled="page === 1">Prev</button>
        <button @click="if(page < totalPages) page++" class="rounded px-3 py-1 text-sm border border-slate-200 hover:bg-slate-50" :disabled="page === totalPages">Next</button>
      </div>
    </div>
  </div>

  <!-- Detail Modal -->
  <div x-show="selectedUser" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeDetail()" x-transition.opacity></div>
    <div class="relative w-full max-w-2xl rounded-2xl bg-white shadow-2xl flex flex-col max-h-[90vh]" x-transition x-show="selectedUser">
      <!-- Modal Header -->
      <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
        <h3 class="font-display text-lg font-bold text-slate-900">Detail Pengguna</h3>
        <button @click="closeDetail()" class="text-slate-400 hover:text-slate-500">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      
      <!-- Modal Body -->
      <div class="p-6 overflow-y-auto" x-data="{ activeTab: 'info' }">
        <!-- User Info Card -->
        <div class="flex flex-col items-center gap-4 rounded-2xl bg-slate-50 p-5 sm:flex-row sm:items-center">
          <div class="grid h-16 w-16 place-items-center rounded-full bg-slate-200 font-display text-xl font-bold text-slate-600" x-text="selectedUser?.avatar"></div>
          <div class="text-center sm:text-left">
            <h4 class="font-display text-lg font-semibold text-slate-900" x-text="selectedUser?.nama"></h4>
            <p class="text-sm text-slate-500"><span x-text="selectedUser?.email"></span> · <span x-text="selectedUser?.hp"></span></p>
            <div class="mt-2 flex justify-center gap-2 sm:justify-start">
              <span :class="{
                  'bg-emerald-50 text-emerald-600': selectedUser?.status === 'Aktif',
                  'bg-slate-100 text-slate-600': selectedUser?.status === 'Nonaktif',
                  'bg-red-50 text-red-600': selectedUser?.status === 'Ditangguhkan'
                }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="selectedUser?.status"></span>
            </div>
          </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="mt-5 flex gap-1 rounded-xl bg-slate-50 p-1">
          <button @click="activeTab = 'info'" :class="{'bg-white text-[#0b2046] shadow-sm': activeTab === 'info', 'text-slate-500 hover:text-slate-900': activeTab !== 'info'}" class="flex-1 rounded-lg px-3 py-2 text-sm font-semibold transition">Informasi</button>
          <button @click="activeTab = 'booking'" :class="{'bg-white text-[#0b2046] shadow-sm': activeTab === 'booking', 'text-slate-500 hover:text-slate-900': activeTab !== 'booking'}" class="flex-1 rounded-lg px-3 py-2 text-sm font-semibold transition">Riwayat Booking</button>
          <button @click="activeTab = 'transaksi'" :class="{'bg-white text-[#0b2046] shadow-sm': activeTab === 'transaksi', 'text-slate-500 hover:text-slate-900': activeTab !== 'transaksi'}" class="flex-1 rounded-lg px-3 py-2 text-sm font-semibold transition">Transaksi</button>
        </div>

        <!-- Tab Content -->
        <div class="mt-5">
          <!-- Info Tab -->
          <div x-show="activeTab === 'info'" class="space-y-4">
            <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">ID Pengguna</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.id"></span></div>
            <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Email</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.email"></span></div>
            <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Nomor HP</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.hp"></span></div>
            <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Tanggal Bergabung</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.gabung"></span></div>
            <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Total Booking</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.booking + ' kali'"></span></div>
          </div>
          <!-- Other tabs placeholder -->
          <div x-show="activeTab !== 'info'" class="py-10 text-center text-sm text-slate-500">
            Data <span x-text="activeTab"></span> belum tersedia.
          </div>
        </div>
      </div>
      
      <!-- Modal Footer -->
      <div class="border-t border-slate-200 px-6 py-4 flex justify-end">
        <button @click="closeDetail()" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Tutup</button>
      </div>
    </div>
  </div>

  <!-- Confirm Modal -->
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

<!-- Alpine Script for logic state management -->
<script>
  function penggunaData() {
    return {
      searchQuery: '',
      filterStatus: 'Semua Status',
      filterSort: 'Terbaru',
      page: 1,
      perPage: 6,
      selectedUser: null,
      confirmModal: { isOpen: false, title: '', message: '', tone: '' },
      // Dummy data array
      users: [
        { id: 'USR-001', nama: 'Andika Dwi Januar', email: 'andika@example.com', hp: '08123456789', gabung: '12 Jan 2026', booking: 5, status: 'Aktif', avatar: 'AD' },
        { id: 'USR-002', nama: 'Siti Rahma', email: 'siti@example.com', hp: '08987654321', gabung: '05 Feb 2026', booking: 2, status: 'Aktif', avatar: 'SR' },
        { id: 'USR-003', nama: 'Budi Santoso', email: 'budi@example.com', hp: '08561231231', gabung: '20 Nov 2025', booking: 12, status: 'Ditangguhkan', avatar: 'BS' },
        { id: 'USR-004', nama: 'Cintya Dewi', email: 'cintya@example.com', hp: '08112233445', gabung: '15 Mar 2026', booking: 0, status: 'Nonaktif', avatar: 'CD' },
        { id: 'USR-005', nama: 'Eko Wahyudi', email: 'eko@example.com', hp: '08223344556', gabung: '10 Apr 2026', booking: 8, status: 'Aktif', avatar: 'EW' },
        { id: 'USR-006', nama: 'Fajar Siddiq', email: 'fajar@example.com', hp: '08334455667', gabung: '01 Mei 2026', booking: 1, status: 'Aktif', avatar: 'FS' },
        { id: 'USR-007', nama: 'Gita Savitri', email: 'gita@example.com', hp: '08445566778', gabung: '22 Jun 2026', booking: 4, status: 'Aktif', avatar: 'GS' }
      ],
      get filteredUsers() {
        let result = this.users.filter(u => 
          (u.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
           u.email.toLowerCase().includes(this.searchQuery.toLowerCase())) &&
          (this.filterStatus === 'Semua Status' || u.status === this.filterStatus)
        );
        if (this.filterSort === 'Booking Terbanyak') {
          result = result.sort((a, b) => b.booking - a.booking);
        }
        // reset pagination on filter change
        return result;
      },
      get totalPages() {
        return Math.max(1, Math.ceil(this.filteredUsers.length / this.perPage));
      },
      get paginatedUsers() {
        const start = (this.page - 1) * this.perPage;
        const end = start + this.perPage;
        return this.filteredUsers.slice(start, end);
      },
      openDetail(user) {
        this.selectedUser = user;
      },
      closeDetail() {
        this.selectedUser = null;
      },
      openConfirm(title, message, tone) {
        this.confirmModal = { isOpen: true, title, message, tone };
      },
      // watcher for search and filter to reset page
      init() {
        this.$watch('searchQuery', () => { this.page = 1; });
        this.$watch('filterStatus', () => { this.page = 1; });
        this.$watch('filterSort', () => { this.page = 1; });
      }
    };
  }
</script>
@endsection