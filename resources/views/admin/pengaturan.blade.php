<!-- resources/views/admin/pengaturan.blade.php -->
@extends('admin.layout')

@section('content')
<div x-data="pengaturanData()" class="space-y-6 font-sans relative">
  
  <!-- Page Header -->
  <div>
    <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Pengaturan</h1>
    <p class="mt-1 text-sm text-slate-500">Kelola preferensi akun dan konfigurasi platform.</p>
  </div>

  <div class="grid gap-6 lg:grid-cols-4">
    <!-- Sidebar Menu (Kiri) -->
    <div class="rounded-2xl border border-slate-200 bg-white p-2 shadow-sm h-fit lg:col-span-1">
      <template x-for="menu in menus" :key="menu.key">
        <button @click="tab = menu.key"
          :class="tab === menu.key ? 'bg-[#0b2046] text-white' : 'text-slate-500 hover:bg-blue-50 hover:text-[#0b2046]'"
          class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition">
          <span x-html="menu.icon" class="h-[18px] w-[18px] shrink-0"></span>
          <span x-text="menu.label"></span>
        </button>
      </template>
    </div>

    <!-- Konten Form (Kanan) -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-3">
      
      <!-- TAB: PROFIL ADMIN -->
      <div x-show="tab === 'profile'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Profil Admin</h3>
        <div class="mt-5 flex items-center gap-4">
          <span class="relative grid h-20 w-20 place-items-center rounded-full bg-[#0b2046] font-display text-2xl font-bold text-white">AD
            <button class="absolute -bottom-1 -right-1 grid h-7 w-7 place-items-center rounded-full border-2 border-white bg-slate-900 text-white transition hover:bg-slate-800">
              <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </button>
          </span>
          <div>
            <p class="font-medium text-slate-900">Foto Profil</p>
            <p class="text-sm text-slate-500">JPG atau PNG, maks. 2MB</p>
          </div>
        </div>
        <div class="mt-6 grid gap-4 sm:grid-cols-2">
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Lengkap</label>
            <input type="text" value="Administrator" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Email</label>
            <input type="email" value="admin@kosan.id" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nomor HP</label>
            <input type="text" value="0812-0000-0001" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Peran</label>
            <input type="text" value="Super Admin" disabled class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-500 outline-none cursor-not-allowed" />
          </div>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Simpan Perubahan</button></div>
      </div>

      <!-- TAB: KEAMANAN -->
      <div x-show="tab === 'security'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Keamanan</h3>
        <div class="mt-4">
          <!-- Toggle Components (Di-render via Alpine Array 'toggles_security') -->
          <template x-for="(tg, index) in toggles_security" :key="index">
            <div class="flex items-center justify-between border-b border-slate-100 py-4 last:border-0">
              <div><p class="text-sm font-medium text-slate-900" x-text="tg.label"></p><p class="text-sm text-slate-500" x-text="tg.desc"></p></div>
              <button @click="tg.on = !tg.on" :class="tg.on ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 shrink-0 rounded-full transition focus:outline-none">
                <span :class="tg.on ? 'translate-x-[22px]' : 'translate-x-0.5'" class="absolute top-0.5 left-0 inline-block h-5 w-5 transform rounded-full bg-white shadow transition-transform duration-200 ease-in-out"></span>
              </button>
            </div>
          </template>
        </div>
        <div class="mt-5">
          <p class="mb-2 text-sm font-medium text-slate-900">Aktivitas Login Terakhir</p>
          <div class="flex items-center justify-between rounded-xl border border-slate-200 p-3 text-sm mb-2"><span class="text-slate-900">Chrome · Jakarta</span><span class="text-slate-500">Aktif sekarang</span></div>
          <div class="flex items-center justify-between rounded-xl border border-slate-200 p-3 text-sm"><span class="text-slate-900">Safari · Bandung</span><span class="text-slate-500">2 hari lalu</span></div>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition">Keluarkan Semua Sesi</button></div>
      </div>

      <!-- TAB: PASSWORD -->
      <div x-show="tab === 'password'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Ubah Password</h3>
        <div class="mt-5 grid max-w-md gap-4">
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Password Saat Ini</label>
            <input type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Password Baru</label>
            <input type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Konfirmasi Password Baru</label>
            <input type="password" placeholder="••••••••" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Perbarui Password</button></div>
      </div>

      <!-- TAB: NOTIFIKASI -->
      <div x-show="tab === 'notif'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Preferensi Notifikasi</h3>
        <div class="mt-4">
          <template x-for="(tg, index) in toggles_notif" :key="index">
            <div class="flex items-center justify-between border-b border-slate-100 py-4 last:border-0">
              <div><p class="text-sm font-medium text-slate-900" x-text="tg.label"></p><p class="text-sm text-slate-500" x-text="tg.desc"></p></div>
              <button @click="tg.on = !tg.on" :class="tg.on ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 shrink-0 rounded-full transition focus:outline-none">
                <span :class="tg.on ? 'translate-x-[22px]' : 'translate-x-0.5'" class="absolute top-0.5 left-0 inline-block h-5 w-5 transform rounded-full bg-white shadow transition-transform duration-200 ease-in-out"></span>
              </button>
            </div>
          </template>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Simpan</button></div>
      </div>

      <!-- TAB: PEMBAYARAN -->
      <div x-show="tab === 'payment'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Pengaturan Pembayaran</h3>
        <div class="mt-4">
          <template x-for="(tg, index) in toggles_payment" :key="index">
            <div class="flex items-center justify-between border-b border-slate-100 py-4 last:border-0">
              <div><p class="text-sm font-medium text-slate-900" x-text="tg.label"></p><p class="text-sm text-slate-500" x-text="tg.desc"></p></div>
              <button @click="tg.on = !tg.on" :class="tg.on ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 shrink-0 rounded-full transition focus:outline-none">
                <span :class="tg.on ? 'translate-x-[22px]' : 'translate-x-0.5'" class="absolute top-0.5 left-0 inline-block h-5 w-5 transform rounded-full bg-white shadow transition-transform duration-200 ease-in-out"></span>
              </button>
            </div>
          </template>
          <div class="mt-4 grid max-w-md gap-4">
            <div>
              <label class="block mb-1.5 text-sm font-medium text-slate-900">Biaya Layanan Platform (%)</label>
              <input type="number" value="5" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
            </div>
          </div>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Simpan</button></div>
      </div>

      <!-- TAB: LAYANAN -->
      <div x-show="tab === 'service'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Pengaturan Layanan</h3>
        <div class="mt-4">
          <template x-for="(tg, index) in toggles_service" :key="index">
            <div class="flex items-center justify-between border-b border-slate-100 py-4 last:border-0">
              <div><p class="text-sm font-medium text-slate-900" x-text="tg.label"></p><p class="text-sm text-slate-500" x-text="tg.desc"></p></div>
              <button @click="tg.on = !tg.on" :class="tg.on ? 'bg-[#0b2046]' : 'bg-slate-300'" class="relative h-6 w-11 shrink-0 rounded-full transition focus:outline-none">
                <span :class="tg.on ? 'translate-x-[22px]' : 'translate-x-0.5'" class="absolute top-0.5 left-0 inline-block h-5 w-5 transform rounded-full bg-white shadow transition-transform duration-200 ease-in-out"></span>
              </button>
            </div>
          </template>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Simpan</button></div>
      </div>

      <!-- TAB: UMUM -->
      <div x-show="tab === 'general'" style="display: none;">
        <h3 class="font-display text-lg font-semibold text-slate-900">Pengaturan Umum</h3>
        <div class="mt-4 grid max-w-md gap-4">
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Nama Platform</label>
            <input type="text" value="Kosan" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Email Support</label>
            <input type="email" value="support@kosan.id" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
          <div>
            <label class="block mb-1.5 text-sm font-medium text-slate-900">Zona Waktu</label>
            <input type="text" value="WIB (GMT+7)" class="w-full rounded-xl border border-slate-200 px-3 py-2 text-sm outline-none focus:border-[#0b2046]" />
          </div>
        </div>
        <div class="mt-6 flex justify-end"><button @click="save()" class="rounded-xl bg-[#0b2046] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90 transition">Simpan</button></div>
      </div>

    </div>
  </div>

  <!-- Toast Notification (Berhasil) -->
  <div x-show="toast" style="display: none;" x-transition.opacity.duration.300ms class="fixed bottom-6 right-6 z-50 rounded-xl bg-slate-900 px-5 py-3 text-sm font-medium text-white shadow-lg">
    Perubahan berhasil disimpan.
  </div>

</div>

<!-- Alpine Script Management -->
<script>
  function pengaturanData() {
    return {
      tab: 'profile',
      toast: false,
      
      // Ikon menu
      menus: [
        { key: 'profile', label: 'Profil Admin', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>' },
        { key: 'security', label: 'Keamanan', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>' },
        { key: 'password', label: 'Password', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4v-4l5.659-5.659C9.098 10.203 9 9.615 9 9a6 6 0 0112 0z"/></svg>' },
        { key: 'notif', label: 'Notifikasi', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>' },
        { key: 'payment', label: 'Pembayaran', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>' },
        { key: 'service', label: 'Layanan', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v2m0 0l-3 3v2m3-5l3 3v2M4 16h4l2-4h4l2 4h4m-8-4v4m0 0a2 2 0 100 4 2 2 0 000-4z"/></svg>' },
        { key: 'general', label: 'Umum', icon: '<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>' },
      ],

      // State Toggle per Tab
      toggles_security: [
        { label: 'Two-Factor Authentication', desc: 'Tambahkan lapisan keamanan ekstra saat login.', on: true },
        { label: 'Notifikasi Login', desc: 'Kirim email setiap ada login baru.', on: true }
      ],
      toggles_notif: [
        { label: 'Booking Baru', desc: 'Beri tahu saat ada booking masuk.', on: true },
        { label: 'Pembayaran', desc: 'Beri tahu saat pembayaran diterima.', on: true },
        { label: 'Pendaftaran Pemilik', desc: 'Beri tahu saat pemilik baru mendaftar.', on: false },
        { label: 'Laporan Pengguna', desc: 'Beri tahu saat ada laporan dari pengguna.', on: true }
      ],
      toggles_payment: [
        { label: 'QRIS', desc: 'Aktifkan pembayaran via QRIS.', on: true },
        { label: 'Bank Transfer', desc: 'Aktifkan transfer bank manual.', on: true },
        { label: 'E-Wallet', desc: 'Aktifkan pembayaran e-wallet.', on: true }
      ],
      toggles_service: [
        { label: 'Kosan Jek', desc: 'Aktifkan layanan ojek.', on: true },
        { label: 'Kosan Move', desc: 'Aktifkan layanan pindahan.', on: true },
        { label: 'Kosan Clean', desc: 'Aktifkan layanan kebersihan.', on: true },
        { label: 'Kosan Food', desc: 'Aktifkan layanan antar makanan.', on: false }
      ],

      // Fungsi simpan (toast)
      save() {
        this.toast = true;
        setTimeout(() => {
          this.toast = false;
        }, 2200);
      }
    };
  }
</script>
@endsection