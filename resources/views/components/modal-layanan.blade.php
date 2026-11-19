<!-- resources/views/components/modal-layanan.blade.php -->
<div id="modalLayanan" class="fixed inset-0 z-[80] hidden items-center justify-center p-4 sm:p-6 transition-opacity">
  <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
  
  <div role="dialog" aria-modal="true" class="relative flex max-h-[90vh] w-full sm:max-w-lg flex-col overflow-hidden rounded-[24px] sm:rounded-[32px] bg-white shadow-2xl animate-in-up">
    
    <!-- HEADER MODAL -->
    <div class="flex shrink-0 items-center justify-between border-b border-[#e2e8f0] px-5 py-4 sm:px-6 sm:py-5 bg-white">
      <div>
        <h3 id="modalTitle" class="font-display text-lg font-bold text-[#522b89]">Pesan Layanan</h3>
        <p id="modalSubtitle" class="text-xs text-[#64748b]">Lengkapi detail pemesanan Anda di bawah ini.</p>
      </div>
      <button onclick="closeModal()" aria-label="Tutup" class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-[#f8fafc] text-[#522b89] transition hover:bg-[#e2e8f0]">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>

    <!-- FORM UTAMA -->
    <form action="{{ route('layanan.pesan') }}" method="POST" enctype="multipart/form-data" class="flex flex-col flex-1 overflow-hidden">
      @csrf
      <input type="hidden" name="service_name" id="serviceNameInput">
      <input type="hidden" name="harga_total" id="hargaTotalInput">
      
      <!-- AREA INPUT DINAMIS -->
      <div class="flex-1 overflow-y-auto px-5 py-4 sm:px-6 sm:py-5">
        <div id="dynamicFormContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Input akan di-generate oleh JavaScript -->
        </div>
      </div>

      <!-- AREA TOMBOL -->
      <div class="shrink-0 border-t border-[#e2e8f0] bg-white px-5 py-4 sm:px-6 sm:py-5">
        <button type="submit" id="submitBtn" class="w-full rounded-xl bg-[#F39C12] py-3.5 text-center text-sm font-bold text-[#522b89] shadow-md transition hover:bg-[#F5B041]">
          Pesan Sekarang
        </button>
      </div>
    </form>

  </div>
</div>

<script>
    const currentUserNama = "{{ Auth::check() ? Auth::user()->nama : '' }}";
    const currentUserHp = "{{ Auth::check() ? (Auth::user()->hp ?? '') : '' }}";

    let baseServicePrice = 20000;

    // Memuat konfigurasi layanan beserta opsi harga dari database secara dinamis
    const serviceConfigs = {
        @foreach(\App\Models\Service::all() as $svc)
            @php 
                $key = strtolower(str_replace(' ', '', $svc->nama));$options = $svc->options_harga ? json_decode($svc->options_harga, true) : null;
            @endphp
            "{{ $key }}": {
                name: "{{ $svc->nama }}",
                price: "{{ $svc->nama }}" === "Kosan Fix" ? 75000 : {{ $svc->harga ?? 20000 }},
                options: {!! $options ? json_encode($options) : 'null' !!},
                desc: "{{ $svc->deskripsi ?? 'Layanan KOKA' }}",
                fields: getFieldsForService("{{ $key }}")
            },
        @endforeach
    };

    function getFieldsForService(key) {
        switch(key) {
            case 'kosanjek':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "pickup", label: "Lokasi Penjemputan", required: true },
                    { name: "tujuan", label: "Lokasi Tujuan", required: true },
                    { name: "tanggal", label: "Tanggal", type: "date", required: true, half: true },
                    { name: "jam", label: "Jam", type: "time", required: true, half: true },
                    { name: "kendaraan", label: "Jenis Kendaraan", type: "select", options: ["Motor", "Mobil"], required: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
            case 'kosanmove':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "asal", label: "Alamat Asal", required: true },
                    { name: "tujuan", label: "Alamat Tujuan", required: true },
                    { name: "tanggal", label: "Tanggal Pindahan", type: "date", required: true, half: true },
                    { name: "tipe_mobil", label: "Tipe Kendaraan Pindahan", type: "select", options: ["Avanza", "Mobil Pick Up", "Truk"], required: true, half: true },
                    { name: "lantai", label: "Lantai", type: "select", options: ["1", "2", "3", "4+"], half: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
            case 'kosanclean':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "alamat", label: "Alamat", required: true },
                    { name: "ruangan", label: "Jenis Ruangan", type: "select", options: ["1 kamar kost", "1 kamar mandi", "1 kamar kost dan 1 kamar mandi"], required: true, half: true },
                    { name: "tanggal", label: "Tanggal", type: "date", required: true, half: true },
                    { name: "jam", label: "Jam", type: "time", required: true, half: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
            case 'kosanfix':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "alamat", label: "Alamat Kos", required: true },
                    { name: "kategori", label: "Kategori Kerusakan", type: "select", options: ["Listrik", "Air/Pipa", "AC", "Furniture", "Lainnya"], required: true },
                    { name: "deskripsi", label: "Deskripsi Kerusakan", type: "textarea", required: true },
                    { name: "foto", label: "Upload Foto", type: "file" },
                    { name: "tanggal", label: "Tanggal Kunjungan", type: "date", required: true, half: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
            case 'kosanlaundry':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "pickup", label: "Alamat Pickup", required: true },
                    { name: "langganan", label: "Langganan", type: "select", options: ["1 Semester", "1 Tahun"], required: true, half: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
            case 'guestkost':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "alamat", label: "Alamat Asal", required: true },
                    { name: "tujuan", label: "Pilihan Kos", type: "select", options: ["The Sultan", "Wisma Kampus", "Yudikos"], required: true, half: true },
                    { name: "tanggal", label: "Tanggal Pemesanan", type: "date", required: true, half: true },
                    { name: "catatan", label: "Catatan Tambahan", type: "textarea" }
                ];
            case 'kosanstorage':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "jenis", label: "Jenis Barang Penitipan", required: true },
                    { name: "berat", label: "Estimasi Volume/Dus", required: true, half: true },
                    { name: "tanggal", label: "Tanggal Titip", type: "date", required: true, half: true },
                    { name: "kategori", label: "Lama Penitipan", type: "select", options: ["1 Minggu", "2 Minggu", "1 Bulan", "Lebih dari 1 Bulan"], required: true },
                    { name: "catatan", label: "Catatan Khusus", type: "textarea" }
                ];
            case 'kosanguard':
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "pickup", label: "Lokasi Penjemputan", required: true },
                    { name: "tujuan", label: "Lokasi Tujuan (Kos)", required: true },
                    { name: "tanggal", label: "Tanggal Penjemputan", type: "date", required: true, half: true },
                    { name: "jam", label: "Jam Penjemputan", type: "time", required: true, half: true },
                    { name: "catatan", label: "Ciri-ciri Pakaian / Catatan Tambahan", type: "textarea" }
                ];
            default:
                return [
                    { name: "nama", label: "Nama Lengkap", required: true, half: true },
                    { name: "hp", label: "Nomor HP", type: "tel", required: true, half: true },
                    { name: "catatan", label: "Catatan", type: "textarea" }
                ];
        }
    }

    function updateSubmitButtonPrice(price) {
        const submitBtn = document.getElementById('submitBtn');
        const hargaTotalInput = document.getElementById('hargaTotalInput');
        const serviceNameInput = document.getElementById('serviceNameInput');
        
        // Cek nama layanan yang sedang aktif
        const currentService = serviceNameInput ? serviceNameInput.value.toLowerCase().replace(/\s+/g, '') : '';

        if (submitBtn) {
            if (currentService === 'guestkost' || currentService === 'guestkos') {
                submitBtn.innerText = 'Booking';
            } else {
                submitBtn.innerText = `Pesan Sekarang  Rp ${price.toLocaleString('id-ID')}`;
            }
        }
        if (hargaTotalInput) {
            hargaTotalInput.value = price;
        }
    }

    function buildFormFields(normalizedKey) {
        const container = document.getElementById('dynamicFormContainer');
        container.innerHTML = ''; 
        
        const config = serviceConfigs[normalizedKey];
        if (!config) return;

        config.fields.forEach(field => {
            const colClass = field.half ? 'col-span-1' : 'col-span-1 sm:col-span-2';
            const reqMark = field.required ? ' *' : '';
            const isReq = field.required ? 'required' : '';
            
            let prefilledValue = '';
            if (field.name === 'nama') prefilledValue = currentUserNama;
            if (field.name === 'hp') prefilledValue = currentUserHp;

            let inputHtml = '';
            if (field.type === 'select') {
                let optionsHtml = field.options.map(opt => `<option value="${opt}">${opt}</option>`).join('');
                inputHtml = `
                <select name="${field.name}" id="field_${field.name}" ${isReq} class="w-full rounded-xl border border-[#e2e8f0] px-4 py-3 text-sm text-[#522b89] focus:border-[#522b89] focus:outline-none bg-white">
                    <option value="" disabled selected>Pilih ${field.label}</option>
                    ${optionsHtml}
                </select>`;
            } else if (field.type === 'textarea') {
                inputHtml = `<textarea name="${field.name}" ${isReq} rows="2" placeholder="Masukkan ${field.label.toLowerCase()}..." class="w-full rounded-xl border border-[#e2e8f0] px-4 py-3 text-sm text-[#522b89] focus:border-[#522b89] focus:outline-none bg-white"></textarea>`;
            } else if (field.type === 'file') {
                inputHtml = `<input type="file" name="${field.name}" id="field_${field.name}" ${isReq} accept="image/png, image/jpeg, image/jpg" class="w-full rounded-xl border border-[#e2e8f0] px-4 py-3 text-sm text-[#522b89] focus:border-[#522b89] focus:outline-none bg-white">`;
            } else {
                let type = field.type || 'text';
                let bgClass = prefilledValue ? 'bg-slate-50' : 'bg-white';
                inputHtml = `<input type="${type}" name="${field.name}" id="field_${field.name}" value="${prefilledValue}" ${isReq} placeholder="Masukkan ${field.label.toLowerCase()}..." class="w-full rounded-xl border border-[#e2e8f0] px-4 py-3 text-sm text-[#522b89] focus:border-[#522b89] focus:outline-none ${bgClass}">`;
            }

            const fieldDiv = document.createElement('div');
            fieldDiv.className = colClass;
            fieldDiv.innerHTML = `
                <label class="block text-xs font-semibold text-[#522b89] mb-1.5">${field.label}${reqMark}</label>
                ${inputHtml}
            `;
            container.appendChild(fieldDiv);
        });

        // 1. Logika Kosan Jek
        if (normalizedKey === 'kosanjek') {
            const selectKendaraan = document.getElementById('field_kendaraan');
            if (selectKendaraan) {
                const priceMotor = config.options && config.options['Motor'] ? config.options['Motor'] : baseServicePrice;
                const priceMobil = config.options && config.options['Mobil'] ? config.options['Mobil'] : baseServicePrice + 10000;
                
                updateSubmitButtonPrice(priceMotor);
                selectKendaraan.addEventListener('change', function() {
                    let calculatedPrice = priceMotor;
                    if (this.value === 'Mobil') {
                        calculatedPrice = priceMobil;
                    }
                    updateSubmitButtonPrice(calculatedPrice);
                });
            }
        }

        // 2. Logika Kosan Move 
        if (normalizedKey === 'kosanmove') {
            const selectTipeMobil = document.getElementById('field_tipe_mobil');
            if (selectTipeMobil) {
                const pAvanza = config.options && config.options['Avanza'] ? config.options['Avanza'] : 165000;
                const pPickup = config.options && config.options['Mobil Pick Up'] ? config.options['Mobil Pick Up'] : 260000;
                const pTruk = config.options && config.options['Truk'] ? config.options['Truk'] : 550000;

                updateSubmitButtonPrice(pAvanza);
                selectTipeMobil.addEventListener('change', function() {
                    let movePrice = pAvanza;
                    if (this.value === 'Mobil Pick Up') {
                        movePrice = pPickup;
                    } else if (this.value === 'Truk') {
                        movePrice = pTruk;
                    }
                    updateSubmitButtonPrice(movePrice);
                });
            }
        }

        // 3. Logika Kosan Clean
        if (normalizedKey === 'kosanclean') {
            const selectRuangan = document.getElementById('field_ruangan');
            if (selectRuangan) {
                const pKost = config.options && config.options['1 kamar kost'] ? config.options['1 kamar kost'] : 75000;
                const pMandi = config.options && config.options['1 kamar mandi'] ? config.options['1 kamar mandi'] : 100000;
                const pKombinasi = config.options && config.options['1 kamar kost dan 1 kamar mandi'] ? config.options['1 kamar kost dan 1 kamar mandi'] : 150000;

                updateSubmitButtonPrice(pKost); 
                selectRuangan.addEventListener('change', function() {
                    let cleanPrice = pKost;
                    if (this.value === '1 kamar mandi') {
                        cleanPrice = pMandi;
                    } else if (this.value === '1 kamar kost dan 1 kamar mandi') {
                        cleanPrice = pKombinasi;
                    }
                    updateSubmitButtonPrice(cleanPrice);
                });
            }
        }

        // 4. Logika Kosan Laundry
        if (normalizedKey === 'kosanlaundry') {
            const selectLangganan = document.getElementById('field_langganan');
            if (selectLangganan) {
                const pSemester = config.options && config.options['1 Semester'] ? config.options['1 Semester'] : 900000;
                const pTahun = config.options && config.options['1 Tahun'] ? config.options['1 Tahun'] : 1500000;

                updateSubmitButtonPrice(pSemester);
                selectLangganan.addEventListener('change', function() {
                    let laundryPrice = pSemester;
                    if (this.value === '1 Tahun') {
                        laundryPrice = pTahun;
                    }
                    updateSubmitButtonPrice(laundryPrice);
                });
            }
        }
    }

    function openModal(serviceName) {
        const modal = document.getElementById('modalLayanan');
        const title = document.getElementById('modalTitle');
        const subtitle = document.getElementById('modalSubtitle');
        const inputHidden = document.getElementById('serviceNameInput');
        
        const normalizedKey = serviceName.toLowerCase().replace(/\s+/g, '');
        const config = serviceConfigs[normalizedKey];

        if (title) title.innerText = config ? config.name : serviceName;
        if (inputHidden) inputHidden.value = config ? config.name : serviceName; 
        
        if (config) {
            if (subtitle) subtitle.innerText = config.desc;
            baseServicePrice = config.price;
            
            buildFormFields(normalizedKey);

            if (['kosanjek', 'kosanmove', 'kosanclean', 'kosanlaundry', 'kosanfix'].indexOf(normalizedKey) === -1) {
                updateSubmitButtonPrice(config.price);
            } else if (normalizedKey === 'kosanfix') {
                updateSubmitButtonPrice(baseServicePrice);
            }
        }
        
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeModal() {
        const modal = document.getElementById('modalLayanan');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }
</script>