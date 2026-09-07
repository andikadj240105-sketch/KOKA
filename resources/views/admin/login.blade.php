<!-- resources/views/admin/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — KOKA Property</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-slate-800 antialiased h-screen overflow-hidden">

    <div class="grid h-full lg:grid-cols-2">
      
      <!-- Brand Panel (Kiri - Desktop Saja) -->
      <div class="relative hidden overflow-hidden bg-[#0b2046] lg:block">
        <div class="absolute inset-0 opacity-30"
          style="background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.25), transparent 40%), radial-gradient(circle at 80% 70%, rgba(255,255,255,0.15), transparent 45%);"></div>
        <img
          src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1000&h=1200&fit=crop&auto=format"
          alt="Interior kamar kos modern"
          class="absolute inset-0 h-full w-full object-cover opacity-20 mix-blend-luminosity"
        />
        <div class="relative flex h-full flex-col justify-between p-12 text-white">
          <div class="flex items-center gap-3">
            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-white/15 ring-1 ring-white/30 backdrop-blur">
              <svg class="h-6 w-6 text-[#E5B044]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <span class="font-display text-2xl font-bold tracking-tight">Kosan</span>
          </div>
          <div class="max-w-md">
            <h2 class="font-display text-4xl font-bold leading-tight">Kelola seluruh ekosistem kos dalam satu panel.</h2>
            <p class="mt-4 text-white/80">Pengguna, pemilik, booking, pembayaran, hingga layanan on-demand — semua terkontrol dari dasbor admin Kosan.</p>
          </div>
          <div class="flex items-center gap-6 text-sm text-white/70">
            <span>2.548 pengguna</span><span class="h-1 w-1 rounded-full bg-white/50"></span>
            <span>1.284 kos aktif</span><span class="h-1 w-1 rounded-full bg-white/50"></span>
            <span>326 pemilik</span>
          </div>
        </div>
      </div>

      <!-- Form Panel (Kanan / Full di Mobile) -->
      <div class="flex items-center justify-center px-6 py-12 sm:px-12 overflow-y-auto">
        <div class="w-full max-w-sm">
          
          <!-- Logo Mobile -->
          <div class="mb-8 flex items-center gap-2.5 lg:hidden">
            <div class="grid h-10 w-10 place-items-center rounded-xl bg-[#0b2046] text-[#E5B044]">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <span class="font-display text-xl font-bold text-slate-900">Kosan</span>
          </div>

          <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-[#0b2046]">
            <svg class="h-3.5 w-3.5 text-[#0b2046]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg> 
            Panel Administrator
          </span>
          <h1 class="mt-4 font-display text-3xl font-bold tracking-tight text-slate-900">Selamat Datang, Admin</h1>
          <p class="mt-2 text-sm text-slate-500">Masuk untuk mengelola platform Kosan.</p>

          @if(session('error'))
            <div class="mt-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-600">
              {{ session('error') }}
            </div>
          @endif

          <form action="/admin/login" method="POST" class="mt-6 space-y-4">
            @csrf
            
            <label class="block">
              <span class="mb-1.5 block text-sm font-medium text-slate-900">Email</span>
              <div class="relative">
                <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <input type="email" name="email" value="admin@kosan.id" required
                  class="w-full rounded-xl border border-slate-200 bg-white py-2.5 pl-9 pr-3 text-sm text-slate-900 outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
              </div>
            </label>

            <label class="block">
              <span class="mb-1.5 block text-sm font-medium text-slate-900">Password</span>
              <div class="relative">
                <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                  <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </span>
                <input type="password" id="passwordInput" name="password" required placeholder="••••••••"
                  class="w-full rounded-xl border border-slate-200 bg-white py-2.5 pl-9 pr-10 text-sm text-slate-900 outline-none transition focus:border-[#0b2046] focus:ring-2 focus:ring-[#0b2046]/15" />
                <button type="button" onclick="togglePassword()"
                  class="absolute right-2 top-1/2 -translate-y-1/2 rounded-lg p-1.5 text-slate-400 hover:bg-slate-100">
                  <svg id="eyeIcon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </button>
              </div>
            </label>

            <div class="flex items-center justify-between">
              <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-500">
                <input type="checkbox" name="remember" checked
                  class="h-4 w-4 rounded border-slate-200 text-[#0b2046] accent-[#0b2046]" />
                Ingat saya
              </label>
              <button type="button" class="text-sm font-semibold text-[#0b2046] hover:underline">Lupa password?</button>
            </div>

            <button type="submit" class="w-full rounded-xl bg-[#0b2046] px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90">
              Masuk
            </button>
          </form>

          <p class="mt-6 text-center text-xs text-slate-400">
            Demo: <span class="font-medium text-slate-700">admin@kosan.id</span> / <span class="font-medium text-slate-700">admin123</span>
          </p>
        </div>
      </div>

    </div>

    <script>
      function togglePassword() {
        const input = document.getElementById('passwordInput');
        if (input.type === 'password') {
          input.type = 'text';
        } else {
          input.type = 'password';
        }
      }
    </script>
</body>
</html>