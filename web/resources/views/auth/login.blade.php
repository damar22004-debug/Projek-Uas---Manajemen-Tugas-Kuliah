<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            margin: 0;
            overflow: hidden;
            background-color: #e5e7eb;
        }

        #main-bg {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background-size: cover;
            background-position: center;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-panel {
            width: 100%;
            max-width: 450px; 
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 2.5rem;
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .input-macos {
            background: rgba(255, 255, 255, 0.5) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-radius: 1rem;
            transition: all 0.2s ease;
        }

        .input-macos:focus {
            background: rgba(255, 255, 255, 0.9) !important;
            border-color: #007aff !important;
            box-shadow: 0 0 0 4px rgba(0, 122, 255, 0.1);
        }

        .input-error {
            border-color: #ff5f56 !important;
            background: rgba(255, 95, 86, 0.05) !important;
        }

        .btn-google {
            background: #ffffff;
            color: #1d1d1f;
            border: 1px solid rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }

        .btn-google:hover {
            background: #f5f5f7;
            transform: translateY(-1px);
        }

        .wallpaper-dot {
            width: 22px; height: 22px; border-radius: 6px;
            cursor: pointer; border: 2px solid white; transition: 0.2s;
        }
        .wallpaper-dot:hover { transform: scale(1.15); }
    </style>

    <div id="main-bg" style="background-image: url('https://images.unsplash.com/photo-1614850523296-d8c1af93d400?q=80&w=2070');">
        
        <div class="fixed top-8 flex gap-3 bg-white/20 backdrop-blur-xl p-2.5 rounded-2xl border border-white/30 shadow-xl">
            <div onclick="changeBg('#e5e7eb', true)" class="wallpaper-dot bg-gray-300"></div>
            <div onclick="changeBg('#1c1c1e', true)" class="wallpaper-dot bg-zinc-800"></div>
            <div onclick="changeBg('https://images.unsplash.com/photo-1614850523296-d8c1af93d400?q=80&w=2070')" class="wallpaper-dot" style="background-image: url('https://images.unsplash.com/photo-1614850523296-d8c1af93d400?q=80&w=100')"></div>
            <div onclick="changeBg('https://images.unsplash.com/photo-1477346611705-65d1883cee1e?q=80&w=2070')" class="wallpaper-dot" style="background-image: url('https://images.unsplash.com/photo-1477346611705-65d1883cee1e?q=80&w=100')"></div>
        </div>

        <div class="glass-panel relative">
            <div class="absolute top-6 left-8 flex gap-2">
                <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
            </div>

            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-white/90 rounded-[1.8rem] flex items-center justify-center mb-5 mx-auto shadow-lg border border-white/50">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-extrabold text-zinc-900 tracking-tight">System Login</h2>
                <p class="text-zinc-500 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Management Task v2.0</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email" 
                    class="input-macos w-full px-5 py-4 text-sm outline-none {{ $errors->has('email') ? 'input-error' : '' }}">

                <input type="password" name="password" required placeholder="Kata Sandi" 
                    class="input-macos w-full px-5 py-4 text-sm outline-none {{ $errors->has('email') ? 'input-error' : '' }}">
                
                @if ($errors->any())
                    <p class="text-[10px] text-red-500 font-bold text-center uppercase tracking-widest">ID atau Password anda salah</p>
                @endif

                <div class="flex items-center justify-between px-1 py-1">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-0">
                        <span class="ml-2 text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-[10px] font-bold text-blue-600 uppercase tracking-widest hover:underline">Lupa?</a>
                </div>

                <button type="submit" class="w-full bg-[#007aff] text-white font-bold py-4 rounded-2xl shadow-lg hover:brightness-110 active:scale-[0.98] transition-all text-xs uppercase tracking-[0.2em]">
                    Masuk
                </button>

                <div class="flex items-center py-2 opacity-20">
                    <div class="flex-grow border-t border-zinc-500"></div>
                    <span class="mx-3 text-[9px] font-bold text-zinc-500 uppercase tracking-widest">Atau</span>
                    <div class="flex-grow border-t border-zinc-500"></div>
                </div>

                <a href="{{ route('google.login') }}" class="btn-google w-full flex items-center justify-center gap-3 py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest active:scale-[0.98] transition-all">
                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span>Lanjutkan dengan Google</span>
                </a>

                <div class="text-center pt-4">
                    <a href="{{ route('register') }}" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest hover:text-blue-600 transition-colors">
                        Belum punya akun? <span class="text-blue-600">Daftar</span>
                    </a>
                </div>
            </form>
        </div>
        
        <div class="mt-10 flex items-center gap-2 opacity-30">
            <div class="w-8 h-1 bg-zinc-800 rounded-full"></div>
            <p class="text-[9px] font-black text-zinc-800 uppercase tracking-[0.4em]">Poltek SSN Secure Node</p>
        </div>
    </div>

    <script>
        function changeBg(value, isColor = false) {
            const bg = document.getElementById('main-bg');
            if(isColor) {
                bg.style.backgroundImage = 'none';
                bg.style.backgroundColor = value;
            } else {
                bg.style.backgroundImage = `url('${value}')`;
            }
            localStorage.setItem('macos-bg-v2', value);
        }

        window.onload = () => {
            const saved = localStorage.getItem('macos-bg-v2');
            if (saved) changeBg(saved, saved.startsWith('#'));
        }
    </script>
</x-guest-layout>