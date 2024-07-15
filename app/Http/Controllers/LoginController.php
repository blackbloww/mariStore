<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(LoginRequest $request)
    {
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->avt = 'storage/img/avt.png';
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->intended('editor');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('editor');
        }

        return redirect()->back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu chưa chính xác!',
        ]);
    } 
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
