<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="space-y-6 font-sans">
  
  <div>
    <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Dashboard</h1>
    <p class="mt-1 text-sm text-slate-500">Ringkasan aktivitas platform Kosan — Rabu, 3 September 2026.</p>
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
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">2.548</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> +12,5% <span class="font-normal text-slate-500">vs bulan lalu</span>
        </p>
      </div>
    </a>
    
    <!-- Pemilik Kos -->
    <a href="#" class="text-left group">
      <div class="h-full rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
        <div class="flex items-start justify-between">
          <span class="grid h-11 w-11 place-items-center rounded-xl bg-violet-50 text-violet-600">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </span>
          <svg class="h-4 w-4 text-slate-400 opacity-0 transition group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </div>
        <p class="mt-4 text-sm text-slate-500">Total Pemilik Kos</p>
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">326</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> +8,2% <span class="font-normal text-slate-500">vs bulan lalu</span>
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
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">1.284</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> +15,4% <span class="font-normal text-slate-500">vs bulan lalu</span>
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
        <p class="mt-1 font-display text-2xl font-bold tracking-tight text-slate-900">Rp 248,5 Jt</p>
        <p class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-600">
          <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg> +18,7% <span class="font-normal text-slate-500">vs bulan lalu</span>
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
          <p class="text-sm text-slate-500">Total (dalam juta Rupiah)</p>
        </div>
        <div class="flex rounded-xl bg-slate-50 p-1">
          <button class="rounded-lg bg-white px-3 py-1.5 text-xs font-semibold text-[#0b2046] shadow-sm">30 Hari</button>
          <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:text-slate-900">7 Hari</button>
          <button class="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition hover:text-slate-900">12 Bulan</button>
        </div>
      </div>
      <div class="h-[280px] w-full">
        <!-- Canvas untuk Chart.js -->
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
        <!-- Canvas untuk Chart.js -->
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
        <!-- Canvas untuk Chart.js -->
        <canvas id="userChart"></canvas>
      </div>
    </div>

    <!-- Transaksi Table -->
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2 overflow-hidden">
      <div class="flex items-center justify-between px-5 py-4">
        <h3 class="font-display text-base font-semibold text-slate-900">Transaksi Terbaru</h3>
        <button class="rounded-lg px-3 py-1.5 text-sm font-semibold text-[#0b2046] transition hover:bg-slate-50">Lihat semua</button>
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
            <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
              <td class="px-5 py-3 font-medium text-[#0b2046]">#TRX-8921</td>
              <td class="px-5 py-3 text-slate-900">Andika Dwi</td>
              <td class="px-5 py-3 text-slate-500">KosanClean</td>
              <td class="px-5 py-3 font-semibold text-slate-900">Rp 50.000</td>
              <td class="px-5 py-3 text-slate-500">QRIS</td>
              <td class="px-5 py-3"><span class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-semibold text-emerald-600">Berhasil</span></td>
              <td class="px-5 py-3 text-right">
                <button class="font-semibold text-[#0b2046] hover:underline">Detail</button>
              </td>
            </tr>
            <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
              <td class="px-5 py-3 font-medium text-[#0b2046]">#TRX-8920</td>
              <td class="px-5 py-3 text-slate-900">Siti Rahma</td>
              <td class="px-5 py-3 text-slate-500">KosanJek</td>
              <td class="px-5 py-3 font-semibold text-slate-900">Rp 15.000</td>
              <td class="px-5 py-3 text-slate-500">Transfer Bank</td>
              <td class="px-5 py-3"><span class="inline-flex items-center rounded-full bg-amber-50 px-2 py-0.5 text-xs font-semibold text-amber-600">Pending</span></td>
              <td class="px-5 py-3 text-right">
                <button class="font-semibold text-[#0b2046] hover:underline">Detail</button>
              </td>
            </tr>
            <tr class="border-b border-slate-200 last:border-0 transition hover:bg-slate-50">
              <td class="px-5 py-3 font-medium text-[#0b2046]">#TRX-8919</td>
              <td class="px-5 py-3 text-slate-900">Reza Pratama</td>
              <td class="px-5 py-3 text-slate-500">Sewa Kos 1 Tahun</td>
              <td class="px-5 py-3 font-semibold text-slate-900">Rp 12.000.000</td>
              <td class="px-5 py-3 text-slate-500">Virtual Account</td>
              <td class="px-5 py-3"><span class="inline-flex items-center rounded-full bg-red-50 px-2 py-0.5 text-xs font-semibold text-red-600">Dibatalkan</span></td>
              <td class="px-5 py-3 text-right">
                <button class="font-semibold text-[#0b2046] hover:underline">Detail</button>
              </td>
            </tr>
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
    
    // Konfigurasi umum untuk font dan gaya grid
    Chart.defaults.font.family = 'Inter, sans-serif';
    Chart.defaults.color = '#6b7280';
    const gridConfig = { color: '#eef1f6', drawBorder: false, borderDash: [3, 3] };

    // 1. GRAFIK PENDAPATAN (Area Chart)
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    
    // Membuat efek gradient (biru navy ke transparan) seperti desain
    const gradientRev = ctxRevenue.createLinearGradient(0, 0, 0, 400);
    gradientRev.addColorStop(0, 'rgba(11, 32, 70, 0.2)');
    gradientRev.addColorStop(1, 'rgba(11, 32, 70, 0)');

    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: ['1 Sep', '5 Sep', '10 Sep', '15 Sep', '20 Sep', '25 Sep', '30 Sep'],
            datasets: [{
                label: 'Pendapatan',
                data: [12, 19, 15, 25, 22, 30, 28], // Dummy dalam Juta
                borderColor: '#0b2046',
                backgroundColor: gradientRev,
                borderWidth: 2.5,
                fill: true,
                tension: 0.4, // Membuat garis melengkung/smooth
                pointBackgroundColor: '#0b2046',
                pointBorderWidth: 0,
                pointRadius: 0,
                pointHoverRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: gridConfig, beginAtZero: true }
            }
        }
    });

    // 2. STATISTIK BOOKING (Bar Chart Tumpuk/Grup)
    const ctxBooking = document.getElementById('bookingChart').getContext('2d');
    new Chart(ctxBooking, {
        type: 'bar',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [
                { label: 'Berhasil', data: [12, 15, 10, 18, 14, 20, 25], backgroundColor: '#10b981', borderRadius: 4 },
                { label: 'Pending', data: [3, 5, 2, 4, 6, 8, 5], backgroundColor: '#f59e0b', borderRadius: 4 },
                { label: 'Dibatalkan', data: [1, 0, 2, 1, 0, 3, 1], backgroundColor: '#ef4444', borderRadius: 4 }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, boxWidth: 8 } } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: gridConfig, beginAtZero: true }
            }
        }
    });

    // 3. PENGGUNA BARU (Line Chart)
    const ctxUser = document.getElementById('userChart').getContext('2d');
    new Chart(ctxUser, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep'],
            datasets: [{
                label: 'Pengguna Baru',
                data: [65, 78, 90, 85, 110, 130, 125, 145, 160], // Dummy Data
                borderColor: '#7c3aed', // Warna ungu Tailwind
                borderWidth: 2.5,
                tension: 0.4,
                pointBackgroundColor: '#7c3aed',
                pointBorderWidth: 0,
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
                y: { grid: gridConfig, beginAtZero: true }
            }
        }
    });
});
</script>
@endsection