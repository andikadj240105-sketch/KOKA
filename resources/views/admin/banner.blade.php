@extends('admin.layout')

@section('content')
<div class="font-sans space-y-6">
    
    <div>
        <h1 class="font-display text-2xl font-semibold tracking-tight text-slate-900">Kelola Banner Iklan Beranda</h1>
        <p class="mt-1 text-sm text-slate-500">Unggah poster promo atau iklan yang akan tampil otomatis di halaman Beranda (Desktop & Mobile).</p>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Banner -->
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="font-display text-base font-semibold text-slate-900 mb-4">Unggah Banner Iklan Baru</h2>
        <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 items-end">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Foto Banner * (Rasio 16:6 / 1280×480px)</label>
                <input type="file" name="gambar" accept="image/*" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-700">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Judul / Catatan Iklan (Opsional)</label>
                <input type="text" name="judul" placeholder="Contoh: Promo Kos Awal Semester" class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-[#0b2046]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Link Tujuan Saat Diklik (Opsional)</label>
                <input type="text" name="link_tujuan" placeholder="Contoh: /cari-kos atau https://..." class="w-full rounded-xl border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-[#0b2046]">
            </div>

            <div class="flex gap-2">
                <div class="w-24">
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Urutan</label>
                    <input type="number" name="urutan" value="1" min="0" class="w-full rounded-xl border border-slate-200 px-3 py-2.5 text-sm outline-none focus:border-[#0b2046]">
                </div>
                <button type="submit" class="flex-1 rounded-xl bg-[#0b2046] px-4 py-2.5 text-sm font-semibold text-white transition hover:opacity-90 cursor-pointer">
                    + Upload
                </button>
            </div>
        </form>
    </div>

    <!-- Daftar Banner Terpasang -->
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($banners as $banner)
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm flex flex-col">
            <div class="relative aspect-[16/6] w-full bg-slate-100">
                <img src="{{ asset('storage/' . $banner->gambar) }}" alt="{{ $banner->judul }}" class="h-full w-full object-cover">
                <span class="absolute top-2.5 left-2.5 rounded-full px-2.5 py-1 text-[11px] font-bold shadow-sm {{ $banner->is_active ? 'bg-emerald-500 text-white' : 'bg-slate-600 text-white' }}">
                    {{ $banner->is_active ? 'Aktif Tayang' : 'Disembunyikan' }}
                </span>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between gap-4">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold text-slate-900 text-sm">{{ $banner->judul ?: 'Banner Tanpa Judul' }}</h3>
                        <span class="text-xs font-semibold text-slate-400">Urutan #{{ $banner->urutan }}</span>
                    </div>
                    <p class="mt-1 text-xs text-slate-500 truncate">
                        Link: <span class="text-blue-600">{{ $banner->link_tujuan ?: 'Tidak ada link' }}</span>
                    </p>
                </div>

                <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                    <form action="{{ route('admin.banner.toggle', $banner->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 cursor-pointer">
                            {{ $banner->is_active ? 'Sembunyikan' : 'Tampilkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Hapus banner iklan ini secara permanen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-100 cursor-pointer">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center text-sm text-slate-500">
            Belum ada banner iklan yang diunggah. Silakan unggah foto banner di atas.
        </div>
        @endforelse
    </div>

</div>
@endsection