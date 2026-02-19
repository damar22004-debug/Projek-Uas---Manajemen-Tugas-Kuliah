<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .swal2-popup { border-radius: 2.5rem !important; background: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(20px) !important; border: 1px solid rgba(255,255,255,0.3) !important; }
        
        /* State Aktif Folder */
        .folder-tab { transition: all 0.3s ease; position: relative; cursor: pointer; }
        .folder-tab.active { color: #2563eb !important; opacity: 1 !important; }
        .folder-tab.active::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 100%; height: 3px; background: #2563eb; border-radius: 10px; }
        
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.1); border-radius: 20px; }
    </style>

    <div id="main-bg-container" class="min-h-screen w-full bg-[#1a1a1a] bg-cover bg-center flex items-center justify-center p-2 md:p-5 transition-all duration-700" 
         style="background-image: url('https://images.unsplash.com/photo-1614850523296-d8c1af93d400?q=80&w=2070');">
        
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden" onclick="toggleSidebar()"></div>

        <div class="w-full h-full md:h-[92vh] bg-white/40 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl border border-white/40 flex flex-col md:flex-row overflow-hidden relative">
            
            <div class="absolute top-6 right-8 z-40 hidden md:block">
                <label class="cursor-pointer group flex items-center gap-2 bg-white/30 hover:bg-white/60 backdrop-blur-md px-5 py-2.5 rounded-full border border-white/40 transition-all shadow-sm">
                    <svg class="w-4 h-4 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2"/></svg>
                    <span class="text-[10px] font-black text-slate-800 uppercase tracking-widest">Ganti Latar</span>
                    <input type="file" id="bg-input" class="hidden" accept="image/*" onchange="changeBackground(this)">
                </label>
            </div>

            <aside id="sidebar" class="w-80 bg-white/10 backdrop-blur-3xl p-6 border-r border-white/20 flex flex-col shrink-0 overflow-y-auto custom-scrollbar">
                <div class="flex items-center gap-2 mb-8">
                    <div class="flex gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div><div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div><div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div></div>
                    <span class="ml-2 text-[10px] font-black text-slate-500 uppercase tracking-widest opacity-60">MANAGEMENT</span>
                </div>

                <div class="bg-white/50 rounded-[1.8rem] p-5 border border-white/40 shadow-xl mb-6">
                    <h3 class="text-[11px] font-black text-slate-800 uppercase mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span> Tambah Tugas
                    </h3>
                    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-3">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Tugas" required class="w-full bg-white/60 border-none rounded-xl text-[11px] py-3 focus:ring-2 focus:ring-blue-500">
                        <input type="text" name="subject" placeholder="Mata Kuliah" required class="w-full bg-white/60 border-none rounded-xl text-[11px] py-3 focus:ring-2 focus:ring-blue-500">
                        <input type="datetime-local" name="deadline" required class="w-full bg-white/60 border-none rounded-xl text-[11px] py-3">
                        <input type="hidden" name="status" value="Belum Mulai">
                        <input type="hidden" name="priority" value="Sedang">
                        <button type="submit" class="w-full bg-blue-600 text-white font-black py-3.5 rounded-xl shadow-lg text-[9px] uppercase tracking-widest hover:bg-blue-700 transition-all">Simpan Tugas</button>
                    </form>
                </div>

                <div class="bg-white/40 rounded-[1.8rem] p-5 border border-white/30 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 id="cal-month" class="text-[10px] font-black text-slate-800 uppercase tracking-widest"></h3>
                        <div class="flex gap-2">
                            <button onclick="changeMonth(-1)" class="p-1 hover:bg-white rounded-lg text-slate-600">&lt;</button>
                            <button onclick="changeMonth(1)" class="p-1 hover:bg-white rounded-lg text-slate-600">&gt;</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-1 mb-2 text-center">
                        @foreach(['SN','SL','RB','KM','JM','SB','MG'] as $h)<span class="text-[8px] font-bold text-slate-400">{{ $h }}</span>@endforeach
                    </div>
                    <div id="calendar-days" class="grid grid-cols-7 gap-1"></div>
                </div>

                <div class="mt-auto pt-4 border-t border-white/20">
                    <div class="flex items-center gap-3 bg-white/40 p-3 rounded-2xl border border-white/40">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-black text-sm">{{ substr(Auth::user()->name, 0, 1) }}</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-[11px] font-black text-slate-800 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-[9px] text-slate-500 font-bold uppercase">Mahasiswa</p>
                        </div>
                        <button onclick="handleLogout()" class="p-2 text-slate-400 hover:text-red-500 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7" stroke-width="2"/></svg></button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    </div>
                </div>
            </aside>

            <main class="flex-1 p-4 md:p-10 overflow-y-auto custom-scrollbar flex flex-col">
                <header class="flex justify-between items-start mb-8">
                    <div>
                        <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tighter italic">Halo, {{ explode(' ', Auth::user()->name)[0] }}!</h1>
                        <p class="text-slate-500 font-bold text-xs">Pantau progres kuliahmu di sini.</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <p class="text-3xl md:text-5xl font-light text-slate-800 tracking-tighter" id="live-clock">00:00</p>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2">{{ date('d F Y') }}</p>
                    </div>
                </header>

                <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 mb-10">
                    @php 
                        $stats = [
                            ['TOTAL', $tasks->count(), 'bg-blue-100/60 text-blue-700'],
                            ['BELUM MULAI', $tasks->where('status', 'Belum Mulai')->count(), 'bg-gray-50/60 text-gray-700'],
                            ['SELESAI', $tasks->where('status', 'Selesai')->count(), 'bg-green-100/60 text-green-700'],
                            ['PROSES', $tasks->where('status', 'Proses')->count(), 'bg-amber-100/60 text-amber-700'],
                            ['TERLAMBAT', $tasks->filter(fn($t) => $t->status !== 'Selesai' && \Carbon\Carbon::parse($t->deadline)->isPast())->count(), 'bg-red-100/80 text-red-900']
                        ];
                    @endphp
                    @foreach($stats as $s)
                    <div class="{{ $s[2] }} p-5 rounded-3xl border border-white/20 backdrop-blur-sm transition-all hover:scale-[1.03]">
                        <p class="text-[8px] font-black uppercase mb-1 tracking-widest opacity-70">{{ $s[0] }}</p>
                        <h4 class="text-2xl md:text-3xl font-black leading-none">{{ $s[1] }}</h4>
                    </div>
                    @endforeach
                </div>

                <div class="flex items-center gap-8 mb-8 border-b border-black/5 overflow-x-auto no-scrollbar">
                    <button onclick="filterTasks('semua')" class="folder-tab active text-[10px] font-black uppercase tracking-widest pb-4 whitespace-nowrap">📁 Semua Tugas</button>
                    <button onclick="filterTasks('Belum Mulai')" class="folder-tab text-[10px] font-black uppercase tracking-widest pb-4 whitespace-nowrap">🔴 Belum Mulai</button>
                    <button onclick="filterTasks('Proses')" class="folder-tab text-[10px] font-black uppercase tracking-widest pb-4 whitespace-nowrap">🟡 Proses</button>
                    <button onclick="filterTasks('Selesai')" class="folder-tab text-[10px] font-black uppercase tracking-widest pb-4 whitespace-nowrap">🟢 Selesai</button>
                </div>

                <div id="task-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 pb-10">
          @forelse($tasks as $task)
    @php
        // 1. Tentukan apakah tugas terlambat (Overdue)
        $isOverdue = \Carbon\Carbon::parse($task->deadline)->isPast() && $task->status !== 'Selesai';
        
        // 2. Tentukan status yang akan ditampilkan
        $displayStatus = $isOverdue ? 'Terlambat' : $task->status;

        $colors = [
            'Belum Mulai' => ['bg' => 'bg-gray-50/60', 'border' => 'border-gray-200/50', 'text' => 'text-gray-600'],
            'Terlambat'   => ['bg' => 'bg-red-50/60',  'border' => 'border-red-200/50',  'text' => 'text-red-600'],
            'Proses'      => ['bg' => 'bg-amber-50/60', 'border' => 'border-amber-200/50', 'text' => 'text-amber-600'],
            'Selesai'     => ['bg' => 'bg-green-50/60', 'border' => 'border-green-200/50', 'text' => 'text-green-600']
        ][$displayStatus] ?? ['bg' => 'bg-white/60', 'border' => 'border-white/40', 'text' => 'text-blue-600'];
    @endphp

    <div class="task-card {{ $colors['bg'] }} {{ $colors['border'] }} backdrop-blur-md rounded-[2rem] border p-6 transition-all hover:shadow-xl hover:-translate-y-1" data-status="{{ $task->status }}">
        <div class="flex justify-between items-start mb-6">
            <div class="w-10 h-10 bg-white/80 rounded-xl flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 {{ $colors['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-width="2"/></svg>
            </div>
            <div class="flex gap-2">
                <button onclick='openEditModal(@json($task))' class="p-2.5 bg-blue-600 text-white rounded-xl hover:scale-110 transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" stroke-width="2"/></svg></button>
                <button onclick="handleDelete('{{ $task->id }}')" class="p-2.5 bg-white text-red-500 rounded-xl hover:scale-110 transition-all shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7" stroke-width="2"/></svg></button>
                <form id="delete-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
            </div>
        </div>

        <h3 class="text-xl font-black text-slate-800 mb-1">{{ $task->name }}</h3>
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-6">{{ $task->subject }}</p>

        <div class="flex items-center justify-between pt-5 border-t border-black/5">
            <span class="text-[10px] font-black {{ $isOverdue ? 'text-red-600' : 'text-slate-600' }} italic">
                {{ \Carbon\Carbon::parse($task->deadline)->format('d M, H:i') }}
            </span>

            <div class="px-3 py-1 bg-white/80 rounded-full text-[9px] font-black uppercase {{ $colors['text'] }}">
                {{ $isOverdue ? 'TERLAMBAT' : $task->status }}
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full py-20 text-center text-slate-400 font-bold italic">Belum ada tugas.</div>
@endforelse
                </div>
            </main>
        </div>
    </div>

    <div id="edit-modal" class="fixed inset-0 z-[1000] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeEditModal()"></div>
        <div id="edit-modal-content" class="relative z-[1010] bg-white w-full max-w-[450px] rounded-[2.5rem] p-8 shadow-2xl transform transition-all scale-95 opacity-0">
            <h3 class="text-[12px] font-black text-slate-800 uppercase mb-6">Edit Tugas</h3>
            <form id="edit-task-form" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <input type="text" name="name" id="edit-name" required class="w-full bg-slate-50 border-none rounded-2xl py-3.5 focus:ring-2 focus:ring-blue-500">
                <input type="text" name="subject" id="edit-subject" required class="w-full bg-slate-50 border-none rounded-2xl py-3.5 focus:ring-2 focus:ring-blue-500">
                <input type="datetime-local" name="deadline" id="edit-deadline" required class="w-full bg-slate-50 border-none rounded-2xl py-3.5">
                <div class="grid grid-cols-2 gap-3">
                    <select name="priority" id="edit-priority" class="bg-slate-50 border-none rounded-2xl py-3.5 text-xs font-bold"><option value="Rendah">Rendah</option><option value="Sedang">Sedang</option><option value="Tinggi">Tinggi</option></select>
                    <select name="status" id="edit-status" class="bg-slate-50 border-none rounded-2xl py-3.5 text-xs font-bold"><option value="Belum Mulai">Belum Mulai</option><option value="Proses">Proses</option><option value="Selesai">Selesai</option></select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-2xl shadow-lg uppercase text-[10px] tracking-widest">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <script>
        const tasksData = @json($tasks);
        let date = new Date();
        let currentMonth = date.getMonth();
        let currentYear = date.getFullYear();

        function changeMonth(offset) {
            currentMonth += offset;
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            else if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            renderCalendar();
        }

        function renderCalendar() {
            const daysContainer = document.getElementById('calendar-days');
            const monthYearText = document.getElementById('cal-month');
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            
            monthYearText.innerText = `${months[currentMonth]} ${currentYear}`;
            daysContainer.innerHTML = '';

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();
            let startingDay = firstDay === 0 ? 6 : firstDay - 1;

            for (let i = 0; i < startingDay; i++) daysContainer.innerHTML += `<div></div>`;

            for (let day = 1; day <= lastDate; day++) {
                const dateStr = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                const dayTasks = tasksData.filter(t => t.deadline.startsWith(dateStr));
                const isToday = day === new Date().getDate() && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear();

                const dayEl = document.createElement('div');
                dayEl.className = `aspect-square flex items-center justify-center text-[10px] font-bold rounded-lg transition-all cursor-pointer`;
                
                if (dayTasks.length > 0) {
                    dayEl.className += ` bg-blue-600 text-white shadow-md scale-105`;
                    dayEl.onclick = () => showDayTasks(dateStr, dayTasks);
                } else if (isToday) {
                    dayEl.className += ` border-2 border-blue-400 text-slate-800`;
                } else {
                    dayEl.className += ` text-slate-600 hover:bg-white/50`;
                }
                dayEl.innerText = day;
                daysContainer.appendChild(dayEl);
            }
        }

        function showDayTasks(dateStr, tasks) {
            const formattedDate = new Date(dateStr).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            let html = `<div class="text-left mt-4 space-y-3">`;
            tasks.forEach(t => {
                const colors = t.status === 'Selesai' ? 'text-green-600 bg-green-50' : (t.status === 'Proses' ? 'text-amber-600 bg-amber-50' : 'text-red-600 bg-red-50');
                html += `<div class="p-4 ${colors} rounded-2xl border border-black/5">
                    <div class="flex justify-between font-black text-sm"><span>${t.name}</span><span class="text-[8px] uppercase px-2 py-0.5 rounded-full bg-white/50">${t.status}</span></div>
                    <p class="text-[9px] font-bold uppercase mt-1 opacity-70">${t.subject}</p>
                </div>`;
            });
            Swal.fire({ title: formattedDate, html: html + `</div>`, showConfirmButton: false, showCloseButton: true });
        }

        function filterTasks(status) {
            document.querySelectorAll('.folder-tab').forEach(t => t.classList.remove('active'));
            event.currentTarget.classList.add('active');
            document.querySelectorAll('.task-card').forEach(card => {
                card.style.display = (status === 'semua' || card.getAttribute('data-status') === status) ? 'block' : 'none';
            });
        }

        function changeBackground(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    document.getElementById('main-bg-container').style.backgroundImage = `url('${e.target.result}')`;
                    localStorage.setItem('dashboard-bg', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function openEditModal(task) {
            document.getElementById('edit-name').value = task.name;
            document.getElementById('edit-subject').value = task.subject;
            document.getElementById('edit-deadline').value = task.deadline.substring(0, 16).replace(' ', 'T');
            document.getElementById('edit-priority').value = task.priority;
            document.getElementById('edit-status').value = task.status;
            document.getElementById('edit-task-form').action = `/tasks/${task.id}`;
            document.getElementById('edit-modal').classList.remove('hidden');
            setTimeout(() => document.getElementById('edit-modal-content').classList.add('scale-100', 'opacity-100'), 50);
        }

        function closeEditModal() {
            document.getElementById('edit-modal-content').classList.remove('scale-100', 'opacity-100');
            setTimeout(() => document.getElementById('edit-modal').classList.add('hidden'), 300);
        }

        function handleDelete(id) {
            Swal.fire({ title: 'Hapus?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#ef4444' }).then(r => { if (r.isConfirmed) document.getElementById('delete-'+id).submit(); });
        }

        function handleLogout() {
            Swal.fire({ title: 'Logout?', icon: 'question', showCancelButton: true }).then(r => { if (r.isConfirmed) document.getElementById('logout-form').submit(); });
        }

        setInterval(() => {
            const n = new Date();
            document.getElementById('live-clock').innerText = n.getHours().toString().padStart(2,'0')+":"+n.getMinutes().toString().padStart(2,'0');
        }, 1000);

        window.onload = () => {
            renderCalendar();
            const bg = localStorage.getItem('dashboard-bg');
            if (bg) document.getElementById('main-bg-container').style.backgroundImage = `url('${bg}')`;
        };
    </script>
</x-app-layout>