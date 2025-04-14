<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;


class AuthController extends Controller
{
    public function Showform_login() {
        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');
        } elseif (Auth::check() && Auth::user()->isMember()) {
            return redirect('home');
        }
        else
            return view('project_1.account.login');
    }

    public function handle_login() {

        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            if(Auth::user()->isAdmin()) {
                return redirect()->route('admin');
            }else {
                return redirect()->route('home');
            }

        }
 
        return back()->withErrors([
            'username' => 'Tài khoản không tồn tại',
        ])->onlyInput('username');

    }

    public function showform_register() {   
        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('admin');
        } elseif (Auth::check() && Auth::user()->isMember()) {
            return redirect('home');
        }
        else
            return view('project_1.account.register');
    }
    
    public function handle_register(RegisterRequest $request) {
        try {
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password'  => $request->password
            ]);
    
            return redirect()->route('login')->with('success', 'Đăng kí thành công');
        } catch (\Throwable $th) {
            return redirect()->route('register')->with('error', $th->getMessage());
        }

    }

    public function logout() {
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('login');
    }

}
