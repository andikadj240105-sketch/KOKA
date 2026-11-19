<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Booking — KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
  <x-navbar />

  <main class="mx-auto max-w-[1000px] px-4 py-8 sm:px-6">
    <!-- STEP INDICATOR -->
    <div class="mb-8 flex items-center justify-center gap-2 sm:gap-4 text-xs sm:text-sm">
      <div class="flex items-center gap-2">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-emerald-600 font-bold text-white">✓</span>
        <span class="font-semibold text-slate-600">Isi Data</span>
      </div>
      <span class="h-px w-8 sm:w-16 bg-emerald-600"></span>
      <div class="flex items-center gap-2">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-[#522b89] font-bold text-white">2</span>
        <span class="font-semibold text-[#522b89]">Ringkasan</span>
      </div>
      <span class="h-px w-8 sm:w-16 bg-[#e2e8f0]"></span>
      <div class="flex items-center gap-2 text-slate-400">
        <span class="grid h-7 w-7 place-items-center rounded-full bg-slate-100 font-bold">3</span>
        <span>Selesai</span>
      </div>
    </div>

    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
      <div>
        <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Ringkasan Booking</h1>
        <p class="mt-1 text-sm text-[#64748b]">{{ $kos->nama }} · {{ $kos->alamat ?? $kos->lokasi }}</p>
      </div>
      <a href="{{ route('kos.booking', $kos->id) }}" class="inline-flex items-center gap-1.5 rounded-xl border border-[#e2e8f0] bg-white px-4 py-2 text-sm font-semibold text-[#522b89] transition hover:bg-[#f8fafc]">
        Ubah Data
      </a>
    </div>

    <div class="rounded-3xl border border-[#e2e8f0] bg-white p-6 sm:p-8 shadow-sm space-y-6">
      <div class="divide-y divide-[#e2e8f0] text-sm">
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Kos</span><span class="font-semibold text-[#522b89]">{{ $kos->nama }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Nama Pemesan</span><span class="font-semibold text-[#522b89]">{{ $booking['nama'] }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Nomor HP</span><span class="font-semibold text-[#522b89]">{{ $booking['no_hp'] }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Email</span><span class="font-semibold text-[#522b89]">{{ $booking['email'] }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Rencana Tanggal Survei</span><span class="font-semibold text-[#522b89]">{{ $booking['tanggal_survei'] }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Tanggal Masuk</span><span class="font-semibold text-[#522b89]">{{ $booking['tanggal_masuk'] }}</span></div>
        <div class="flex justify-between py-3.5"><span class="text-[#64748b]">Durasi Sewa</span><span class="font-semibold text-[#522b89]">{{ $booking['durasi'] }}</span></div>
      </div>

      <div class="grid grid-cols-1 gap-3 pt-2 sm:grid-cols-2">
        <a href="{{ route('kos.booking', $kos->id) }}" class="w-full rounded-2xl border border-[#e2e8f0] bg-white py-4 text-center text-sm font-bold text-[#522b89] shadow-sm transition hover:bg-[#f8fafc]">
          Ubah Data
        </a>
        
        <!-- Form untuk memicu penyimpanan database dan mengarah ke WhatsApp -->
        <form action="{{ route('kos.booking.simpan') }}" method="POST">
          @csrf
          <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#F39C12] py-4 text-center text-sm font-bold text-[#522b89] shadow-md transition hover:bg-[#F5B041]">
            <svg class="h-5 w-5 text-emerald-700" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Hubungi Admin via WhatsApp
          </button>
        </form>
      </div>
    </div>
  </main>
  <x-footer />
</body>
</html> 