<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MultiStepRegisterController extends Controller
{
    public function showStep1()
    {
        return view('auth.step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Session::put('name', $request->name);

        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        return view('auth.step2');
    }

    public function postStep2(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        Session::put('phone', $request->phone);

        return redirect()->route('register.step3');
    }

    public function showStep3()
    {
        return view('auth.step3');
    }

    public function postStep3(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data ke database
        $user = User::create([
            'name' => Session::get('name'),
            'phone' => Session::get('phone'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Hapus data dari session
        Session::forget(['name', 'phone']);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
    }
}
