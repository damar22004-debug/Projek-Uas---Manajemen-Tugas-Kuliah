<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f0f4f8] p-4 font-sans">
        <div class="max-w-md w-full bg-white rounded-[2.5rem] shadow-2xl p-10">
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 mx-auto text-white shadow-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tight">Daftar Akun</h2>
                <p class="text-slate-400 text-sm mt-1">Buat akun untuk mulai mengelola tugas</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Contoh: Damar Taruna" class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Alamat Email</label>
                    <input type="email" name="email" required placeholder="email@contoh.com" class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Password</label>
                        <input type="password" name="password" required class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5 ml-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg transition-all text-sm uppercase tracking-widest">
                        Buat Akun Sekarang
                    </button>
                </div>

                <div class="text-center pt-4 border-t border-slate-100 mt-6">
                    <p class="text-xs text-slate-400 font-medium">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>