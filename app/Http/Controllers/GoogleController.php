<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            // Cari user berdasarkan google_id atau email
            $finduser = User::where('google_id', $user->id)
                            ->orWhere('email', $user->email)
                            ->first();

            if($finduser){
                // Jika sudah ada, update google_id 
                $finduser->update(['google_id' => $user->id]);
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                // Jika belum ada, buat user baru
             $newUser = User::create([
        'name' => $user->name,
        'email' => $user->email,
        'google_id'=> $user->id,
        'password' => Hash::make(Str::random(16)) // Membuat password acak yang aman
]);
               

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            return redirect('login')->with('error', 'Gagal login Google: ' . $e->getMessage());
        }
    }
}