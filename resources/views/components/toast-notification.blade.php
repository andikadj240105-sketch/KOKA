<!-- resources/views/components/toast-notification.blade.php -->
@auth
<div id="custom-toast" class="fixed left-1/2 -translate-x-1/2 z-[120] hidden max-w-sm w-[90%] sm:w-full transform transition-all duration-300 top-6 sm:top-6 sm:bottom-auto -translate-y-10 sm:translate-y-[-20px] opacity-0">
    <div class="flex items-start gap-3 rounded-2xl bg-white border border-purple-100 p-4 shadow-2xl shadow-purple-900/15">
        <!-- Ikon / Logo -->
        <div class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-[#522b89] text-[#F39C12] font-bold shadow-sm">
            🔔
        </div>
        
        <!-- Konten Teks -->
        <div class="flex-1">
            <h4 id="toast-title" class="text-sm font-bold text-[#522b89]">Judul Notifikasi</h4>
            <p id="toast-message" class="text-xs text-slate-600 mt-0.5">Pesan notifikasi akan muncul di sini.</p>
        </div>

        <!-- Tombol Close -->
        <button onclick="hideToast()" class="text-slate-400 hover:text-slate-700 transition">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>

<script>
    function showToast(title, message) {
        const toast = document.getElementById('custom-toast');
        if (!toast) return;
        
        document.getElementById('toast-title').innerText = title;
        document.getElementById('toast-message').innerText = message;

        toast.classList.remove('hidden');
        setTimeout(() => {
            // Menghilangkan offset awal agar box meluncur mulus ke posisi tengah-atas (desktop) / tengah-bawah (mobile)
            toast.classList.remove('-translate-y-10', 'sm:translate-y-[-20px]', 'opacity-0');
        }, 100);

        // Otomatis sembunyikan setelah 5 detik
        setTimeout(() => {
            hideToast();
        }, 5000);
    }

    function hideToast() {
        const toast = document.getElementById('custom-toast');
        if (toast) {
            // Mengembalikan animasi keluar (ke atas untuk desktop, ke bawah untuk mobile)
            toast.classList.add('-translate-y-10', 'sm:translate-y-[-20px]', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 300);
        }
    }
</script>
@endauth