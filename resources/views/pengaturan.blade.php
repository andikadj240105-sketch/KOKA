<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - KOKA Property</title>
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
      <h1 class="font-display text-2xl font-bold text-[#522b89] sm:text-3xl">Pengaturan Keamanan</h1>
      <p class="mt-1 text-sm text-[#64748b]">Perbarui kata sandi untuk menjaga keamanan akun kamu.</p>
    </div>

    @if(session('success'))
      <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-600 shadow-sm">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm font-semibold text-red-600 shadow-sm">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('password.update') }}" method="POST" class="rounded-2xl border border-[#e2e8f0] bg-white p-6 shadow-sm sm:p-8">
        @csrf
        @method('PUT')
        <div class="space-y-5">
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Kata Sandi Lama</label>
                <input type="password" name="password_lama" required class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Kata Sandi Baru</label>
                <input type="password" name="password_baru" required minlength="8" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>
            <div>
                <label class="mb-1.5 block text-xs font-bold text-[#522b89] uppercase tracking-wide">Konfirmasi Kata Sandi Baru</label>
                <input type="password" name="password_baru_confirmation" required minlength="8" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-2.5 text-sm outline-none focus:border-[#522b89] focus:ring-1 focus:ring-[#522b89]">
            </div>
        </div>
        <div class="mt-8 border-t border-[#e2e8f0] pt-6">
            <button type="submit" class="w-full rounded-xl bg-[#522b89] px-4 py-3 text-sm font-bold text-white shadow-sm hover:opacity-90">Ubah Kata Sandi</button>
        </div>
    </form>
  </main>
</body>
</html>