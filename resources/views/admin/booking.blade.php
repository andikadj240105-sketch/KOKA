<!-- resources/views/admin/booking.blade.php -->
@extends('admin.layout')

@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
  <div>
    <h1 class="font-display text-2xl font-bold text-[#0b2046]">Manajemen Booking Kos</h1>
    <p class="text-sm text-[#64748b]">Pantau seluruh transaksi dan reservasi booking kos.</p>
  </div>
</div>

<!-- KARTU STATISTIK (WIDGET CARDS) -->
@php
    $totalBooking = $bookings->count();
@endphp
<div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
  <!-- Total Booking -->
  <div class="rounded-2xl border border-[#e2e8f0] bg-white p-5 shadow-sm">
    <div class="flex items-center gap-3">
      <div class="grid h-10 w-10 place-items-center rounded-xl bg-blue-50 text-blue-600">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
      </div>
      <span class="text-xs font-semibold text-[#64748b]">Total Booking Kos Masuk</span>
    </div>
    <div class="mt-4 font-display text-2xl font-bold text-[#0b2046]">{{ number_format($totalBooking, 0, ',', '.') }}</div>
  </div>
</div>

<!-- TABEL DAFTAR BOOKING -->
<div class="rounded-2xl border border-[#e2e8f0] bg-white shadow-sm overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse text-sm">
      <thead>
        <tr class="border-b border-[#e2e8f0] bg-slate-50/70 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
          <th class="py-3.5 px-6">BOOKING ID</th>
          <th class="py-3.5 px-6">USER</th>
          <th class="py-3.5 px-6">KOS</th>
          <th class="py-3.5 px-6">TANGGAL</th>
          <th class="py-3.5 px-6">DURASI</th>
          <th class="py-3.5 px-6">TOTAL</th>
          <th class="py-3.5 px-6 text-right">AKSI</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-[#e2e8f0]">
        @forelse($bookings as $item)
          <tr class="hover:bg-slate-50 transition">
            <td class="py-4 px-6 font-semibold text-[#0b2046]">BK-{{ 3300 + $item->id }}</td>
            <td class="py-4 px-6 font-medium text-[#0b2046]">
              {{ $item->nama }}
              <div class="text-[11px] text-slate-400 font-normal">{{ $item->no_hp }}</div>
            </td>
            <td class="py-4 px-6 text-slate-600">{{ str_replace('Booking Kos: ', '', $item->layanan) }}</td>
            <td class="py-4 px-6 text-slate-600">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}</td>
            <td class="py-4 px-6 text-slate-600">{{ $item->durasi }}</td>
            <td class="py-4 px-6 font-semibold text-[#0b2046]">Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
            
            <!-- Kolom Status sudah dibuang total -->

            <td class="py-4 px-6 text-right">
              <!-- Tombol Chat WA User -->
              <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->no_hp) }}?text=Halo%20{{ urlencode($item->nama) }},%20saya%20admin%20KOKA%20Property%20terkait%20booking%20kos%20Anda..." target="_blank" class="inline-flex items-center gap-1.5 rounded-xl bg-emerald-500 px-3.5 py-2 text-xs font-bold text-white transition hover:bg-emerald-600 shadow-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Chat User
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="py-12 text-center text-sm text-slate-400">
              Belum ada data transaksi booking kos.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection