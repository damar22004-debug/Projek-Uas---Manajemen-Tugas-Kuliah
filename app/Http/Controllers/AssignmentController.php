<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    // Menampilkan daftar tugas (penganti action=list)
    public function index()
    {
        $assignments = Assignment::where('user_id', Auth::id())->get();
        return response()->json($assignments);
    }

    // Menambah tugas baru (pengganti action=add)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'course' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'priority' => 'nullable|in:Rendah,Sedang,Tinggi',
        ]);

        $assignment = Assignment::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'course' => $validated['course'],
            'description' => $validated['description'],
            'deadline' => $validated['deadline'],
            'priority' => $validated['priority'],
            'status' => 'Aktif',
        ]);

        return response()->json(['message' => 'Tugas berhasil ditambahkan', 'data' => $assignment]);
    }
}