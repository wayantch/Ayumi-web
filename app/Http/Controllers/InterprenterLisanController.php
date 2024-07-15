<?php

namespace App\Http\Controllers;

use App\Models\Lisan;
use App\Models\Text;
use Illuminate\Http\Request;

class InterprenterLisanController extends Controller
{
    public function index()
    {
        $lisans = Lisan::orderBy('id', 'desc')->get();
        return view('admin.data-interpreter', compact('lisans'));
    }


    //lihat
    public function create()
    {
        $user = auth()->user();
        return view('user.lisan', compact('user'));
    }

    public function detail()
    {
        return view('user.detail.detail-lisan   ');
    }

    //tambah
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lisans,email',
            'phone' => 'required|string|max:15',
            'company' => 'required|string|max:255',
            'reason' => 'required|string|max:500',
            'date' => 'required|date',
        ]);

        Lisan::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'reason' => $request->reason,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    //hapus
    public function destroy($id)
    {
        $lisan = Lisan::find($id);

        if ($lisan) {
            $lisan->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }
}
