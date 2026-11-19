<!-- resources/views/admin/layanan.blade.php -->
@extends('admin.layout')

@section('content')
<div x-data="layananData()" class="font-sans">
  
  <!-- ========================================== -->
  <!-- VIEW 1: DAFTAR LAYANAN                     -->
  <!-- ========================================== -->
  <div x-show="view === 'list'" x-transition.opacity class="space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Layanan On-Demand</h1>
        <p class="mt-1 text-sm text-slate-500">Kelola layanan tambahan platform Kosan.</p>
      </div>
      <button @click="openModal('add')" class="flex items-center gap-2 rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Tambah Layanan
      </button>
    </div>

    <!-- Grid Layanan Dinamis -->
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
      <template x-for="s in services" :key="s.key">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
          
          <div class="flex items-center justify-between">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-[#0b2046]" x-html="getIcon(s.icon)"></span>
            
            <button @click="toggleServiceStatus(s)" :class="s.aktif ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 rounded-full transition-colors duration-200 ease-in-out focus:outline-none">
            <span :class="s.aktif ? 'translate-x-[22px]' : 'translate-x-0.5'" class="absolute top-0.5 left-0 inline-block h-5 w-5 transform rounded-full bg-white shadow transition-transform duration-200 ease-in-out"></span>
            </button>
          </div>
          
          <h3 class="mt-4 font-display text-lg font-semibold text-slate-900" x-text="s.nama"></h3>
          <p class="text-sm text-slate-500 line-clamp-2" x-text="s.desc"></p>
          
          <div class="mt-4 grid grid-cols-2 gap-3">
            <div class="rounded-xl bg-slate-50 p-3">
              <p class="text-xs text-slate-500">Total Order</p>
              <p class="font-display font-bold text-slate-900" x-text="s.order.toLocaleString('id-ID')"></p>
            </div>
            <div class="rounded-xl bg-slate-50 p-3">
              <p class="text-xs text-slate-500">Pendapatan</p>
              <p class="font-display font-bold text-slate-900" x-text="formatRupiah(s.pendapatan)"></p>
            </div>
          </div>
          
          <div class="mt-4 flex items-center gap-2">
            <!-- Tombol Lihat Order -->
            <button @click="openDetail(s)" 
                    :disabled="!s.aktif" 
                    :class="!s.aktif ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-100'" 
                    class="flex-1 rounded-lg bg-blue-50 py-2 text-sm font-semibold text-[#0b2046] transition">
              Lihat Order
            </button>
            
            <!-- Tombol Edit -->
            <button @click="openEditModal(s)" 
                    :disabled="!s.aktif" 
                    :class="!s.aktif ? 'opacity-50 cursor-not-allowed' : 'hover:bg-slate-50'" 
                    class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition">
              Edit
            </button>
            
            <!-- Tombol Hapus -->
            <button @click="openConfirm('Hapus Layanan', 'Hapus layanan ' + s.nama + '?', 'danger')" 
                    :disabled="!s.aktif" 
                    :class="!s.aktif ? 'opacity-50 cursor-not-allowed' : 'hover:bg-red-50'" 
                    class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-red-600 transition">
              Hapus
            </button>
          </div>
          
        </div>
      </template>
    </div>

  </div>

  <!-- ========================================== -->
  <!-- VIEW 2: DETAIL LAYANAN & ORDER             -->
  <!-- ========================================== -->
  <div x-show="view === 'detail'" x-transition.opacity style="display: none;" class="space-y-6">
    <button @click="view = 'list'" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-900 transition">
      <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg> 
      Kembali ke Layanan
    </button>
    
    <!-- Detail Header -->
    <div class="flex items-center gap-4">
      <span class="grid h-14 w-14 place-items-center rounded-2xl bg-[#0b2046] text-[#E5B044] shadow-sm" x-html="getIcon(currentService?.icon)"></span>
      <div>
        <h1 class="font-display text-2xl font-bold text-slate-900" x-text="currentService?.nama"></h1>
        <p class="text-sm text-slate-500" x-text="currentService?.desc"></p>
      </div>
    </div>

    <!-- Stats Row -->
    <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-blue-50 text-[#0b2046]"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg></span>
        <div><p class="text-xs font-semibold text-slate-500">Total Order</p><p class="font-display text-lg font-bold text-slate-900" x-text="currentService?.order.toLocaleString('id-ID')"></p></div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg></span>
        <div><p class="text-xs font-semibold text-slate-500">Pendapatan</p><p class="font-display text-lg font-bold text-slate-900" x-text="formatRupiah(currentService?.pendapatan)"></p></div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-amber-50 text-amber-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></span>
        <div><p class="text-xs font-semibold text-slate-500">Order Aktif</p><p class="font-display text-lg font-bold text-slate-900" x-text="serviceOrders.length"></p></div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-violet-50 text-violet-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></span>
        <div><p class="text-xs font-semibold text-slate-500">Rating Rata-rata</p><p class="font-display text-lg font-bold text-slate-900">4,7 ★</p></div>
      </div>
    </div>

    <!-- Table Daftar Order Dinamis -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
      <div class="border-b border-slate-200 px-5 py-4"><h3 class="font-display font-semibold text-slate-900">Daftar Order</h3></div>
      <div class="overflow-x-auto">
        <table class="w-full min-w-[1000px] text-sm">
          <thead>
            <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-5 py-3">Order ID</th>
              <th class="px-5 py-3">User</th>
              <th class="px-5 py-3">Lokasi / Alamat</th>
              <th class="px-5 py-3">Detail Layanan</th>
              <th class="px-5 py-3">Jadwal</th>
              <th class="px-5 py-3">Harga</th>
              <th class="px-5 py-3">Status</th>
              <th class="px-5 py-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Pesan jika tidak ada order -->
            <tr x-show="serviceOrders.length === 0">
                <td colspan="8" class="px-5 py-8 text-center text-slate-500">Belum ada order untuk layanan ini.</td>
            </tr>
            <!-- Looping data order -->
            <template x-for="o in serviceOrders" :key="o.id">
              <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
                <td class="px-5 py-3 font-medium text-[#0b2046]" x-text="o.id"></td>
                <td class="px-5 py-3 text-slate-900">
                  <div class="font-semibold" x-text="o.user"></div>
                  <div class="text-xs text-slate-500" x-text="o.no_hp"></div>
                </td>
                <td class="px-5 py-3 text-slate-600">
                  <div class="text-xs"><span class="font-semibold">Pickup/Asal:</span> <span x-text="o.pickup"></span></div>
                  <div class="text-xs"><span class="font-semibold">Tujuan:</span> <span x-text="o.dest"></span></div>
                </td>
                <td class="px-5 py-3 text-slate-600 text-xs space-y-0.5">
                  <template x-if="o.kendaraan"><div class="inline-block bg-blue-50 text-blue-700 px-1.5 py-0.5 rounded font-medium" x-text="'Kendaraan: ' + o.kendaraan"></div></template>
                  <template x-if="o.lantai"><div class="text-slate-700" x-text="'Lantai: ' + o.lantai + (o.lift === 'Ya' ? ' (Ada Lift)' : '')"></div></template>
                  <template x-if="o.ruangan"><div class="text-slate-700" x-text="'Ruangan: ' + o.ruangan + (o.luas_ruangan ? ' (' + o.luas_ruangan + ')' : '')"></div></template>
                  <template x-if="o.jenis_layanan"><div class="text-slate-700" x-text="'Jenis: ' + o.jenis_layanan"></div></template>
                  
                  <!-- Perbaikan Label Kondisional untuk Kosan Storage / Kerusakan -->
                  <template x-if="o.kategori_kerusakan">
                    <div :class="o.layanan.toLowerCase().includes('storage') ? 'text-slate-700 font-semibold' : 'text-red-600 font-semibold'" 
                         x-text="(o.layanan.toLowerCase().includes('storage') ? 'Durasi: ' : 'Kerusakan: ') + o.kategori_kerusakan">
                    </div>
                  </template>

                  <template x-if="o.berat_laundry"><div class="text-slate-700" x-text="'Langganan: ' + o.berat_laundry"></div></template>
                  <template x-if="o.catatan"><div class="text-slate-400 italic truncate max-w-[200px]" x-text="'Catatan: ' + o.catatan"></div></template>
                </td>
                <td class="px-5 py-3 text-slate-600 text-xs">
                  <div x-text="o.tanggal"></div>
                  <div class="font-semibold text-slate-900" x-text="o.jam"></div>
                </td>
                <td class="px-5 py-3 font-semibold text-slate-900" x-text="formatRupiah(o.harga)"></td>
                <td class="px-5 py-3">
                  <span :class="{
                    'bg-emerald-50 text-emerald-600': o.status === 'Selesai' || o.status === 'Berhasil',
                    'bg-blue-50 text-blue-600': o.status === 'Berlangsung',
                    'bg-amber-50 text-amber-600': o.status === 'Menunggu Verifikasi',
                    'bg-slate-100 text-slate-600': o.status === 'Menunggu' || o.status === 'Menunggu Pembayaran' || !o.status
                  }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="o.status || 'Menunggu'"></span>
                </td>
                <td class="px-5 py-3 text-right space-x-2">
                  <!-- Tombol ACC jika belum berhasil/selesai -->
                  <template x-if="o.status !== 'Berhasil' && o.status !== 'Selesai'">
                    <form :action="'/admin/booking/' + o.raw_id + '/acc'" method="POST" class="inline">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-600 hover:bg-emerald-100 transition">
                        ACC
                      </button>
                    </form>
                  </template>
                  <button @click="openOrder(o)" class="font-semibold text-[#0b2046] hover:underline text-xs">Detail</button>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- MODAL: DETAIL ORDER TIMELINE               -->
  <!-- ========================================== -->
  <div x-show="modals.order" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="modals.order = false" x-transition.opacity></div>
    <div class="relative w-full max-w-lg rounded-2xl bg-white shadow-2xl flex flex-col max-h-[90vh]" x-show="modals.order" x-transition>
      <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
        <h3 class="font-display text-lg font-bold text-slate-900">Detail Order — <span x-text="currentOrder?.id"></span></h3>
        <button @click="modals.order = false" class="text-slate-400 hover:text-slate-500"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
      </div>
      <div class="p-6 overflow-y-auto space-y-4">
        <div class="flex justify-between border-b border-slate-100 pb-2">
          <span class="text-sm text-slate-500">Status</span>
          <span :class="{
            'bg-emerald-50 text-emerald-600': currentOrder?.status === 'Selesai' || currentOrder?.status === 'Berhasil',
            'bg-blue-50 text-blue-600': currentOrder?.status === 'Berlangsung',
            'bg-amber-50 text-amber-600': currentOrder?.status === 'Menunggu Verifikasi',
            'bg-slate-100 text-slate-600': currentOrder?.status === 'Menunggu' || currentOrder?.status === 'Menunggu Pembayaran' || !currentOrder?.status
          }" class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-semibold" x-text="currentOrder?.status || 'Menunggu'"></span>
        </div>

        <!-- Detail Pesanan Tambahan -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 space-y-2 text-xs">
          <p class="font-semibold text-slate-900 text-sm mb-1">Informasi Pemesan & Spesifik</p>
          <div><span class="font-medium text-slate-500">Nama:</span> <span class="text-slate-900" x-text="currentOrder?.user"></span></div>
          <div><span class="font-medium text-slate-500">No HP:</span> <span class="text-slate-900" x-text="currentOrder?.no_hp"></span></div>
          <div><span class="font-medium text-slate-500">Pickup / Asal:</span> <span class="text-slate-900" x-text="currentOrder?.pickup"></span></div>
          <div><span class="font-medium text-slate-500">Tujuan:</span> <span class="text-slate-900" x-text="currentOrder?.dest"></span></div>
          
          <template x-if="currentOrder?.kendaraan"><div><span class="font-medium text-slate-500">Jenis Kendaraan:</span> <span class="text-slate-900" x-text="currentOrder.kendaraan"></span></div></template>
          <template x-if="currentOrder?.lantai"><div><span class="font-medium text-slate-500">Lantai / Lift:</span> <span class="text-slate-900" x-text="'Lantai ' + currentOrder.lantai + (currentOrder.lift ? ' (Lift: ' + currentOrder.lift + ')' : '')"></span></div></template>
          <template x-if="currentOrder?.ruangan"><div><span class="font-medium text-slate-500">Ruangan & Luas:</span> <span class="text-slate-900" x-text="currentOrder.ruangan + (currentOrder.luas_ruangan ? ' (' + currentOrder.luas_ruangan + ')' : '')"></span></div></template>
          <template x-if="currentOrder?.jenis_layanan"><div><span class="font-medium text-slate-500">Jenis Layanan:</span> <span class="text-slate-900" x-text="currentOrder.jenis_layanan"></span></div></template>
          
          <!-- Perbaikan Label Kondisional di Modal Detail Order -->
          <template x-if="currentOrder?.kategori_kerusakan">
            <div>
              <span class="font-medium text-slate-500" x-text="currentOrder.layanan.toLowerCase().includes('storage') ? 'Durasi Penitipan:' : 'Kategori Kerusakan:'"></span> 
              <span class="text-slate-900 font-semibold" :class="currentOrder.layanan.toLowerCase().includes('storage') ? 'text-slate-900' : 'text-red-600'" x-text="currentOrder.kategori_kerusakan"></span>
            </div>
          </template>

          <template x-if="currentOrder?.deskripsi_kerusakan"><div><span class="font-medium text-slate-500">Deskripsi Kerusakan:</span> <span class="text-slate-900" x-text="currentOrder.deskripsi_kerusakan"></span></div></template>
          <template x-if="currentOrder?.berat_laundry"><div><span class="font-medium text-slate-500">Estimasi Berat / Langganan:</span> <span class="text-slate-900" x-text="currentOrder.berat_laundry"></span></div></template>
          <template x-if="currentOrder?.catatan"><div><span class="font-medium text-slate-500">Catatan:</span> <span class="text-slate-900 italic" x-text="currentOrder.catatan"></span></div></template>
        </div>

          <!-- Foto Kerusakan Kosan Fix -->
          <template x-if="currentOrder?.foto">
              <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                  <span class="text-sm font-semibold text-slate-900 block mb-2">Foto Kerusakan (Kosan Fix)</span>
                  <a :href="'/storage/bukti_pembayaran/' + currentOrder.foto" target="_blank" class="block overflow-hidden rounded-lg border border-slate-200 bg-white transition hover:opacity-90">
                      <img :src="'/storage/bukti_pembayaran/' + currentOrder.foto" alt="Foto Kerusakan" class="h-48 w-full object-contain bg-black/5 p-2">
                      <div class="bg-white px-3 py-2 text-center text-xs font-medium text-[#0b2046] border-t border-slate-100">
                          Klik untuk memperbesar foto kerusakan ↗
                      </div>
                  </a>
              </div>
          </template>

        <!-- Bukti Pembayaran -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
          <span class="text-sm font-semibold text-slate-900 block mb-2">Bukti Pembayaran User</span>
          
          <template x-if="currentOrder?.bukti">
            <a :href="'/storage/bukti_pembayaran/' + currentOrder.bukti" target="_blank" class="block overflow-hidden rounded-lg border border-slate-200 bg-white transition hover:opacity-90">
              <img :src="'/storage/bukti_pembayaran/' + currentOrder.bukti" alt="Bukti Transfer" class="h-48 w-full object-contain bg-black/5 p-2">
              <div class="bg-white px-3 py-2 text-center text-xs font-medium text-[#0b2046] border-t border-slate-100">
                Klik untuk memperbesar gambar ↗
              </div>
            </a>
          </template>

          <template x-if="!currentOrder?.bukti">
            <p class="text-sm text-slate-400 italic">User belum mengunggah file bukti pembayaran.</p>
          </template>
        </div>
        
        <!-- Timeline Order -->
        <div class="mt-5">
          <p class="mb-3 text-sm font-semibold text-slate-900">Timeline Order</p>
          <ol class="relative ml-2 border-l-2 border-slate-200">
            <template x-for="(step, index) in timeline" :key="index">
              <li class="mb-4 ml-5 last:mb-0">
                <span :class="isTimelineDone(index) ? 'bg-[#0b2046]' : 'bg-slate-300'" class="absolute -left-[9px] grid h-4 w-4 place-items-center rounded-full">
                  <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                </span>
                <p :class="isTimelineDone(index) ? 'text-slate-900' : 'text-slate-500'" class="text-sm font-medium" x-text="step"></p>
              </li>
            </template>
          </ol>
        </div>
      </div>
      <div class="border-t border-slate-200 px-6 py-4 flex justify-end bg-slate-50 rounded-b-2xl">
        <button @click="modals.order = false" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Tutup</button>
      </div>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- MODAL: TAMBAH LAYANAN                      -->
  <!-- ========================================== -->
  <div x-show="modals.add" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="modals.add = false" x-transition.opacity></div>
    <div class="relative w-full max-w-lg rounded-2xl bg-white shadow-2xl flex flex-col" x-show="modals.add" x-transition>
      <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
        <h3 class="font-display text-lg font-bold text-slate-900">Tambah Layanan</h3>
        <button @click="modals.add = false" class="text-slate-400 hover:text-slate-500"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
      </div>
      <form action="{{ route('admin.layanan.store') }}" method="POST">
        @csrf
        <div class="p-6 space-y-4">
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Layanan</label>
            <input type="text" name="nama" placeholder="Contoh: Kosan Care" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Deskripsi</label>
            <textarea name="deskripsi" rows="3" placeholder="Deskripsi singkat layanan…" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15"></textarea>
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Tarif Dasar (Rp)</label>
            <input type="number" name="harga" placeholder="15000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
          </div>
        </div>
        <div class="border-t border-slate-200 px-6 py-4 flex justify-end gap-3 bg-slate-50 rounded-b-2xl">
          <button type="button" @click="modals.add = false" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
          <button type="submit" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90">Simpan Layanan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- MODAL: EDIT HARGA LAYANAN                  -->
  <!-- ========================================== -->
  <div x-show="modals.edit" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="modals.edit = false" x-transition.opacity></div>
    <div class="relative w-full max-w-md rounded-2xl bg-white shadow-2xl flex flex-col" x-show="modals.edit" x-transition>
      
      <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
        <h3 class="font-display text-lg font-bold text-slate-900">Ubah Tarif Layanan</h3>
        <button @click="modals.edit = false" class="text-slate-400 hover:text-slate-500"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
      </div>
      
      <!-- Form Edit Harga -->
      <form :action="'/admin/layanan/' + editServiceData.id + '/update-harga'" method="POST">
        @csrf
        @method('PUT')
        
        <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
          <!-- Input Nama -->
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Layanan</label>
            <input type="text" name="nama" x-model="editServiceData.nama" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
          </div>
          
          <!-- Input Deskripsi Baru -->
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Deskripsi</label>
            <textarea name="deskripsi" x-model="editServiceData.desc" rows="2" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15"></textarea>
          </div>

          <!-- INPUT HARGA STANDAR (Hanya tampil untuk layanan umum & Kosan Fix) -->
          <template x-if="editServiceData.nama !== 'Kosan Jek' && editServiceData.nama !== 'Kosan Move' && editServiceData.nama !== 'Kosan Clean' && editServiceData.nama !== 'Kosan Laundry'">
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Tarif Layanan (Rp)</label>
              <input type="number" name="harga" x-model="editServiceData.harga" required class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
            </div>
          </template>

          <!-- Input tersembunyi untuk tetap mengirim nilai harga utama ke controller -->
          <input type="hidden" name="harga" x-model="editServiceData.harga">

          <!-- INPUT TAMBAHAN KHUSUS KOSAN JEK (MOTOR & MOBIL) -->
          <template x-if="editServiceData.nama === 'Kosan Jek'">
            <div class="rounded-xl bg-slate-50 p-4 space-y-3 border border-slate-200">
              <p class="text-xs font-bold text-slate-700 uppercase tracking-wide">Pengaturan Tarif Kendaraan</p>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Motor (Rp)</label>
                <input type="number" name="harga_motor" x-model="editServiceData.harga_motor" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="20000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Mobil (Rp)</label>
                <input type="number" name="harga_mobil" x-model="editServiceData.harga_mobil" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="30000">
              </div>
            </div>
          </template>

          <!-- INPUT TAMBAHAN KHUSUS KOSAN MOVE -->
          <template x-if="editServiceData.nama === 'Kosan Move'">
            <div class="rounded-xl bg-slate-50 p-4 space-y-3 border border-slate-200">
              <p class="text-xs font-bold text-slate-700 uppercase tracking-wide">Pengaturan Tarif Pindahan</p>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Avanza (Rp)</label>
                <input type="number" name="harga_avanza" x-model="editServiceData.harga_avanza" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="165000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Mobil Pick Up (Rp)</label>
                <input type="number" name="harga_pickup" x-model="editServiceData.harga_pickup" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="260000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Truk (Rp)</label>
                <input type="number" name="harga_truk" x-model="editServiceData.harga_truk" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="550000">
              </div>
            </div>
          </template>

          <!-- INPUT TAMBAHAN KHUSUS KOSAN CLEAN -->
          <template x-if="editServiceData.nama === 'Kosan Clean'">
            <div class="rounded-xl bg-slate-50 p-4 space-y-3 border border-slate-200">
              <p class="text-xs font-bold text-slate-700 uppercase tracking-wide">Pengaturan Tarif Ruangan</p>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif 1 Kamar Kost (Rp)</label>
                <input type="number" name="harga_kamarkost" x-model="editServiceData.harga_kamarkost" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="75000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif 1 Kamar Mandi (Rp)</label>
                <input type="number" name="harga_kamarmandi" x-model="editServiceData.harga_kamarmandi" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="100000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif Kost & Kamar Mandi (Rp)</label>
                <input type="number" name="harga_kombinasi" x-model="editServiceData.harga_kombinasi" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="150000">
              </div>
            </div>
          </template>

          <!-- INPUT TAMBAHAN KHUSUS KOSAN LAUNDRY -->
          <template x-if="editServiceData.nama === 'Kosan Laundry'">
            <div class="rounded-xl bg-slate-50 p-4 space-y-3 border border-slate-200">
              <p class="text-xs font-bold text-slate-700 uppercase tracking-wide">Pengaturan Tarif Langganan</p>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif 1 Semester (Rp)</label>
                <input type="number" name="harga_semester" x-model="editServiceData.harga_semester" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="900000">
              </div>
              <div>
                <label class="block mb-1 text-xs font-medium text-slate-600">Tarif 1 Tahun (Rp)</label>
                <input type="number" name="harga_tahun" x-model="editServiceData.harga_tahun" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm bg-white outline-none focus:border-[#0b2046]" placeholder="1500000">
              </div>
            </div>
          </template>
        </div>

        <div class="border-t border-slate-200 px-6 py-4 flex justify-end gap-3 bg-slate-50 rounded-b-2xl">
          <button type="button" @click="modals.edit = false" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
          <button type="submit" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90">Simpan Perubahan</button>
        </div>
      </form>

    </div>
  </div>

  <!-- ========================================== -->
  <!-- MODAL: KONFIRMASI (Hapus / Edit)           -->
  <!-- ========================================== -->
  <div x-show="modals.confirm.isOpen" style="display: none;" class="fixed inset-0 z-[60] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="modals.confirm.isOpen = false"></div>
    <div class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl text-center" x-show="modals.confirm.isOpen">
      <h3 class="font-display text-lg font-bold text-slate-900 mb-2" x-text="modals.confirm.title"></h3>
      <p class="text-sm text-slate-500 mb-6" x-text="modals.confirm.message"></p>
      <div class="flex gap-3 justify-center">
        <button @click="modals.confirm.isOpen = false" class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
        <button @click="modals.confirm.isOpen = false" :class="modals.confirm.tone === 'danger' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-[#0b2046] hover:opacity-90 text-white'" class="rounded-xl px-4 py-2 text-sm font-semibold shadow-sm" x-text="modals.confirm.tone === 'danger' ? 'Hapus' : 'Lanjutkan'"></button>
      </div>
    </div>
  </div>

</div>

<!-- ========================================================= -->
<!-- SCRIPT REALTIME PUSHER UNTUK ADMIN                        -->
<!-- ========================================================= -->
<script type="module">
    document.addEventListener("DOMContentLoaded", function() {
        let cekEcho = setInterval(function() {
            if (typeof window.Echo !== 'undefined') {
                clearInterval(cekEcho);
                console.log('✅ Laravel Echo (Admin) berhasil dimuat!');

                // Admin mendengarkan channel yang sama: 'koka-orders'
                window.Echo.channel('koka-orders')
                    .listen('.status.updated', (e) => {
                        console.log('🟢 Ada pesanan baru atau perubahan status!', e);
                        
                        // Berbeda dengan User, Admin memantau SEMUA pesanan.
                        // Jadi kita tidak perlu mengecek user_id. Langsung refresh!
                        window.location.reload();
                    });
            }
        }, 500);
    });
</script>

<!-- Alpine Script for logic state management -->
<script>
  function layananData() {
    return {
      view: 'list', 
      currentService: null,
      currentOrder: null,
      
      // State modal
      modals: {
        add: false,
        order: false,
        edit: false, 
        confirm: { isOpen: false, title: '', message: '', tone: '' }
      },
      
      editServiceData: { id: '', nama: '', desc: '', harga: 0 }, 

      timeline: ["Order dibuat", "Mencari petugas/driver", "Petugas menuju lokasi", "Order berlangsung", "Order selesai"],

      // Data Layanan
      services: {!! json_encode(\App\Models\Service::all()->map(function($s) {
          $iconMap = [
              'Kosan jek' => 'Bike',
              'Kosan Move' => 'Truck',
              'Kosan Clean' => 'Sparkles',
              'Kosan Fix' => 'Wrench',
              'Kosan Laundry' => 'Shirt'
          ];

          $keyword = strtolower(str_replace(' ', '', $s->nama));
          $matchedBookings = \App\Models\Booking::all()->filter(function($b) use ($keyword) {
              $bLayanan = strtolower(str_replace(' ', '', $b->layanan));
              return $bLayanan === $keyword || str_contains($bLayanan, $keyword);
          });

          return [
              'id' => $s->id, 
              'harga' => $s->harga ?? 0, 
              'key' => $keyword,
              'nama' => $s->nama,
              'desc' => $s->deskripsi ?? 'Layanan On-Demand',
              'icon' => $iconMap[$s->nama] ?? 'Bike',
              'order' => $matchedBookings->count(),
              'pendapatan' => $matchedBookings->where('status', 'Berhasil')->sum('total_harga'), 
              'aktif' => (int)$s->is_active === 1 
          ];
      })) !!},

      // Data Order (Termasuk mapping field 'foto' untuk Kosan Fix)
      allOrders: {!! isset($allOrders) ? json_encode($allOrders->map(function($o) {
          return [
              'id' => '#ORD-' . str_pad($o->id, 4, '0', STR_PAD_LEFT),
              'raw_id' => $o->id,
              'layanan' => $o->layanan,
              'user' => $o->nama ?? 'User',
              'no_hp' => $o->no_hp ?? '-',
              'driver' => '-',
              'pickup' => $o->pickup ?? '-',
              'dest' => $o->tujuan ?? '-',
              'tanggal' => $o->tanggal ?? '-',
              'jam' => $o->jam ?? '-',
              'catatan' => $o->catatan ?? '',
              'kendaraan' => $o->kendaraan ?? null,
              'lantai' => $o->lantai ?? null,
              'lift' => $o->lift ?? null,
              'ruangan' => $o->ruangan ?? null,
              'luas_ruangan' => $o->luas_ruangan ?? null,
              'jenis_layanan' => $o->jenis_layanan ?? null,
              'kategori_kerusakan' => $o->kategori_kerusakan ?? null,
              'deskripsi_kerusakan' => $o->deskripsi_kerusakan ?? null,
              'berat_laundry' => $o->berat_laundry ?? null,
              'harga' => $o->total_harga ?? 0,
              'status' => $o->status,
              'bukti' => $o->bukti_pembayaran,
              'foto' => $o->foto ?? null // <-- Menambahkan mapping foto kerusakan
          ];
      })) : '[]' !!},

      // ==========================================
      // FITUR REALTIME PUSHER & LARAVEL ECHO
      // ==========================================
      init() {
          // 1. Panggil data awal jika diperlukan
          this.fetchRealtimeOrders();

          // 2. Dengarkan sinyal broadcast dari Pusher
          if (typeof window.Echo !== 'undefined') {
              window.Echo.channel('koka-orders')
                  .listen('.status.updated', (e) => {
                      console.log('Pesanan diperbarui secara realtime:', e.order);
                      // Otomatis menimpa allOrders dengan data paling baru dari server
                      this.fetchRealtimeOrders(); 
                  });
          }
      },

      fetchRealtimeOrders() {
          fetch('/admin/api/orders-realtime')
              .then(response => response.json())
              .then(data => {
                  this.allOrders = data;

                  // Jika admin sedang membuka modal detail pesanan saat statusnya berubah,
                  // modal detail pesanan tersebut akan otomatis ter-update juga!
                  if (this.currentOrder && this.modals.order) {
                      const updatedOrder = data.find(o => o.raw_id === this.currentOrder.raw_id);
                      if (updatedOrder) {
                          this.currentOrder = updatedOrder;
                      }
                  }
              })
              .catch(error => console.error('Gagal mengambil data realtime:', error));
      },
      // ==========================================

      openEditModal(service) {
        this.editServiceData = { 
            id: service.id, 
            nama: service.nama, 
            desc: service.desc, 
            harga: service.harga 
        };
        this.modals.edit = true;
      },

      get serviceOrders() {
          if (!this.currentService) return [];
          return this.allOrders.filter(o => {
              const layananDiDatabase = String(o.layanan).toLowerCase().replace(/\s+/g, '');
              const layananDiKlik = String(this.currentService.nama).toLowerCase().replace(/\s+/g, '');
              return layananDiDatabase === layananDiKlik || layananDiDatabase.includes(layananDiKlik) || layananDiKlik.includes(layananDiDatabase);
          });
      },

      openDetail(service) {
        this.currentService = service;
        this.view = 'detail';
        window.scrollTo(0,0);
      },
      openOrder(order) {
        this.currentOrder = order;
        this.modals.order = true;
      },
      openModal(type) {
        this.modals[type] = true;
      },
      openConfirm(title, message, tone = 'primary') {
        this.modals.confirm = { isOpen: true, title, message, tone };
      },

      formatRupiah(number) {
        if(!number) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
      },

      isTimelineDone(index) {
        if (!this.currentOrder) return false;
        if (this.currentOrder.status === 'Selesai' || this.currentOrder.status === 'Berhasil') return true;
        if (this.currentOrder.status === 'Berlangsung') return index < 3;
        return index < 1; 
      },

      toggleServiceStatus(service) {
          const previousState = service.aktif;
          service.aktif = !service.aktif;
          
          fetch('/admin/layanan/' + service.id + '/toggle-status', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              body: JSON.stringify({
                  is_active: service.aktif ? 1 : 0
              })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                service.aktif = previousState;
                alert('Gagal memperbarui status layanan.');
            }
        })
        .catch(error => {
            service.aktif = previousState;
            console.error('Error:', error);
        });
      },

      getIcon(iconName) {
        const icons = {
          'Bike': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v2m0 0l-3 3v2m3-5l3 3v2M4 16h4l2-4h4l2 4h4m-8-4v4m0 0a2 2 0 100 4 2 2 0 000-4z"/></svg>',
          'Truck': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path d="M8 21a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm11 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-11 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/><path d="M3 3h2l2 12h11l2-8H6.5"/></svg>',
          'Sparkles': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>',
          'Wrench': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
          'Shirt': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a14 14 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"/></svg>'
        };
        return icons[iconName] || icons['Bike'];
      }
    };
  }
</script>
@endsection