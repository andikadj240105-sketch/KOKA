@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans" x-data="penggunaData({{ json_encode($penggunaData) }})">
  
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
          <p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="users.length"></p>
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
          <p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="users.filter(u => u.status === 'Aktif').length"></p>
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
          <p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="users.filter(u => u.status === 'Ditangguhkan').length"></p>
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
          <p class="text-xs font-semibold text-slate-500">Baru Terdaftar</p>
          <p class="font-display text-lg font-bold tracking-tight text-slate-900" x-text="users.length"></p>
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
                  <!-- Avatar Inisial -->
                  <div class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-slate-200 font-display text-sm font-semibold text-slate-600" x-text="user.nama ? user.nama.substring(0,2).toUpperCase() : 'US'"></div>
                  <span>
                    <span class="block font-medium text-slate-900 hover:text-[#0b2046]" x-text="user.nama"></span>
                    <span class="block text-xs text-slate-500" x-text="user.email"></span>
                  </span>
                </button>
              </td>
              <td class="px-5 py-3 text-slate-500" x-text="user.hp"></td>
              <td class="px-5 py-3 text-slate-500" x-text="user.bergabung"></td>
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
    
    <!-- Pagination -->
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
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeDetail()"></div>
    <div class="relative w-full max-w-2xl rounded-2xl bg-white shadow-2xl flex flex-col max-h-[90vh]" x-show="selectedUser">
      <!-- Modal Header -->
      <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
        <h3 class="font-display text-lg font-bold text-slate-900">Detail Pengguna</h3>
        <button @click="closeDetail()" class="text-slate-400 hover:text-slate-500">
          <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      
      <!-- Modal Body -->
      <div class="p-6 overflow-y-auto">
        <div class="flex flex-col items-center gap-4 rounded-2xl bg-slate-50 p-5 sm:flex-row sm:items-center">
          <div class="grid h-16 w-16 place-items-center rounded-full bg-slate-200 font-display text-xl font-bold text-slate-600" x-text="selectedUser?.nama ? selectedUser.nama.substring(0,2).toUpperCase() : 'US'"></div>
          <div class="text-center sm:text-left">
            <h4 class="font-display text-lg font-semibold text-slate-900" x-text="selectedUser?.nama"></h4>
            <p class="text-sm text-slate-500"><span x-text="selectedUser?.email"></span> · <span x-text="selectedUser?.hp"></span></p>
          </div>
        </div>

        <div class="mt-5 space-y-4">
          <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">ID Pengguna</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.id"></span></div>
          <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Email</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.email"></span></div>
          <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Nomor HP</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.hp"></span></div>
          <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Tanggal Bergabung</span><span class="text-sm font-medium text-slate-900" x-text="selectedUser?.bergabung"></span></div>
        </div>
      </div>
      
      <!-- Modal Footer -->
      <div class="border-t border-slate-200 px-6 py-4 flex justify-end">
        <button @click="closeDetail()" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Tutup</button>
      </div>
    </div>
  </div>

</div>

<!-- Alpine Script -->
<script>
  function penggunaData(dataDariLaravel) {
    return {
      searchQuery: '',
      filterStatus: 'Semua Status',
      users: dataDariLaravel,
      page: 1,
      perPage: 10,
      selectedUser: null,

      get filteredUsers() {
        return this.users.filter(u => {
          const matchSearch = (u.nama && u.nama.toLowerCase().includes(this.searchQuery.toLowerCase())) || 
                              (u.email && u.email.toLowerCase().includes(this.searchQuery.toLowerCase()));
          const matchStatus = this.filterStatus === 'Semua Status' || u.status === this.filterStatus;
          return matchSearch && matchStatus;
        });
      },

      get totalPages() {
        return Math.ceil(this.filteredUsers.length / this.perPage) || 1;
      },

      get paginatedUsers() {
        let start = (this.page - 1) * this.perPage;
        return this.filteredUsers.slice(start, start + this.perPage);
      },

      openDetail(user) {
        this.selectedUser = user;
      },

      closeDetail() {
        this.selectedUser = null;
      }
    }
  }
</script>
@endsection