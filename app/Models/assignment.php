<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    // Tambahkan baris ini di sini
    protected $fillable = ['user_id', 'name', 'course', 'description', 'deadline', 'priority', 'status'];
}