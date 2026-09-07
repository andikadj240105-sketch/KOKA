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

    <!-- Grid Layanan -->
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
      <template x-for="s in services" :key="s.key">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:shadow-md">
          
          <div class="flex items-center justify-between">
            <!-- Ikon SVG berdasarkan key -->
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-blue-50 text-[#0b2046]" x-html="getIcon(s.icon)"></span>
            
            <!-- Toggle Switch -->
            <button @click="s.aktif = !s.aktif" :class="s.aktif ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 rounded-full transition-colors duration-200 ease-in-out focus:outline-none">
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
            <button @click="openDetail(s)" class="flex-1 rounded-lg bg-blue-50 py-2 text-sm font-semibold text-[#0b2046] hover:bg-blue-100 transition">Lihat Order</button>
            <button @click="openConfirm('Edit Layanan', 'Buka editor untuk ' + s.nama + '?')" class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">Edit</button>
            <button @click="openConfirm('Hapus Layanan', 'Hapus layanan ' + s.nama + '?', 'danger')" class="rounded-lg bg-white px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-50 transition">Hapus</button>
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
        <div><p class="text-xs font-semibold text-slate-500">Order Aktif</p><p class="font-display text-lg font-bold text-slate-900">18</p></div>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex items-center gap-3">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-violet-50 text-violet-600"><svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></span>
        <div><p class="text-xs font-semibold text-slate-500">Rating Rata-rata</p><p class="font-display text-lg font-bold text-slate-900">4,7 ★</p></div>
      </div>
    </div>

    <!-- Table Daftar Order -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
      <div class="border-b border-slate-200 px-5 py-4"><h3 class="font-display font-semibold text-slate-900">Daftar Order</h3></div>
      <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
          <thead>
            <tr class="border-b border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-5 py-3">Order ID</th><th class="px-5 py-3">User</th><th class="px-5 py-3">Driver</th>
              <th class="px-5 py-3">Pickup</th><th class="px-5 py-3">Tujuan</th><th class="px-5 py-3">Harga</th>
              <th class="px-5 py-3">Status</th><th class="px-5 py-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <template x-for="o in serviceOrders" :key="o.id">
              <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
                <td class="px-5 py-3 font-medium text-[#0b2046]" x-text="o.id"></td>
                <td class="px-5 py-3 text-slate-900" x-text="o.user"></td>
                <td class="px-5 py-3 text-slate-500" x-text="o.driver"></td>
                <td class="px-5 py-3 text-slate-500" x-text="o.pickup"></td>
                <td class="px-5 py-3 text-slate-500" x-text="o.dest"></td>
                <td class="px-5 py-3 font-semibold text-slate-900" x-text="formatRupiah(o.harga)"></td>
                <td class="px-5 py-3">
                  <span :class="{
                    'bg-emerald-50 text-emerald-600': o.status === 'Selesai',
                    'bg-amber-50 text-amber-600': o.status === 'Berlangsung',
                    'bg-slate-100 text-slate-600': o.status === 'Menunggu'
                  }" class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold" x-text="o.status"></span>
                </td>
                <td class="px-5 py-3 text-right"><button @click="openOrder(o)" class="font-semibold text-[#0b2046] hover:underline">Detail</button></td>
              </tr>
            </template>
          </tbody>
        </table>
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
      <div class="p-6 space-y-4">
        <div>
          <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Layanan</label>
          <input type="text" placeholder="Contoh: Kosan Care" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
        </div>
        <div>
          <label class="block mb-1.5 text-sm font-medium text-slate-900">Deskripsi</label>
          <textarea rows="3" placeholder="Deskripsi singkat layanan…" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15"></textarea>
        </div>
        <div>
          <label class="block mb-1.5 text-sm font-medium text-slate-900">Tarif Dasar (Rp)</label>
          <input type="number" placeholder="15000" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
        </div>
      </div>
      <div class="border-t border-slate-200 px-6 py-4 flex justify-end gap-3 bg-slate-50 rounded-b-2xl">
        <button @click="modals.add = false" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Batal</button>
        <button @click="modals.add = false" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90">Simpan Layanan</button>
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
      <div class="p-6 overflow-y-auto space-y-3">
        <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">User</span><span class="text-sm font-medium text-slate-900" x-text="currentOrder?.user"></span></div>
        <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Driver</span><span class="text-sm font-medium text-slate-900" x-text="currentOrder?.driver"></span></div>
        <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Pickup</span><span class="text-sm font-medium text-slate-900" x-text="currentOrder?.pickup"></span></div>
        <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Tujuan</span><span class="text-sm font-medium text-slate-900" x-text="currentOrder?.dest"></span></div>
        <div class="flex justify-between border-b border-slate-100 pb-2"><span class="text-sm text-slate-500">Harga</span><span class="text-sm font-bold text-[#0b2046]" x-text="formatRupiah(currentOrder?.harga)"></span></div>
        <div class="flex justify-between border-b border-slate-100 pb-2">
          <span class="text-sm text-slate-500">Status</span>
          <span :class="{
            'bg-emerald-50 text-emerald-600': currentOrder?.status === 'Selesai',
            'bg-amber-50 text-amber-600': currentOrder?.status === 'Berlangsung',
            'bg-slate-100 text-slate-600': currentOrder?.status === 'Menunggu'
          }" class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-semibold" x-text="currentOrder?.status"></span>
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

<!-- Alpine Script for logic state management -->
<script>
  function layananData() {
    return {
      view: 'list', // 'list' | 'detail'
      currentService: null,
      currentOrder: null,
      
      modals: {
        add: false,
        order: false,
        confirm: { isOpen: false, title: '', message: '', tone: '' }
      },

      timeline: ["Order dibuat", "Driver menerima order", "Driver menuju lokasi", "Order berlangsung", "Order selesai"],

      // Dummy Data Layanan
      services: [
        { key: 'ride', nama: 'Kosan jek', desc: 'Layanan antar jemput cepat dan aman.', icon: 'Bike', order: 12540, pendapatan: 185000000, aktif: true },
        { key: 'send', nama: 'Kosan Move', desc: 'Pengiriman paket dan dokumen.', icon: 'Truck', order: 8230, pendapatan: 95400000, aktif: true },
        { key: 'clean', nama: 'Kosan Clean', desc: 'Jasa pembersihan kamar kos.', icon: 'Sparkles', order: 4500, pendapatan: 225000000, aktif: true },
        { key: 'food', nama: 'Kosan Food', desc: 'Layanan pesan antar makanan.', icon: 'UtensilsCrossed', order: 15420, pendapatan: 310500000, aktif: false },
        { key: 'laundry', nama: 'Kosan Laundry', desc: 'Jasa cuci dan setrika pakaian.', icon: 'Shirt', order: 6100, pendapatan: 152500000, aktif: true },
      ],

      // Dummy Data Order
      serviceOrders: [
        { id: '#ORD-991', user: 'Andika Dwi', driver: 'Budi Santoso', pickup: 'Kos Melati', dest: 'Kampus UPI Cibiru', harga: 15000, status: 'Berlangsung' },
        { id: '#ORD-990', user: 'Siti Rahma', driver: 'Asep Saepudin', pickup: 'Stasiun Cileunyi', dest: 'Kos Putri Indah', harga: 25000, status: 'Menunggu' },
        { id: '#ORD-989', user: 'Reza Pratama', driver: 'Joko Widodo', pickup: 'Kos Graha', dest: 'Alun-alun Ujung Berung', harga: 30000, status: 'Selesai' },
        { id: '#ORD-988', user: 'Citra Kirana', driver: 'Budi Santoso', pickup: 'Supermarket Borma', dest: 'Kos Melati', harga: 12000, status: 'Selesai' }
      ],

      // Navigasi & Modal Actions
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

      // Helper Formating Rupiah
      formatRupiah(number) {
        if(!number) return 'Rp 0';
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
      },

      // Fungsi Cek Selesai Timeline
      isTimelineDone(index) {
        if (!this.currentOrder) return false;
        if (this.currentOrder.status === 'Selesai') return true;
        // Asumsi jika 'Berlangsung' step 0-2 selesai, jika 'Menunggu' step 0 selesai
        if (this.currentOrder.status === 'Berlangsung') return index < 3;
        return index < 1; 
      },

      // Ikon SVG mapping (Sederhana menggantikan import dari lucide-react)
      getIcon(iconName) {
        const icons = {
          'Bike': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v2m0 0l-3 3v2m3-5l3 3v2M4 16h4l2-4h4l2 4h4m-8-4v4m0 0a2 2 0 100 4 2 2 0 000-4z"/></svg>',
          'Truck': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path d="M8 21a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm11 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/><path d="M3 3h2l2 12h11l2-8H6.5"/></svg>',
          'Sparkles': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>',
          'UtensilsCrossed': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 14c4 4 8 4 12 0l4-4-8-8-4 4-4-4-4 4 4 4"/></svg>',
          'Shirt': '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M20.38 3.46L16 2a14 14 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"/></svg>'
        };
        return icons[iconName] || icons['Bike'];
      }
    };
  }
</script>
@endsection