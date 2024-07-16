<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('id', 'desc')->get();
        $user = auth()->user(); 
        return view('user.home', compact('kelas', 'user'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
