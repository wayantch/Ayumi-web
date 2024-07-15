<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $user = auth()->user(); // Mengambil informasi pengguna yang sedang login
        return view('user.home', compact('kelas', 'user'));
    }
    
    

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
