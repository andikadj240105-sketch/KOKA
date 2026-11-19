@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between w-full mt-8 gap-4">
        
        <!-- BAGIAN KIRI: Teks Informasi -->
        <div class="hidden sm:block">
            <p class="text-[14px] text-[#64748b]">
                Menampilkan <span class="font-bold text-[#522b89]">{{ $paginator->firstItem() }}</span> 
                sampai <span class="font-bold text-[#522b89]">{{ $paginator->lastItem() }}</span> 
                dari <span class="font-bold text-[#522b89]">{{ $paginator->total() }}</span> kos
            </p>
        </div>

        <!-- BAGIAN KANAN: Tombol-tombol (Desain Terpisah / Separated Buttons) -->
        <div class="flex items-center justify-center sm:justify-end gap-1.5 w-full sm:w-auto">
            
            {{-- Tombol Sebelumnya (Prev) --}}
            @if ($paginator->onFirstPage())
                <span class="grid h-10 w-10 place-items-center rounded-xl border border-[#e2e8f0] bg-slate-50 text-slate-300 cursor-not-allowed">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="grid h-10 w-10 place-items-center rounded-xl border border-[#e2e8f0] bg-white text-[#522b89] shadow-sm transition hover:bg-[#f8fafc] hover:border-[#522b89]/30 hover:-translate-y-0.5">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                </a>
            @endif

            {{-- Angka Halaman --}}
            <div class="hidden sm:flex items-center gap-1.5">
                @foreach ($elements as $element)
                    
                    {{-- Pemisah Tiga Titik (...) --}}
                    @if (is_string($element))
                        <span class="grid h-10 w-10 place-items-center text-[14px] font-medium text-[#64748b]">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Link Angka --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="grid h-10 w-10 place-items-center rounded-xl bg-[#522b89] text-[14px] font-bold text-white shadow-md cursor-default">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="grid h-10 w-10 place-items-center rounded-xl border border-[#e2e8f0] bg-white text-[14px] font-semibold text-[#64748b] shadow-sm transition hover:bg-[#f8fafc] hover:text-[#522b89] hover:border-[#522b89]/30 hover:-translate-y-0.5">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Tombol Selanjutnya (Next) --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="grid h-10 w-10 place-items-center rounded-xl border border-[#e2e8f0] bg-white text-[#522b89] shadow-sm transition hover:bg-[#f8fafc] hover:border-[#522b89]/30 hover:-translate-y-0.5">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </a>
            @else
                <span class="grid h-10 w-10 place-items-center rounded-xl border border-[#e2e8f0] bg-slate-50 text-slate-300 cursor-not-allowed">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                </span>
            @endif
            
        </div>
    </nav>
@endif