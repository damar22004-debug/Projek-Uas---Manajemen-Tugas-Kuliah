<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $userFromGoogle = Socialite::driver('google')->user();
            
            $user = User::where('email', $userFromGoogle->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $userFromGoogle->getName(),
                    'email' => $userFromGoogle->getEmail(),
                    'password' => Hash::make(Str::random(24)),
                ]);
            }

            Auth::login($user);

            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['email' => 'Gagal login dengan Google: ' . $e->getMessage()]);
        }
    }
}