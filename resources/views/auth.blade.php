<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk / Daftar - KOKA Property</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">

  <main class="mx-auto flex max-w-[1280px] items-center px-4 py-8 sm:px-6 lg:min-h-[calc(100vh-72px)]">
    
    <div class="grid w-full overflow-hidden rounded-[28px] border border-line bg-white shadow-[0_30px_80px_-40px_rgba(11,42,85,0.45)] lg:grid-cols-2">
      
      <!-- ================= BRAND PANEL ================= -->
      <div class="relative hidden flex-col justify-between overflow-hidden bg-navy p-10 lg:flex">
        <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-gold/15 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-20 -left-10 h-56 w-56 rounded-full bg-white/5 blur-2xl"></div>
        
        <div class="relative">
          <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-xs font-semibold text-gold">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
            Student Living Platform
          </span>
          <h2 class="mt-6 font-display text-3xl font-extrabold leading-tight text-white">
            Hunian nyaman,<br />hidup lebih mudah.
          </h2>
          <p class="mt-3 max-w-sm text-sm leading-relaxed text-white/60">
            Masuk ke akun KOKA kamu untuk mengelola kos, pembayaran, dan semua layanan dalam satu tempat.
          </p>
          <ul class="mt-8 space-y-3">
            <li class="flex items-center gap-3 text-sm text-white/80">
              <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-gold text-navy">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </span>
              Ribuan pilihan kos terverifikasi
            </li>
            <li class="flex items-center gap-3 text-sm text-white/80">
              <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-gold text-navy">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </span>
              Bayar sewa & kelola kontrak digital
            </li>
            <li class="flex items-center gap-3 text-sm text-white/80">
              <span class="grid h-6 w-6 shrink-0 place-items-center rounded-full bg-gold text-navy">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
              </span>
              Akses semua layanan KosanX + rewards
            </li>
          </ul>
        </div>
        <div class="relative overflow-hidden rounded-2xl">
          <img src="https://images.unsplash.com/photo-1781249144129-4ba0869707f5?w=700&h=320&fit=crop&auto=format" alt="Kamar kos premium KOKA" class="h-40 w-full object-cover" />
        </div>
      </div>

      <!-- ================= FORM PANEL ================= -->
      <div class="p-6 sm:p-10">
        <a href="/" class="mb-6 inline-flex items-center gap-1.5 text-sm font-medium text-slate transition hover:text-navy">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
          Kembali
        </a>

        <!-- TABS (Masuk / Daftar) -->
        <div class="mb-7 inline-flex rounded-full bg-cloud p-1">
          <button id="tabLogin" onclick="setMode('login')" class="rounded-full px-5 py-2 text-sm font-semibold transition bg-navy text-white shadow-sm">
            Masuk
          </button>
          <button id="tabRegister" onclick="setMode('register')" class="rounded-full px-5 py-2 text-sm font-semibold transition text-slate hover:text-navy">
            Daftar
          </button>
        </div>

        <h1 id="formTitle" class="font-display text-2xl font-bold text-navy">Selamat datang kembali</h1>
        <p id="formSubtitle" class="mt-1 text-sm text-slate">Masuk untuk melanjutkan ke akun kamu.</p>

        <!-- FORM -->
        <form onsubmit="handleAuth(event)" class="mt-6 space-y-4">
          
          <!-- Area Khusus Register (Nama Lengkap) -->
          <div id="registerFieldNama" class="hidden">
            <label class="mb-1.5 block text-xs font-semibold text-navy">Nama Lengkap</label>
            <div class="flex items-center gap-2.5 rounded-xl border border-line bg-white px-3.5 transition focus-within:border-navy focus-within:ring-4 focus-within:ring-navy/10">
              <svg class="h-[18px] w-[18px] shrink-0 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
              <input type="text" id="inputNama" placeholder="Nama kamu" class="w-full bg-transparent py-3 text-sm text-ink outline-none placeholder:text-slate" />
            </div>
          </div>

          <!-- Email (Selalu Muncul) -->
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-navy">Email</label>
            <div class="flex items-center gap-2.5 rounded-xl border border-line bg-white px-3.5 transition focus-within:border-navy focus-within:ring-4 focus-within:ring-navy/10">
              <svg class="h-[18px] w-[18px] shrink-0 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
              <input type="email" id="inputEmail" required placeholder="nama@email.com" class="w-full bg-transparent py-3 text-sm text-ink outline-none placeholder:text-slate" />
            </div>
          </div>

          <!-- Area Khusus Register (Nomor HP) -->
          <div id="registerFieldHp" class="hidden">
            <label class="mb-1.5 block text-xs font-semibold text-navy">Nomor HP</label>
            <div class="flex items-center gap-2.5 rounded-xl border border-line bg-white px-3.5 transition focus-within:border-navy focus-within:ring-4 focus-within:ring-navy/10">
              <svg class="h-[18px] w-[18px] shrink-0 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
              <input type="tel" id="inputHp" placeholder="08xxxxxxxxxx" class="w-full bg-transparent py-3 text-sm text-ink outline-none placeholder:text-slate" />
            </div>
          </div>

          <!-- Password (Selalu Muncul) -->
          <div>
            <label class="mb-1.5 block text-xs font-semibold text-navy">Kata Sandi</label>
            <div class="flex items-center gap-2.5 rounded-xl border border-line bg-white px-3.5 transition focus-within:border-navy focus-within:ring-4 focus-within:ring-navy/10">
              <svg class="h-[18px] w-[18px] shrink-0 text-slate" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
              <input type="password" id="inputPassword" required placeholder="Masukkan kata sandi" class="w-full bg-transparent py-3 text-sm text-ink outline-none placeholder:text-slate" />
              
              <!-- Tombol Intip Password -->
              <button type="button" onclick="togglePassword()" class="text-slate transition hover:text-navy">
                <!-- Ikon Mata Tertutup -->
                <svg id="iconEyeClosed" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                <!-- Ikon Mata Terbuka -->
                <svg id="iconEyeOpen" class="h-[18px] w-[18px] hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </button>
            </div>
          </div>

          <!-- Ceklis Bawah -->
          <div id="loginExtras" class="flex items-center justify-between text-sm">
            <label class="flex cursor-pointer items-center gap-2 text-slate">
              <input type="checkbox" class="h-4 w-4 rounded accent-[#0b2a55]" /> Ingat saya
            </label>
            <button type="button" onclick="showToast('Tautan reset dikirim ke email')" class="font-semibold text-navy transition hover:text-gold">
              Lupa sandi?
            </button>
          </div>

          <div id="registerExtras" class="hidden text-sm">
            <label class="flex cursor-pointer items-start gap-2.5 text-sm text-slate">
              <input type="checkbox" id="checkTerms" class="mt-0.5 h-4 w-4 rounded accent-[#0b2a55]" />
              <span>
                Saya setuju dengan <span class="font-semibold text-navy">Syarat & Ketentuan</span> dan <span class="font-semibold text-navy">Kebijakan Privasi</span> KOKA.
              </span>
            </label>
          </div>

          <!-- Tombol Submit (Warna Navy seperti variant="navy") -->
          <button type="submit" id="btnSubmitAuth" class="w-full rounded-xl bg-navy px-4 py-3 text-sm font-semibold text-white transition hover:bg-navy/90">
            Masuk
          </button>

          <!-- Separator -->
          <div class="flex items-center gap-3 text-xs text-slate">
            <span class="h-px flex-1 bg-line"></span> atau <span class="h-px flex-1 bg-line"></span>
          </div>

          <!-- Tombol Google (Warna Outline seperti variant="outline") -->
          <button type="button" onclick="showToast('Mengalihkan ke Google...')" class="flex w-full items-center justify-center gap-3 rounded-xl border border-line bg-white px-4 py-3 text-sm font-semibold text-navy transition hover:bg-cloud">
            <span class="font-display text-base font-bold text-gold">G</span>
            Lanjutkan dengan Google
          </button>

          <!-- Teks Bawah -->
          <p class="pt-1 text-center text-sm text-slate">
            <span id="bottomText">Belum punya akun? </span>
            <button type="button" onclick="toggleMode()" id="bottomLink" class="font-semibold text-navy transition hover:text-gold">
              Daftar sekarang
            </button>
          </p>
          <p class="flex items-center justify-center gap-1.5 pt-1 text-center text-[11px] text-slate">
            <svg class="h-3.5 w-3.5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            Data kamu aman & terenkripsi bersama KOKA.
          </p>

        </form>
      </div>
    </div>
  </main>

  <script>
    // 1. Baca URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    let currentMode = urlParams.get('mode') === 'register' ? 'register' : 'login';

    document.addEventListener("DOMContentLoaded", () => {
        setMode(currentMode);
    });

    // 2. Fungsi Animasi Perpindahan Tab
    function setMode(mode) {
        currentMode = mode;
        const isLogin = mode === 'login';
        
        const tabLogin = document.getElementById('tabLogin');
        const tabRegister = document.getElementById('tabRegister');
        
        // Transisi warna tombol Tab (Sama persis dengan TSX)
        tabLogin.className = `rounded-full px-5 py-2 text-sm font-semibold transition ${isLogin ? 'bg-navy text-white shadow-sm' : 'text-slate hover:text-navy'}`;
        tabRegister.className = `rounded-full px-5 py-2 text-sm font-semibold transition ${!isLogin ? 'bg-navy text-white shadow-sm' : 'text-slate hover:text-navy'}`;
        
        // Ganti Teks
        document.getElementById('formTitle').innerText = isLogin ? "Selamat datang kembali" : "Buat akun KOKA";
        document.getElementById('formSubtitle').innerText = isLogin ? "Masuk untuk melanjutkan ke akun kamu." : "Daftar gratis dan mulai cari kos impianmu.";
        document.getElementById('btnSubmitAuth').innerText = isLogin ? "Masuk" : "Daftar Sekarang";
        
        // Animasi Tampil/Sembunyi Field
        document.getElementById('registerFieldNama').classList.toggle('hidden', isLogin);
        document.getElementById('registerFieldHp').classList.toggle('hidden', isLogin);
        document.getElementById('loginExtras').classList.toggle('hidden', !isLogin);
        document.getElementById('registerExtras').classList.toggle('hidden', isLogin);
        
        // Wajib diisi (Required)
        if(isLogin) {
            document.getElementById('inputNama').removeAttribute('required');
            document.getElementById('inputHp').removeAttribute('required');
        } else {
            document.getElementById('inputNama').setAttribute('required', 'true');
            document.getElementById('inputHp').setAttribute('required', 'true');
        }
        
        document.getElementById('bottomText').innerText = isLogin ? "Belum punya akun? " : "Sudah punya akun? ";
        document.getElementById('bottomLink').innerText = isLogin ? "Daftar sekarang" : "Masuk di sini";
    }

    function toggleMode() {
        setMode(currentMode === 'login' ? 'register' : 'login');
    }

    // 3. Fungsi Animasi Intip Kata Sandi
    function togglePassword() {
        const input = document.getElementById('inputPassword');
        const eyeClosed = document.getElementById('iconEyeClosed');
        const eyeOpen = document.getElementById('iconEyeOpen');

        if (input.type === 'password') {
            input.type = 'text';
            eyeClosed.classList.add('hidden');
            eyeOpen.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeClosed.classList.remove('hidden');
            eyeOpen.classList.add('hidden');
        }
    }

    function handleAuth(event) {
        event.preventDefault(); 
        
        if (currentMode === 'register' && !document.getElementById('checkTerms').checked) {
            showToast("Setujui syarat & ketentuan dulu ya");
            return;
        }

        const msg = currentMode === 'login' ? "Berhasil masuk. Selamat datang!" : "Akun berhasil dibuat!";
        showToast(msg);
        
        // Ubah link redirect di bawah ini ke /dummy-login
        setTimeout(() => {
            window.location.href = '/dummy-login'; 
        }, 1500);
    }

    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed top-5 left-1/2 -translate-x-1/2 z-[100] flex items-center gap-2 rounded-xl bg-navy px-5 py-3.5 text-sm font-semibold text-white shadow-2xl transition-all duration-300 transform -translate-y-10 opacity-0';
        toast.innerHTML = `
            <svg class="h-5 w-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            ${message}
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('-translate-y-10', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 10);
        
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('-translate-y-10', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
  </script>
</body>
</html>