<!-- resources/views/components/modal-layanan.blade.php -->
<div id="serviceModal" class="fixed inset-0 z-[80] hidden font-sans">
    
    <!-- Latar Belakang Gelap (Backdrop) -->
    <div id="modalBackdrop" class="fixed inset-0 bg-[#0b2046]/40 backdrop-blur-sm transition-opacity duration-300 opacity-0" onclick="closeModal()"></div>

    <!-- Container untuk mengatur posisi ke tengah (Desktop) atau bawah (Mobile) -->
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto pointer-events-none">
        <div class="flex min-h-full items-end justify-center sm:items-center sm:p-4">
            
            <!-- Kotak Modal -->
            <div id="modalPanel" class="pointer-events-auto relative flex flex-col w-full max-h-[90vh] sm:w-[500px] transform overflow-hidden rounded-t-3xl bg-white text-left shadow-2xl transition-all duration-300 sm:rounded-3xl opacity-0 translate-y-full sm:translate-y-0 sm:scale-95">
                
                <!-- Header Modal (shrink-0 agar tidak ikut mengecil) -->
                <div class="flex items-start justify-between p-6 pb-4 border-b border-[#e2e8f0] shrink-0">
                    <div>
                        <h3 id="modalTitle" class="font-display text-lg font-bold text-[#0b2046]">Nama Layanan</h3>
                        <p id="modalDesc" class="mt-1 text-sm text-[#64748b]">Deskripsi layanan</p>
                    </div>
                    <button type="button" onclick="closeModal()" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#0b2046] transition hover:bg-[#e2e8f0]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Form Container -->
                <!-- Aksi URL akan diubah secara dinamis oleh JavaScript -->
                <form action="/pembayaran" method="GET" id="dynamicForm" class="flex flex-col flex-1 overflow-hidden" onsubmit="handleFormSubmit(event)">
                    <input type="hidden" id="serviceTypeInput" name="service_type" value="">
                    
                    <!-- Area Input yang bisa di-scroll -->
                    <div class="flex-1 overflow-y-auto p-6">
                        <div id="formFieldsContainer" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- Fields disuntikkan di sini via JS -->
                        </div>
                    </div>

                    <!-- Footer / Tombol Submit (Sticky di Bawah) -->
                    <div class="shrink-0 border-t border-[#e2e8f0] bg-white p-6">
                        <button type="submit" id="submitBtn" class="w-full rounded-full bg-[#E5B044] px-6 py-3.5 text-sm font-bold text-[#0b2046] transition hover:opacity-90">
                            Pesan Sekarang
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    // Menyimpan konfigurasi layanan yang sedang dibuka
    let currentServiceConfig = null;
    let currentServiceName = "";

    const serviceConfigs = {
        // --- 7 LAYANAN TRANSAKSIONAL ---
        'KosanJek': {
            price: 25000, desc: "Antar-jemput & pengantaran cepat", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "pickup", label: "Lokasi Penjemputan", required: true },
                { name: "tujuan", label: "Lokasi Tujuan", required: true },
                { name: "tanggal", label: "Tanggal", type: "date", required: true, half: true },
                { name: "jam", label: "Jam", type: "time", required: true, half: true },
                { name: "kendaraan", label: "Jenis Kendaraan", type: "select", options: ["Motor", "Mobil"], required: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanMove': {
            price: 150000, desc: "Pindahan mudah & aman", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "asal", label: "Alamat Asal", required: true },
                { name: "tujuan", label: "Alamat Tujuan", required: true },
                { name: "tanggal", label: "Tanggal Pindahan", type: "date", required: true, half: true },
                { name: "barang", label: "Jumlah Barang", type: "select", options: ["Sedikit", "Sedang", "Banyak"], required: true, half: true },
                { name: "lantai", label: "Lantai", type: "select", options: ["1", "2", "3", "4+"], half: true },
                { name: "lift", label: "Ada Lift?", type: "select", options: ["Ya", "Tidak"], half: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanClean': {
            price: 50000, desc: "Kebersihan kamar terjaga", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "alamat", label: "Alamat", required: true },
                { name: "ruangan", label: "Jenis Ruangan", type: "select", options: ["Kamar", "Kamar Mandi", "Dapur", "Seluruh Kos"], required: true, half: true },
                { name: "luas", label: "Luas Ruangan", type: "select", options: ["< 12 m²", "12–24 m²", "> 24 m²"], half: true },
                { name: "tanggal", label: "Tanggal", type: "date", required: true, half: true },
                { name: "jam", label: "Jam", type: "time", required: true, half: true },
                { name: "jenis", label: "Jenis Cleaning", type: "select", options: ["Reguler", "Deep Cleaning"], required: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanFix': {
            price: 40000, desc: "Perawatan & perbaikan", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "alamat", label: "Alamat Kos", required: true },
                { name: "kategori", label: "Kategori Kerusakan", type: "select", options: ["Listrik", "Air/Pipa", "AC", "Furniture", "Lainnya"], required: true },
                { name: "deskripsi", label: "Deskripsi Kerusakan", type: "textarea", required: true },
                { name: "foto", label: "Upload Foto", type: "file" },
                { name: "tanggal", label: "Tanggal Kunjungan", type: "date", required: true, half: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanLaundry': {
            price: 20000, desc: "Laundry praktis antar-jemput", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "pickup", label: "Alamat Pickup", required: true },
                { name: "jenis", label: "Jenis Laundry", type: "select", options: ["Cuci Kering", "Cuci Setrika", "Setrika Saja", "Express"], required: true, half: true },
                { name: "berat", label: "Estimasi Berat", type: "select", options: ["< 3 kg", "3–5 kg", "> 5 kg"], half: true },
                { name: "tanggal", label: "Tanggal Pickup", type: "date", required: true, half: true },
                { name: "jam", label: "Jam Pickup", type: "time", required: true, half: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanMart': {
            price: 15000, desc: "Belanja kebutuhan harian", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "alamat", label: "Alamat Pengiriman", required: true },
                { name: "daftar", label: "Daftar Kebutuhan", type: "textarea", required: true },
                { name: "tanggal", label: "Tanggal Pengiriman", type: "date", required: true, half: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },
        'KosanStorage': {
            price: 75000, desc: "Titip barang aman", actionUrl: "/pembayaran",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "pickup", label: "Alamat Pickup", required: true },
                { name: "barang", label: "Jenis Barang", required: true, half: true },
                { name: "jumlah", label: "Jumlah Barang", type: "select", options: ["1–5", "6–10", "> 10"], half: true },
                { name: "durasi", label: "Durasi Penyimpanan", type: "select", options: ["1 Bulan", "3 Bulan", "6 Bulan", "1 Tahun"], required: true, half: true },
                { name: "tanggal", label: "Tanggal Pickup", type: "date", required: true, half: true },
                { name: "catatan", label: "Catatan", type: "textarea" },
            ]
        },

        // --- 3 LAYANAN DUKUNGAN (TIDAK BERBAYAR & TIDAK KE HALAMAN PEMBAYARAN) ---
        'Lapor Masalah': {
            price: 0, 
            desc: "Laporkan kendala di kos atau aplikasi",
            btnText: "Kirim Laporan",
            actionUrl: "non_transactional", // Menandakan bahwa ini tidak perlu ke halaman bayar
            successMessage: "Laporan berhasil dikirim! Tim kami akan segera memprosesnya.",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "kategori", label: "Kategori Kendala", type: "select", options: ["Fasilitas Kos", "Aplikasi KOKA", "Layanan KOKA", "Lainnya"], required: true },
                { name: "detail", label: "Detail Masalah", type: "textarea", required: true },
                { name: "foto", label: "Upload Bukti Foto (Opsional)", type: "file" }
            ]
        },
        'KOKA Rewards': {
            price: 0, 
            desc: "Cek dan klaim point keuntunganmu",
            btnText: "Cek Poin Sekarang",
            actionUrl: "non_transactional",
            successMessage: "Data poin sedang diproses. Silakan cek notifikasi Anda.",
            fields: [
                { name: "hp", label: "Nomor HP Terdaftar", type: "tel", required: true }
            ]
        },
        'KOKA Care': {
            price: 0, 
            desc: "Bantuan CS KOKA 24/7 untukmu",
            btnText: "Kirim Pesan ke CS",
            actionUrl: "non_transactional",
            successMessage: "Pesan terkirim! CS kami akan segera menghubungi Anda.",
            fields: [
                { name: "nama", label: "Nama Lengkap", required: true, half: true },
                { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                { name: "subjek", label: "Subjek Pertanyaan", required: true },
                { name: "pesan", label: "Isi Pesan", type: "textarea", required: true }
            ]
        }
    };

    const modal = document.getElementById('serviceModal');
    const backdrop = document.getElementById('modalBackdrop');
    const panel = document.getElementById('modalPanel');

    function openModal(serviceName) {
        currentServiceConfig = serviceConfigs[serviceName];
        currentServiceName = serviceName;
        
        if (!currentServiceConfig) return;

        // 1. Set Isi Teks & Action URL
        document.getElementById('modalTitle').innerText = serviceName;
        document.getElementById('modalDesc').innerText = currentServiceConfig.desc;
        document.getElementById('serviceTypeInput').value = serviceName;
        
        const form = document.getElementById('dynamicForm');
        // Jika form adalah transaksional, arahkan ke URL pembayaran. Jika tidak, hapus action-nya.
        if (currentServiceConfig.actionUrl !== "non_transactional") {
            form.action = currentServiceConfig.actionUrl;
        } else {
            form.removeAttribute('action');
        }
        
        // Logika Tombol Cerdas
        const btn = document.getElementById('submitBtn');
        if (currentServiceConfig.price > 0) {
            const formattedPrice = new Intl.NumberFormat('id-ID').format(currentServiceConfig.price);
            btn.innerText = `Pesan Sekarang · Rp ${formattedPrice}`;
        } else {
            btn.innerText = currentServiceConfig.btnText || 'Kirim';
        }

        // 2. Render Form Fields
        const container = document.getElementById('formFieldsContainer');
        let htmlContent = '';
        const inputBaseClass = "w-full rounded-xl border border-[#e2e8f0] bg-white px-4 py-3 text-sm text-[#1e293b] outline-none transition placeholder:text-[#64748b] focus:border-[#0b2046] focus:ring-4 focus:ring-[#0b2046]/10";

        currentServiceConfig.fields.forEach(field => {
            const colSpan = field.half ? 'sm:col-span-1' : 'sm:col-span-2';
            const isRequired = field.required ? '<span class="text-[#E5B044]">*</span>' : '';
            const requiredAttr = field.required ? 'required' : '';
            
            htmlContent += `<div class="${colSpan}">
                <label class="mb-1.5 block text-xs font-semibold text-[#0b2046]">${field.label} ${isRequired}</label>`;

            if (field.type === 'textarea') {
                htmlContent += `<textarea rows="3" name="${field.name}" class="${inputBaseClass} resize-none" ${requiredAttr}></textarea>`;
            } else if (field.type === 'select') {
                htmlContent += `<select name="${field.name}" class="${inputBaseClass}" ${requiredAttr}>
                    <option value="">Pilih...</option>`;
                if(field.options) field.options.forEach(opt => htmlContent += `<option value="${opt}">${opt}</option>`);
                htmlContent += `</select>`;
            } else if (field.type === 'file') {
                htmlContent += `<label class="flex cursor-pointer items-center gap-2 rounded-xl border border-dashed border-[#e2e8f0] px-4 py-3 text-sm text-[#64748b] transition hover:border-[#0b2046]">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    Unggah lampiran<input type="file" name="${field.name}" class="hidden" ${requiredAttr} />
                </label>`;
            } else {
                htmlContent += `<input type="${field.type || 'text'}" name="${field.name}" class="${inputBaseClass}" ${requiredAttr} />`;
            }
            htmlContent += `</div>`;
        });
        container.innerHTML = htmlContent;

        // 3. Mainkan Animasi MASUK
        modal.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            panel.classList.remove('opacity-0', 'translate-y-full', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 10);
    }
    
    function closeModal() {
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-full', 'sm:scale-95');
        setTimeout(() => { modal.classList.add('hidden'); }, 300);
    }

    // 4. Logika Handle Submit Khusus Layanan Dukungan
    function handleFormSubmit(event) {
        // Jika layanan yang sedang dibuka adalah tipe non-transaksional (Lapor Masalah dll)
        if (currentServiceConfig && currentServiceConfig.actionUrl === "non_transactional") {
            // Cegah form berpindah halaman!
            event.preventDefault();
            
            // Tutup modal
            closeModal();
            
            // Tampilkan Notifikasi Toast (Memastikan fungsi showToast dari layout utama dipanggil)
            if (typeof showToast === "function") {
                showToast(currentServiceConfig.successMessage);
            } else {
                alert(currentServiceConfig.successMessage); // Fallback jika fungsi toast gagal
            }
        }
        // Jika transaksional, biarkan event submit normal berjalan (berpindah ke halaman /pembayaran)
    }
</script>