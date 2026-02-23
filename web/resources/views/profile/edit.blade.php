<x-app-layout>
    <div class="min-h-screen bg-[#f8fafc] p-6 lg:p-12">
        <div class="max-w-4xl mx-auto space-y-8">
            
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Pengaturan Profil</h2>
                    <p class="text-slate-400 text-sm font-medium">Kelola informasi akun dan keamanan kata sandi Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8">
                
                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 lg:p-10">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-1.5 h-6 bg-blue-500 rounded-full"></span>
                            <h3 class="text-xl font-bold text-slate-800">Informasi Pribadi</h3>
                        </div>
                        
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 lg:p-10">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-1.5 h-6 bg-amber-400 rounded-full"></span>
                            <h3 class="text-xl font-bold text-slate-800">Keamanan Akun</h3>
                        </div>

                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="bg-red-50 rounded-[2.5rem] border border-red-100 overflow-hidden">
                    <div class="p-8 lg:p-10">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-1.5 h-6 bg-red-500 rounded-full"></span>
                            <h3 class="text-xl font-bold text-red-800">Hapus Akun</h3>
                        </div>
                        
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        input[type="text"], input[type="email"], input[type="password"] {
            @apply w-full mt-2 px-5 py-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 text-sm transition-all shadow-sm;
        }
        label {
            @apply text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1;
        }
        section header h2 {
            @apply hidden; /* Sembunyikan judul bawaan partials agar tidak double */
        }
        section header p {
            @apply text-sm text-slate-500 mb-6;
        }
        button[type="submit"] {
            @apply px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-blue-100 text-sm;
        }
    </style>
</x-app-layout>