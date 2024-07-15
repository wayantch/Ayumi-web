<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Admin
    public function index()
    {
        return view('admin.dashboard');
    }

    public function datauser()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.data-user', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/data-user');
    }

    public function create()
    {
        return view('admin.create');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
