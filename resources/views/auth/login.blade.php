<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f0f4f8] p-6 font-sans">
        <div class="max-w-5xl w-full bg-white rounded-[3rem] shadow-2xl overflow-hidden flex flex-col md:flex-row min-h-[600px]">
            
            <div class="md:w-1/2 bg-gradient-to-br from-[#0082f3] to-[#00c2ff] p-16 flex flex-col items-center justify-center text-white relative">
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-24 h-24 bg-white/20 backdrop-blur-xl rounded-[2rem] flex items-center justify-center mb-10 mx-auto shadow-2xl border border-white/30">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-black mb-4 tracking-tighter">Manajemen Tugas</h1>
                    <p class="text-blue-50/80 text-base mb-10 leading-relaxed max-w-xs mx-auto">
                        Kelola semua tugas perkuliahan Anda dengan mudah dalam satu tempat.
                    </p>
                    
                    <div class="flex gap-3 justify-center">
                        <span class="px-5 py-2 bg-white/10 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest border border-white/20">Terorganisir</span>
                        <span class="px-5 py-2 bg-white/10 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest border border-white/20">Efisien</span>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 p-16 flex flex-col justify-center bg-white">
                <div class="mb-12 text-center md:text-left">
                    <h2 class="text-4xl font-black text-slate-800 tracking-tight">Selamat Datang!</h2>
                    <p class="text-slate-400 text-sm mt-2 font-medium">Silakan login atau daftar akun baru</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email / Alamat Akun</label>
                        <input type="email" name="email" required autofocus placeholder="Masukkan email anda" 
                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 text-sm transition-all placeholder:text-slate-300 shadow-sm shadow-slate-100">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Kata Sandi</label>
                        <input type="password" name="password" required placeholder="••••••••" 
                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 text-sm transition-all placeholder:text-slate-300 shadow-sm shadow-slate-100">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-[#007bff] hover:bg-[#0056b3] text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 text-sm uppercase tracking-widest">
                            Masuk Ke Akun
                        </button>
                    </div>

                    <div class="text-center pt-4">
                        <p class="text-xs text-slate-400 font-bold tracking-tight">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 transition-colors ml-1">Daftar Sekarang</a>
                        </p>
                    </div>
                </form>

                <footer class="mt-16 text-center">
                    <p class="text-[10px] text-slate-300 font-bold uppercase tracking-widest italic">© 2026 Poltek SSN - Manajemen Tugas</p>
                </footer>
            </div>
        </div>
    </div>
</x-guest-layout>