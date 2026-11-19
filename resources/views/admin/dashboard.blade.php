<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans">
  
  <div>
    <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Dashboard</h1>
    <p class="mt-1 text-sm text-slate-500">Ringkasan aktivitas platform Kosan.</p>
  </div>

  <!-- Stats Grid -->
  <div class="grid grid-cols-2 gap-4 xl:grid-cols-4">
    <!-- Pengguna -->
    <a href="#" class="text-left group">
      <div class="h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between">
          <span class="grid h-11 w-11 place-items-center rounded-xl bg-blue-50 text-[#0b2046]">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
          </span>
          <svg class="h-4 w-4 text-slate-400 opacity-0 transition group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </div>
        <p class="mt-4 text-sm text-slate-500">Total Pengguna</p>
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">{{ number_format($totalPengguna, 0, ',', '.') }}</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> Real-time database
        </p>
      </div>
    </a>
    
    <!-- Total Layanan (Diganti dari Total Pemilik Kos) -->
    <a href="{{ route('admin.layanan.index') }}" class="text-left group">
      <div class="h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between">
          <span class="grid h-11 w-11 place-items-center rounded-xl bg-violet-50 text-violet-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
          </span>
          <svg class="h-4 w-4 text-slate-400 opacity-0 transition group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </div>
        <p class="mt-4 text-sm text-slate-500">Total Layanan</p>
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">{{ number_format($totalLayanan, 0, ',', '.') }}</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> On-Demand Services
        </p>
      </div>
    </a>

    <!-- Total Kos -->
    <a href="#" class="text-left group">
      <div class="h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between">
          <span class="grid h-11 w-11 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
          </span>
          <svg class="h-4 w-4 text-slate-400 opacity-0 transition group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </div>
        <p class="mt-4 text-sm text-slate-500">Total Kos</p>
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">{{ number_format($totalKos, 0, ',', '.') }}</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> Active Listing
        </p>
      </div>
    </a>

    <!-- Pendapatan -->
    <a href="#" class="text-left group">
      <div class="h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between">
          <span class="grid h-11 w-11 place-items-center rounded-xl bg-amber-50 text-amber-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
          </span>
          <svg class="h-4 w-4 text-slate-400 opacity-0 transition group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </div>
        <p class="mt-4 text-sm text-slate-500">Total Pendapatan</p>
        <p class="mt-1 font-display text-xl font-bold tracking-tight text-slate-900">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> Status Berhasil
        </p>
      </div>
    </a>
  </div>

  <!-- Charts Row -->
  <div class="grid gap-6 lg:grid-cols-3">
    <!-- Chart Pendapatan -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:col-span-2">
      <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <div>
          <h3 class="font-display text-base font-semibold text-slate-900">Grafik Pendapatan</h3>
          <p class="text-sm text-slate-500">Total (dalam Rupiah)</p>
        </div>
        <div class="flex rounded-xl bg-slate-50 p-1">
          <button class="rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-[#0b2046] shadow-sm">30 Hari</button>
          <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:text-slate-900">7 Hari</button>
          <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:text-slate-900">12 Bulan</button>
        </div>
      </div>
      <div class="h-[280px] w-full">
        <canvas id="revenueChart"></canvas>
      </div>
    </div>

    <!-- Chart Booking -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="mb-4">
        <h3 class="font-display text-base font-semibold text-slate-900">Statistik Booking</h3>
        <p class="text-sm text-slate-500">7 hari terakhir</p>
      </div>
      <div class="h-[280px] w-full">
        <canvas id="bookingChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Bottom Row -->
  <div class="grid gap-6 lg:grid-cols-3">
    <!-- Chart Users -->
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="mb-4">
        <h3 class="font-display text-base font-semibold text-slate-900">Pengguna Baru</h3>
        <p class="text-sm text-slate-500">9 bulan terakhir</p>
      </div>
      <div class="h-[240px] w-full">
        <canvas id="userChart"></canvas>
      </div>
    </div>

    <!-- Transaksi Table (Real Data dari Bookings) -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2 overflow-hidden">
      <div class="flex items-center justify-between px-5 py-4">
        <h3 class="font-display text-base font-semibold text-slate-900">Transaksi Terbaru</h3>
        <a href="/admin/booking" class="rounded-lg px-3 py-1.5 text-sm font-semibold text-[#0b2046] transition hover:bg-slate-50">Lihat semua</a>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full min-w-[640px] text-sm">
          <thead>
            <tr class="border-y border-slate-200 bg-slate-50 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
              <th class="px-5 py-3">ID</th>
              <th class="px-5 py-3">User</th>
              <th class="px-5 py-3">Layanan</th>
              <th class="px-5 py-3">Total</th>
              <th class="px-5 py-3">Metode</th>
              <th class="px-5 py-3">Status</th>
              <th class="px-5 py-3"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($transaksiTerbaru as $trx)
              <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
                <td class="px-5 py-3 font-medium text-[#0b2046]">#TRX-{{ $trx->id }}</td>
                <td class="px-5 py-3 text-slate-900">{{ $trx->nama }}</td>
                <td class="px-5 py-3 text-slate-500">{{ $trx->layanan }}</td>
                <td class="px-5 py-3 font-semibold text-slate-900">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                <td class="px-5 py-3 text-slate-500">QRIS</td>
                <td class="px-5 py-3">
                  <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $trx->status == 'Berhasil' ? 'bg-emerald-50 text-emerald-600' : ($trx->status == 'Pending' ? 'bg-amber-50 text-amber-600' : 'bg-red-50 text-red-600') }}">
                    {{ $trx->status }}
                  </span>
                </td>
                <td class="px-5 py-3 text-right">
                  <a href="#" class="font-semibold text-[#0b2046] hover:underline">Detail</a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="px-5 py-8 text-center text-slate-500">Belum ada transaksi terbaru.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Tambahkan script Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    Chart.defaults.font.family = 'Inter, sans-serif';
    Chart.defaults.color = '#6b7280';
    const gridConfig = { color: '#eef1f6', drawBorder: false, borderDash: [3, 3] };

    // 1. GRAFIK PENDAPATAN (DINAMIS DARI DATABASE)
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const gradientRev = ctxRevenue.createLinearGradient(0, 0, 0, 400);
    gradientRev.addColorStop(0, 'rgba(11, 32, 70, 0.2)');
    gradientRev.addColorStop(1, 'rgba(11, 32, 70, 0)');

    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: {!! json_encode($revenueLabels) !!},
            datasets: [{
                label: 'Pendapatan',
                data: {!! json_encode($revenueData) !!},
                borderColor: '#0b2046',
                backgroundColor: gradientRev,
                borderWidth: 2.5,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false }, tooltip: { callbacks: { label: function(context) { return 'Rp ' + context.parsed.y.toLocaleString('id-ID'); } } } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: gridConfig, beginAtZero: true }
            }
        }
    });

    // 2. STATISTIK BOOKING (DINAMIS DARI DATABASE)
    const ctxBooking = document.getElementById('bookingChart').getContext('2d');
    new Chart(ctxBooking, {
        type: 'bar',
        data: {
            labels: {!! json_encode($bookingLabels) !!},
            datasets: [
                { label: 'Berhasil', data: {!! json_encode($bookingBerhasil) !!}, backgroundColor: '#10b981', borderRadius: 4 },
                { label: 'Pending', data: {!! json_encode($bookingPending) !!}, backgroundColor: '#f59e0b', borderRadius: 4 },
                { label: 'Dibatalkan', data: {!! json_encode($bookingBatal) !!}, backgroundColor: '#ef4444', borderRadius: 4 }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: gridConfig, beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });

    // 3. PENGGUNA BARU (DINAMIS DARI DATABASE)
    const ctxUser = document.getElementById('userChart').getContext('2d');
    new Chart(ctxUser, {
        type: 'line',
        data: {
            labels: {!! json_encode($userLabels) !!},
            datasets: [{
                label: 'Pengguna Baru',
                data: {!! json_encode($userData) !!},
                borderColor: '#7c3aed',
                borderWidth: 2.5,
                tension: 0.4,
                pointRadius: 3,
                pointHoverRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: gridConfig, beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
});
</script>
@endsection