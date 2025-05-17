<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GoogleController extends Controller
{


public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    $googleUser = Socialite::driver('google')->user();

    // Tìm hoặc tạo người dùng trong hệ thống
    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [   
            'username' => $googleUser->getName(),
            'avatar' =>$googleUser->getAvatar(),
            'password' => Hash::make(Str::random(24)),
        ]
    );

    Auth::login($user);

    return redirect('/home');
}

}
