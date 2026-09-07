<!-- resources/views/admin/driver.blade.php -->
@extends('admin.layout')

@section('content')
<div class="relative flex h-[75vh] w-full items-center justify-center overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 font-sans">
  <div class="absolute inset-0 bg-white/40 backdrop-blur-sm"></div>
  <div class="relative z-10 w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-xl border border-slate-100 animate-fade-in">
    <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-full bg-blue-50 text-[#0b2046]">
      <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
    </div>
    <h2 class="font-display text-xl font-bold text-slate-900">Fitur Akan Datang</h2>
    <p class="mt-2 text-sm text-slate-500">Halaman <span class="font-semibold text-[#0b2046]">Mitra Driver</span> saat ini sedang dalam tahap pengembangan.</p>
    <div class="mt-6">
      <a href="/admin" class="block w-full rounded-xl bg-[#0b2046] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:opacity-90">
        Kembali ke Dashboard
      </a>
    </div>
  </div>
</div>
@endsection