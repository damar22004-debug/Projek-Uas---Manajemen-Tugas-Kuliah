<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // SEMUA KOLOM INI WAJIB ADA DI SINI!
    protected $fillable = [
        'user_id', 
        'name', 
        'subject', 
        'status', 
        'priority', 
        'deadline', 
        'description'
    ];
}