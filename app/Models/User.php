<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // <--- WAJIB: Import ini untuk fitur API

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Tambahkan HasApiTokens di dalam use agar token bisa dibuat
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id', // Pastikan ini ada kalau lo pake Socialite
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke model Task.
     * Seorang User (Damar) bisa punya banyak tugas.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}