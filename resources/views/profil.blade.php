<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] font-sans text-[#1e293b] antialiased">
  
  <x-navbar />

  <main class="mx-auto max-w-2xl px-4 py-8 sm:px-6">
    
    <div class="mb-6">
      <a href="/akun" class="mb-4 inline-flex items-center gap-1.5 text-sm font-medium text-[#64748b] transition hover:text-[#522b89]">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Akun
      </a>
      <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Profil Saya</h1>
      <p class="mt-1 text-sm text-[#64748b]">Lengkapi data diri kamu untuk mempermudah proses sewa kos.</p>
    </div>

    @if(session('success'))
      <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-600 shadow-sm">
          {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" class="rounded-2xl border border-[#e2e8f0] bg-white p-6 shadow-sm sm:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-5">
            <!-- Email (Read Only karena untuk login) -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Email</label>
                <input type="email" value="{{ Auth::user()->email }}" disabled class="w-full rounded-xl border border-[#e2e8f0] bg-slate-100 px-4 py-2.5 text-sm font-medium text-slate-500 outline-none">
                <p class="mt-1 text-[11px] text-[#64748b]">Email tidak dapat diubah karena digunakan untuk masuk.</p>
            </div>

            <!-- Nomor HP -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Nomor Handphone / WhatsApp</label>
                <input type="text" name="hp" value="{{ Auth::user()->hp }}" placeholder="Contoh: 081234567890" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
                    <option value="" disabled {{ !Auth::user()->jenis_kelamin ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ Auth::user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ Auth::user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ Auth::user()->tanggal_lahir }}" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>

            <!-- Pekerjaan / Status -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Pekerjaan / Status</label>
                <input type="text" name="pekerjaan" value="{{ Auth::user()->pekerjaan }}" placeholder="Contoh: Mahasiswa UPI / Karyawan Swasta" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>

            <!-- Alamat Asal -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Alamat Asal (Sesuai KTP)</label>
                <textarea name="alamat_asal" rows="3" placeholder="Masukkan alamat lengkap..." class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">{{ Auth::user()->alamat_asal }}</textarea>
            </div>

            <!-- Kontak Darurat -->
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Kontak Darurat (Orang Tua / Wali)</label>
                <input type="text" name="kontak_darurat" value="{{ Auth::user()->kontak_darurat }}" placeholder="Contoh: 089876543210" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm font-medium outline-none transition focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>
        </div>

        <div class="mt-8 border-t border-[#e2e8f0] pt-6">
            <button type="submit" class="w-full rounded-xl bg-[#522b89] px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90">Simpan Profil Lengkap</button>
        </div>
    </form>
  </main>
</body>
</html>