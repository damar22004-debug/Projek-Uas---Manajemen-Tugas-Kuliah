<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'subject' => 'required|string',
        ]);

        Task::create([
            'user_id'  => Auth::id(), // FIX: Session kebaca di sini
            'name'     => $request->name,
            'subject'  => $request->subject,
            'status'   => 'Belum Mulai',
            'priority' => 'Medium',
            'deadline' => now()->addDays(2),
        ]);

        return redirect()->back()->with('success', 'Tugas masuk!');
    }

    // FIX Error: Call to undefined method update()
    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->update($request->all());
        return redirect()->back()->with('success', 'Tugas diupdate!');
    }

    // FIX Error: Call to undefined method show()
    public function show($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($task);
    }

    // FIX Error: Call to undefined method destroy()
public function destroy($id)
{
    // 1. Cari tugasnya berdasarkan ID
    $task = \App\Models\Task::find($id);

    // 2. Jika data tidak ada
    if (!$task) {
        return response()->json(['message' => 'Data Tidak ada!'], 404);
    }

    // 3. Eksekusi Hapus
    $task->delete();

    // 4. Kasih respon sukses
    return response()->json(['message' => 'Tugas berhasil dihapus!']);
}
}
