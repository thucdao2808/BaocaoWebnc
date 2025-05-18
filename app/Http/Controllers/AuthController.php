<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


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
    public function showForgotForm() {
        return view('project_1.forgotpassword.forgot_index');
    }
    public function sendResetCode(Request $request) {
        
         $request->validate([
                'email' => 'required|email|exists:users,email',
            ], [
                'email.exists' => 'Email chưa được đăng ký trong hệ thống.',
            ]);

        $code = rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $code, 'created_at' => now()]
        );

        Mail::raw("Mã xác thực đặt lại mật khẩu của bạn là: $code", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Mã đặt lại mật khẩu');
        });

            return redirect()->route('showVerifyForm')->with('email', $request->email)->with('success', 'Mã xác nhận đã được gửi đến email của bạn.');

        }
    public function showVerifyForm() {
        return view('project_1.forgotpassword.verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required',
            'password' => 'required|confirmed',  // confirmed sẽ check password_confirmation
        ], [
            'email.exists' => 'Email chưa được đăng ký trong hệ thống.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        ]);

        // Kiểm tra mã code
        $reset = DB::table('password_resets')
                ->where('email', $request->email)
                ->where('token', $request->code)
                ->first();

        if (!$reset) {
            return back()->withInput()->with('error_code', 'Mã xác thực không chính xác.');
        }

        // Nếu đúng, tiến hành cập nhật mật khẩu...
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // Xóa mã xác thực sau khi dùng
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }


}
