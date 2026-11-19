<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Booking — KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
  <x-navbar />

  <main class="mx-auto max-w-[1000px] px-4 py-8 sm:px-6">
    <!-- STEP INDICATOR -->
    <div class="mb-8 flex items-center justify-center gap-2 sm:gap-4 text-xs sm:text-sm">
      <div class="flex items-center gap-2">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-[#522b89] font-bold text-white">1</span>
        <span class="font-semibold text-[#522b89]">Isi Data</span>
      </div>
      <span class="h-px w-8 sm:w-16 bg-[#e2e8f0]"></span>
      <div class="flex items-center gap-2 text-slate-400">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-slate-100 font-bold">2</span>
        <span>Ringkasan</span>
      </div>
      <span class="h-px w-8 sm:w-16 bg-[#e2e8f0]"></span>
      <div class="flex items-center gap-2 text-slate-400">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-slate-100 font-bold">3</span>
        <span>Pembayaran</span>
      </div>
    </div>

    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Formulir Booking</h1>
        <p class="mt-1 text-sm text-[#64748b]">{{ $kos->nama }} · {{ $kos->alamat ?? $kos->lokasi }}</p>
      </div>
      <button type="button" onclick="history.back()" class="inline-flex items-center gap-1.5 rounded-xl border border-[#e2e8f0] bg-white px-4 py-2 text-sm font-semibold text-[#522b89] transition hover:bg-[#f8fafc]">
        Kembali
      </button>
    </div>

    <div class="rounded-3xl border border-[#e2e8f0] bg-white p-6 sm:p-8 shadow-sm">
      <form action="{{ route('kos.booking.proses') }}" method="POST" class="space-y-6">
        @csrf
        <input type="hidden" name="kos_id" value="{{ $kos->id }}">

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Nama Lengkap *</label>
            <input type="text" name="nama" value="{{ Auth::check() ? Auth::user()->nama : '' }}" required 
              class="w-full rounded-xl border border-[#e2e8f0] bg-slate-50 px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" placeholder="Nama lengkap" />
          </div>
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Nomor HP / WhatsApp *</label>
            <input type="tel" name="no_hp" value="{{ Auth::check() ? (Auth::user()->hp ?? '') : '' }}" required 
              class="w-full rounded-xl border border-[#e2e8f0] bg-slate-50 px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" placeholder="08xxxxxxxxxx" />
          </div>
        </div>

        <div>
          <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Email *</label>
          <input type="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required 
            class="w-full rounded-xl border border-[#e2e8f0] bg-slate-50 px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" placeholder="nama@email.com" />
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Rencana Tanggal Survei *</label>
            <input type="date" name="tanggal_survei" required class="w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" />
          </div>
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Durasi Sewa *</label>
            <select name="durasi" required class="w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
              <option value="" disabled selected>Pilih durasi...</option>
              
              <!-- Tampilkan opsi 1 Bulan jika harga_bulan atau harga tersedia -->
              @if((!empty($kos->harga_bulan) && $kos->harga_bulan > 0) || (!empty($kos->harga) && $kos->harga > 0))
                  <option value="1 Bulan">1 Bulan</option>
              @endif

              <!-- Tampilkan opsi 6 Bulan jika harga_6_bulan tersedia -->
              @if(!empty($kos->harga_6_bulan) && $kos->harga_6_bulan > 0)
                  <option value="6 Bulan">6 Bulan</option>
              @endif

              <!-- Tampilkan opsi 1 Tahun jika harga_tahun tersedia -->
              @if(!empty($kos->harga_tahun) && $kos->harga_tahun > 0)
                  <option value="1 Tahun">1 Tahun</option>
              @endif
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Tanggal Mulai Masuk *</label>
            <input type="date" name="tanggal_masuk" required class="w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" />
          </div>
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-[#522b89]">Catatan Tambahan (Opsional)</label>
            <input type="text" name="catatan" class="w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm text-[#522b89] outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]" placeholder="Catatan tambahan" />
          </div>
        </div>

        <div class="pt-4">
          <button type="submit" class="w-full rounded-2xl bg-[#522b89] py-4 text-center text-sm font-bold text-white shadow-lg transition hover:bg-[#3f1d6e]">
            Lanjutkan ke Ringkasan
          </button>
        </div>
      </form>
    </div>
  </main>
  <x-footer />
</body>
</html>