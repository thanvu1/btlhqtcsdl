<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user &&  Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            return redirect()->intended('home'); // Chuyển hướng tới trang chủ sau khi đăng nhập thành công
        }

        return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không chính xác.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
