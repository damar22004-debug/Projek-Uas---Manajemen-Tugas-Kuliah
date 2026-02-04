<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller {
    public function index() {
        $tasks = DB::table('tasks')->where('user_id', Auth::id())->orderBy('deadline', 'asc')->get()
            ->map(function($task) {
                $isOverdue = Carbon::parse($task->deadline)->isPast();
                $task->display_status = ($task->status !== 'Selesai' && $isOverdue) ? 'Terlambat' : $task->status;
                return $task;
            });

        $stats = [
            'total' => $tasks->count(),
            'selesai' => $tasks->where('status', 'Selesai')->count(),
            'proses' => $tasks->where('status', 'Proses')->count(),
            'terlambat' => $tasks->where('display_status', 'Terlambat')->count(),
        ];
        return view('dashboard', compact('tasks', 'stats'));
    }

    public function store(Request $request) {
        DB::table('tasks')->insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'subject' => $request->subject,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'status' => $request->status,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id) {
        DB::table('tasks')->where('id', $id)->where('user_id', Auth::id())->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'status' => $request->status,
            'updated_at' => now(),
        ]);
        return redirect()->route('dashboard');
    }

    public function destroy($id) {
        DB::table('tasks')->where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back();
    }
}