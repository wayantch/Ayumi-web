<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password harus diisi',
            ],
        );

        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($loginInfo)) {
            // Jika berhasil login
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Anda berhasil masuk!');
            } elseif (Auth::user()->role == 'user') {
                return redirect('/user/home')->with('success', 'Anda berhasil masuk!');
            }
        } else {
            // Jika gagal login
            return redirect('/login')->with('error', 'Email atau password salah');
        }

    }

    public function logout()
    {
        // dd('logout');
        Auth::logout();
        return redirect('/login');
    }
}
