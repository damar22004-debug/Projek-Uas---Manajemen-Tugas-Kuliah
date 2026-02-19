<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskApiController extends Controller
{
    // Helper untuk menentukan respon (JSON atau Redirect)
    private function smartResponse($message, $data = null) {
        if (request()->wantsJson() || request()->is('api/*')) {
            return response()->json(['status' => 'success', 'message' => $message, 'data' => $data]);
        }
        return redirect()->route('dashboard')->with('success', $message);
    }

    public function index() {
        // Untuk API testing, tampilkan semua tugas tanpa filter user_id
        $tasks = request()->is('api/*') ? Task::latest()->get() : Task::where('user_id', Auth::id())->latest()->get();
        
        return request()->is('api/*') 
            ? response()->json(['status' => 'success', 'data' => $tasks]) 
            : view('dashboard', compact('tasks'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required', 'subject' => 'required']);
        $task = Task::create([
            'user_id' => Auth::id() ?? 2, // Default ke user_id 2 untuk API testing
            'name' => $request->name,
            'subject' => $request->subject,
            'status' => 'Belum Mulai',
            'priority' => 'Medium',
            'deadline' => $request->deadline ?? now()->addDays(2),
        ]);
        return $this->smartResponse('Tugas ditambah!', $task);
    }

    // GABUNGAN UPDATE: Support Web & API ID 
    public function update(Request $request, $id) {
        
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['status' => 'error', 'message' => "ID $id tidak ditemukan"], 404);
        }

        $task->update($request->all());
        
        return $this->smartResponse("Mantap! Database $id sudah sinkron.", $task);
    }

    public function destroy($id) {
        $task = Task::find($id);
        if ($task) $task->delete();
        return $this->smartResponse('Tugas dihapus!');
    }

    // Alias untuk routes/api.php
    public function apiIndex() { return $this->index(); }
    public function apiUpdate(Request $request, $id) { return $this->update($request, $id); }
    public function apiDestroy($id) { return $this->destroy($id); }
}