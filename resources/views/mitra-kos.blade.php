<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftarkan Kos - Mitra Kosan Kampus</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">

  <x-navbar />

  <main class="mx-auto max-w-4xl px-4 py-10 sm:px-6 pb-32">
    
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block rounded-full bg-purple-100 px-3.5 py-1 text-xs font-bold text-[#522b89] mb-3">
            KEMITRAAN PEMILIK KOS
        </span>
        <h1 class="font-display text-2xl font-extrabold text-[#522b89] sm:text-4xl leading-tight">
            Kelola Kos Lebih Mudah & Menguntungkan
        </h1>
        <p class="mt-3 text-sm text-[#64748b] sm:text-base">
            Serahkan pemasaran hingga operasional harian properti kos Anda kepada tim profesional Kosan Kampus.
        </p>
    </div>

    <!-- Perbandingan Singkat 2 Paket -->
    <div class="grid gap-4 sm:grid-cols-2 mb-8">
        <div class="rounded-2xl border border-[#e2e8f0] bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <h3 class="font-display text-lg font-bold text-[#522b89]">Paket Auto Pilot</h3>
                <span class="rounded-lg bg-amber-50 px-2.5 py-1 text-xs font-bold text-[#F39C12]">Pemasaran & Sistem</span>
            </div>
            <p class="text-xs text-[#64748b] leading-relaxed">
                Cocok bagi pemilik yang masih ingin memegang kendali operasional harian, namun membutuhkan bantuan penuh dalam pemasaran kamar, sistem booking, dan manajemen penghuni digital.
            </p>
        </div>

        <div class="rounded-2xl border border-[#522b89]/30 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <h3 class="font-display text-lg font-bold text-[#522b89]">Paket Full Service</h3>
                <span class="rounded-lg bg-purple-50 px-2.5 py-1 text-xs font-bold text-[#522b89]">Terima Beres</span>
            </div>
            <p class="text-xs text-[#64748b] leading-relaxed">
                Pengelolaan menyeluruh mulai dari pemasaran, penagihan sewa, kebersihan rutin (Kosan Clean), perawatan kerusakan (Kosan Fix), hingga laporan keuangan bulanan.
            </p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="rounded-2xl border border-[#e2e8f0] bg-white p-6 sm:p-8 shadow-sm">
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-[#e2e8f0] pb-4 mb-6">
            <h2 class="font-display text-xl font-bold text-[#522b89]">
                Formulir Pengajuan Pengelolaan Kos
            </h2>
            @guest
                <span class="rounded-lg bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                    Wajib login untuk mengirim pengajuan
                </span>
            @endguest
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-sm text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formMitraKos" action="{{ route('mitra.kos.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid gap-5 sm:grid-cols-2">
                <!-- Nama Pemilik -->
                <div>
                    <label for="nama" class="block text-sm font-semibold text-[#522b89] mb-1.5">Nama Lengkap Pemilik *</label>
                    <input type="text" id="nama" name="nama" 
                           value="{{ old('nama', Auth::check() ? (Auth::user()->nama ?? Auth::user()->name) : '') }}" 
                           required placeholder="Contoh: Bapak Budi Santoso"
                           class="w-full rounded-xl border border-[#e2e8f0] bg-[#f8fafc] px-4 py-3 text-sm text-[#1e293b] outline-none transition focus:border-[#522b89] focus:bg-white">
                </div>

                <!-- No Telpon -->
                <div>
                    <label for="no_telpon" class="block text-sm font-semibold text-[#522b89] mb-1.5">No. Telepon / WhatsApp Aktif *</label>
                    <input type="tel" id="no_telpon" name="no_telpon" 
                           value="{{ old('no_telpon', Auth::check() ? (Auth::user()->no_hp ?? Auth::user()->hp ?? '') : '') }}" 
                           required placeholder="Contoh: 081234567890"
                           class="w-full rounded-xl border border-[#e2e8f0] bg-[#f8fafc] px-4 py-3 text-sm text-[#1e293b] outline-none transition focus:border-[#522b89] focus:bg-white">
                </div>
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <!-- Nama Kosan -->
                <div>
                    <label for="nama_kosan" class="block text-sm font-semibold text-[#522b89] mb-1.5">Nama Kosan *</label>
                    <input type="text" id="nama_kosan" name="nama_kosan" value="{{ old('nama_kosan') }}" required placeholder="Contoh: Kos Putri Melati Cibiru"
                           class="w-full rounded-xl border border-[#e2e8f0] bg-[#f8fafc] px-4 py-3 text-sm text-[#1e293b] outline-none transition focus:border-[#522b89] focus:bg-white">
                </div>

                <!-- Jumlah Kamar -->
                <div>
                    <label for="jumlah_kamar" class="block text-sm font-semibold text-[#522b89] mb-1.5">Jumlah Total Kamar *</label>
                    <input type="number" id="jumlah_kamar" name="jumlah_kamar" value="{{ old('jumlah_kamar') }}" min="1" required placeholder="Contoh: 15"
                           class="w-full rounded-xl border border-[#e2e8f0] bg-[#f8fafc] px-4 py-3 text-sm text-[#1e293b] outline-none transition focus:border-[#522b89] focus:bg-white">
                </div>
            </div>

            <!-- Alamat Kosan -->
            <div>
                <label for="alamat_kosan" class="block text-sm font-semibold text-[#522b89] mb-1.5">Alamat Lengkap Kosan *</label>
                <textarea id="alamat_kosan" name="alamat_kosan" rows="3" required placeholder="Tuliskan jalan, patokan, kecamatan, serta kampus terdekat..."
                          class="w-full rounded-xl border border-[#e2e8f0] bg-[#f8fafc] px-4 py-3 text-sm text-[#1e293b] outline-none transition focus:border-[#522b89] focus:bg-white">{{ old('alamat_kosan') }}</textarea>
            </div>

            <!-- Pilih Paket Pengelolaan -->
            <div>
                <label class="block text-sm font-semibold text-[#522b89] mb-2">Pilih Paket Pengelolaan *</label>
                <div class="grid gap-4 sm:grid-cols-2">
                    
                    <!-- Opsi 1: Auto Pilot -->
                    <div onclick="pilihPaket('Auto Pilot')" id="card-autopilot"
                         class="paket-card relative flex cursor-pointer rounded-2xl border-2 border-[#522b89] bg-purple-50/40 p-4 transition">
                        <input type="radio" id="radio-autopilot" name="paket_pengelolaan" value="Auto Pilot" class="sr-only" {{ old('paket_pengelolaan', 'Auto Pilot') == 'Auto Pilot' ? 'checked' : '' }} required>
                        <div class="flex w-full items-start justify-between gap-3">
                            <div>
                                <p class="font-display text-base font-bold text-[#522b89]">Auto Pilot</p>
                                <p class="mt-1 text-xs text-[#64748b]">Fokus pemasaran digital, manajemen listing, dan sistem booking online.</p>
                            </div>
                            <span id="dot-autopilot" class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border-2 border-[#F39C12] bg-[#F39C12] transition">
                                <span class="h-2 w-2 rounded-full bg-white"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Opsi 2: Full Service -->
                    <div onclick="pilihPaket('Full Service')" id="card-fullservice"
                         class="paket-card relative flex cursor-pointer rounded-2xl border-2 border-[#e2e8f0] bg-white p-4 transition hover:border-[#522b89]/50">
                        <input type="radio" id="radio-fullservice" name="paket_pengelolaan" value="Full Service" class="sr-only" {{ old('paket_pengelolaan') == 'Full Service' ? 'checked' : '' }} required>
                        <div class="flex w-full items-start justify-between gap-3">
                            <div>
                                <p class="font-display text-base font-bold text-[#522b89]">Full Service</p>
                                <p class="mt-1 text-xs text-[#64748b]">Pengelolaan penuh: pemasaran, perawatan kamar, kebersihan, & laporan rutin.</p>
                            </div>
                            <span id="dot-fullservice" class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border-2 border-[#cbd5e1] bg-white transition">
                                <span class="hidden h-2 w-2 rounded-full bg-white"></span>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-[#e2e8f0]">
                @auth
                    <!-- Jika SUDAH login: langsung submit ke controller & WA -->
                    <button type="submit" class="w-full rounded-xl bg-[#F39C12] px-6 py-4 font-display text-sm font-bold text-[#522b89] shadow-sm transition hover:opacity-90 cursor-pointer flex items-center justify-center gap-2">
                        <span>Kirim Pengajuan & Hubungi Admin via WhatsApp</span>
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                @else
                    <!-- Jika BELUM login: memunculkan Custom Popup Modal Putih-Ungu-Kuning -->
                    <button type="button" onclick="openLoginModal()" 
                            class="w-full rounded-xl bg-[#F39C12] px-6 py-4 font-display text-sm font-bold text-[#522b89] shadow-sm transition hover:opacity-90 cursor-pointer flex items-center justify-center gap-2">
                        <span>Kirim Pengajuan & Hubungi Admin via WhatsApp</span>
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                @endauth
                <p class="mt-2.5 text-center text-xs text-[#64748b]">
                    Data Anda akan langsung tercatat di sistem admin kami dan diteruskan ke WhatsApp tim survei.
                </p>
            </div>
        </form>
    </div>

  </main>

  <!-- ========================================================================= -->
  <!-- POPUP MODAL LOGIN (CLEAN & NATURAL UI)                                    -->
  <!-- ========================================================================= -->
  <div id="loginAlertModal" class="fixed inset-0 z-[120] hidden items-center justify-center p-4 transition-opacity duration-200">
      <!-- Backdrop Hitam Transparan Standar (Tidak Ungu) -->
      <div class="absolute inset-0 bg-black/50 backdrop-blur-xs" onclick="closeLoginModal()"></div>
      
      <!-- Kotak Modal Putih Bersih -->
      <div class="relative w-full max-w-md rounded-2xl border border-[#e2e8f0] bg-white p-6 shadow-xl">
          
          <!-- Header Modal: Ikon Kecil + Judul + Tombol Close -->
          <div class="flex items-start justify-between gap-4">
              <div class="flex items-center gap-3">
                  <div class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-amber-50 text-[#F39C12]">
                      <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                  </div>
                  <div>
                      <h3 class="font-display text-lg font-bold text-[#522b89]">Masuk Akun Diperlukan</h3>
                      <p class="text-xs text-[#64748b]">Kemitraan Pemilik Kos</p>
                  </div>
              </div>

              <button type="button" onclick="closeLoginModal()" class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 cursor-pointer">
                  <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
          </div>

          <!-- Isi Pesan -->
          <div class="mt-4 border-t border-[#e2e8f0] pt-4">
              <p class="text-sm leading-relaxed text-[#475569]">
                  Silakan masuk ke akun Kosan Kampus Anda terlebih dahulu untuk melanjutkan pengajuan pengelolaan kos. Jika belum memiliki akun, Anda dapat mendaftar dalam beberapa langkah singkat.
              </p>
          </div>

          <!-- Footer Tombol Aksi -->
          <div class="mt-6 flex flex-col-reverse gap-2.5 sm:flex-row sm:justify-end">
              <button type="button" onclick="closeLoginModal()" class="rounded-xl border border-[#e2e8f0] bg-white px-4 py-2.5 text-sm font-semibold text-[#64748b] transition hover:bg-slate-50 cursor-pointer">
                  Batal
              </button>
              <a href="/auth?mode=register" class="inline-flex items-center justify-center rounded-xl bg-[#F39C12] px-4 py-2.5 text-sm font-bold text-[#522b89] transition hover:opacity-90">
                  Daftar Akun
              </a>
              <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-xl bg-[#522b89] px-5 py-2.5 text-sm font-bold text-white transition hover:bg-[#3f1d6e]">
                  Masuk
              </a>
          </div>

      </div>
  </div>
  <!-- ========================================================================= -->
  <script>
    // Fungsi Buka & Tutup Modal Login
    function openLoginModal() {
        const modal = document.getElementById('loginAlertModal');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeLoginModal() {
        const modal = document.getElementById('loginAlertModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    // Fungsi Interaksi Radio Card Paket Pengelolaan
    function pilihPaket(paket) {
        const cardAuto = document.getElementById('card-autopilot');
        const radioAuto = document.getElementById('radio-autopilot');
        const dotAuto = document.getElementById('dot-autopilot');

        const cardFull = document.getElementById('card-fullservice');
        const radioFull = document.getElementById('radio-fullservice');
        const dotFull = document.getElementById('dot-fullservice');

        if (paket === 'Auto Pilot') {
            radioAuto.checked = true;
            
            cardAuto.classList.remove('border-[#e2e8f0]', 'bg-white');
            cardAuto.classList.add('border-[#522b89]', 'bg-purple-50/40');
            dotAuto.classList.remove('border-[#cbd5e1]', 'bg-white');
            dotAuto.classList.add('border-[#F39C12]', 'bg-[#F39C12]');
            dotAuto.querySelector('span').classList.remove('hidden');

            cardFull.classList.remove('border-[#522b89]', 'bg-purple-50/40');
            cardFull.classList.add('border-[#e2e8f0]', 'bg-white');
            dotFull.classList.remove('border-[#F39C12]', 'bg-[#F39C12]');
            dotFull.classList.add('border-[#cbd5e1]', 'bg-white');
            dotFull.querySelector('span').classList.add('hidden');
        } else {
            radioFull.checked = true;

            cardFull.classList.remove('border-[#e2e8f0]', 'bg-white');
            cardFull.classList.add('border-[#522b89]', 'bg-purple-50/40');
            dotFull.classList.remove('border-[#cbd5e1]', 'bg-white');
            dotFull.classList.add('border-[#F39C12]', 'bg-[#F39C12]');
            dotFull.querySelector('span').classList.remove('hidden');

            cardAuto.classList.remove('border-[#522b89]', 'bg-purple-50/40');
            cardAuto.classList.add('border-[#e2e8f0]', 'bg-white');
            dotAuto.classList.remove('border-[#F39C12]', 'bg-[#F39C12]');
            dotAuto.classList.add('border-[#cbd5e1]', 'bg-white');
            dotAuto.querySelector('span').classList.add('hidden');
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const selected = document.querySelector('input[name="paket_pengelolaan"]:checked');
        if (selected) {
            pilihPaket(selected.value);
        }
    });
  </script>

</body>
</html>