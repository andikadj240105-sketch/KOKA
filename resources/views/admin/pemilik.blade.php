@extends('admin.layout')

@section('content')
<div x-data="{ activeTab: 'pengajuan' }" class="space-y-6 font-sans">
    
    <!-- Page Header & Tab Switcher -->
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Data & Kemitraan Pemilik Kos</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola pengajuan pengelolaan kos baru dan lihat daftar pemilik properti aktif.</p>
        </div>

        <!-- Tab Navigation -->
        <div class="inline-flex rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
            <button @click="activeTab = 'pengajuan'" 
                    :class="activeTab === 'pengajuan' ? 'bg-[#0b2046] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    class="flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold transition">
                <span>Pengajuan Mitra Baru</span>
                <span :class="activeTab === 'pengajuan' ? 'bg-white/20 text-white' : 'bg-amber-100 text-amber-700'" class="rounded-full px-2 py-0.5 text-[10px] font-bold">
                    {{ $pengajuans->count() }}
                </span>
            </button>
            <button @click="activeTab = 'eksisting'" 
                    :class="activeTab === 'eksisting' ? 'bg-[#0b2046] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    class="flex items-center gap-2 rounded-lg px-4 py-2 text-xs font-semibold transition">
                <span>Data Pemilik Kos</span>
                <span :class="activeTab === 'eksisting' ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600'" class="rounded-full px-2 py-0.5 text-[10px] font-bold">
                    {{ $ownersData->count() }}
                </span>
            </button>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- ===================================================================== -->
    <!-- TAB 1: TABEL PENGAJUAN MITRA BARU (DARI FORM /mitra-kos)              -->
    <!-- ===================================================================== -->
    <div x-show="activeTab === 'pengajuan'" x-transition.opacity class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4 flex items-center justify-between">
            <h2 class="font-display text-sm font-semibold text-slate-900">Daftar Pengajuan Pengelolaan Kos</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[950px] text-left text-sm text-slate-600">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Pemilik</th>
                        <th class="px-6 py-4">Kontak (HP/WA)</th>
                        <th class="px-6 py-4">Nama Kosan</th>
                        <th class="px-6 py-4">Alamat Kosan</th>
                        <th class="px-6 py-4">Kamar</th>
                        <th class="px-6 py-4">Paket</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Tindak Lanjut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($pengajuans as $item)
                    <tr class="transition hover:bg-slate-50">
                        <!-- Pemilik & Tanggal -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-[#522b89] text-xs font-bold text-[#F39C12]">
                                    {{ strtoupper(substr($item->nama, 0, 2)) }}
                                </span>
                                <div>
                                    <p class="font-medium text-slate-900">{{ $item->nama }}</p>
                                    <p class="text-[11px] text-slate-400">{{ $item->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Kontak WA -->
                        <td class="px-6 py-4">
                            @php
                                $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $item->no_telpon));
                            @endphp
                            <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="inline-flex items-center gap-1 font-medium text-emerald-600 hover:underline">
                                <span>{{ $item->no_telpon }}</span>
                                <span class="text-xs">↗</span>
                            </a>
                        </td>

                        <!-- Nama Kosan -->
                        <td class="px-6 py-4 font-semibold text-[#0b2046]">
                            {{ $item->nama_kosan }}
                        </td>

                        <!-- Alamat Kosan -->
                        <td class="px-6 py-4 text-xs text-slate-500 max-w-[220px]">
                            {{ $item->alamat_kosan }}
                        </td>

                        <!-- Jumlah Kamar -->
                        <td class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap">
                            {{ $item->jumlah_kamar }} Kamar
                        </td>

                        <!-- Paket Pengelolaan -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center rounded-md px-2.5 py-1 text-xs font-semibold 
                                {{ $item->paket_pengelolaan === 'Full Service' ? 'bg-purple-50 text-[#522b89]' : 'bg-amber-50 text-amber-700' }}">
                                {{ $item->paket_pengelolaan }}
                            </span>
                        </td>

                        <!-- Badge Status -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium 
                                {{ $item->status === 'Disetujui / Aktif' ? 'bg-emerald-50 text-emerald-600' : 
                                  ($item->status === 'Ditolak' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-600') }}">
                                {{ $item->status }}
                            </span>
                        </td>

                        <!-- Dropdown Ubah Status -->
                        <td class="px-6 py-4 text-right whitespace-nowrap">
                            <form action="{{ route('admin.pemilik.status', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="rounded-lg border border-slate-200 bg-white px-2.5 py-1.5 text-xs font-medium text-slate-700 outline-none focus:border-[#0b2046] cursor-pointer">
                                    <option value="Menunggu Survei" {{ $item->status == 'Menunggu Survei' ? 'selected' : '' }}>Menunggu Survei</option>
                                    <option value="Proses Survei" {{ $item->status == 'Proses Survei' ? 'selected' : '' }}>Proses Survei</option>
                                    <option value="Disetujui / Aktif" {{ $item->status == 'Disetujui / Aktif' ? 'selected' : '' }}>Disetujui / Aktif</option>
                                    <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-slate-500">
                            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <p class="mt-4 font-medium">Belum ada pengajuan pendaftaran mitra kos baru.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- TAB 2: TABLE SECTION PEMILIK EKSISTING (READ-ONLY)                    -->
    <!-- ===================================================================== -->
    <div x-show="activeTab === 'eksisting'" x-transition.opacity style="display: none;" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-display text-sm font-semibold text-slate-900">Data Pemilik Kos Terdaftar (Read-Only)</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs font-semibold uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Pemilik</th>
                        <th class="px-6 py-4">Kampus</th>
                        <th class="px-6 py-4">Kontak (HP/WA)</th>
                        <th class="px-6 py-4">Properti Kos</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4">Status Akun</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    
                    @forelse($ownersData as $owner)
                    <tr class="transition hover:bg-slate-50">
                        <!-- DATA PEMILIK -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-[#0b2046] text-xs font-bold text-white">
                                    {{ $owner->avatar }}
                                </span>
                                <div>
                                    <p class="font-medium text-slate-900">{{ $owner->nama }}</p>
                                    <p class="text-xs text-slate-400">{{ $owner->email }}</p>
                                </div>
                            </div>
                        </td>
                        
                        <!-- DATA SEKITAR KAMPUS -->
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-[#0b2046]">
                                {{ $owner->sekitar_kampus }}
                            </span>
                        </td>
                        
                        <!-- DATA KONTAK -->
                        <td class="px-6 py-4">
                            @if($owner->hp !== '-')
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $owner->hp) }}" target="_blank" class="text-blue-600 hover:underline font-medium">
                                    {{ $owner->hp }}
                                </a>
                            @else
                                <span class="text-slate-400">-</span>
                            @endif
                        </td>
                        
                        <!-- DATA PROPERTI -->
                        <td class="px-6 py-4 font-medium text-[#0b2046]">
                            {{ $owner->nama_kos }} 
                        </td>
                        
                        <!-- DATA LOKASI -->
                        <td class="px-6 py-4 text-slate-500">
                            {{ $owner->lokasi }}
                        </td>
                        
                        <!-- DATA STATUS -->
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium 
                                {{ $owner->status === 'Terverifikasi' ? 'bg-emerald-50 text-emerald-600' : 
                                  ($owner->status === 'Menunggu' ? 'bg-amber-50 text-amber-600' : 'bg-red-50 text-red-600') }}">
                                {{ $owner->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                            <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <p class="mt-4 font-medium">Belum ada akun pemilik kos yang terdaftar.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection